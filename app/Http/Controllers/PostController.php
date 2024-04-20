<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;
use App\Models\Image;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::latest()->paginate(30);
        $categories = Category::orderBy('title', 'asc')->get();
        $images = Image::orderBy('title', 'asc')->get();
        return view('admin.posts', compact('posts', 'images', 'categories'));
    }

    public function store(Request $request)
    {
        $title = $request->post_title;

        $link = Str::slug($title);

        $description = $request->post_excerpt;

        $category = $request->post_category;

        $thumbnail = $request->thumbnail;

        $author = $request->author;

        $tag = $request->tag;

        $body = $request->myTextArea;

        $status = $request->post_status;

        if($status == "publish"){

            $status = 1;

        }else{

            $status = 0;

        }

        $date = date("Y-m-d H:i:s");

        if(empty($title) || empty($description) || empty($category) || empty($body) ) {
            return back()->with('error', 'All compulsory fields must be filled!');
        }else{

            $post = new Post();
            $post->title = $title;
            $post->user_id = $author;
            $post->excerpt = $description;
            $post->category_id = $category;
            $post->content = $body;
            $post->thumbnail = $thumbnail;
            $post->tags = $tag;
            $post->status = $status;
            $post->link = $link;

            if($post->save()) {

                return back()->with('success', 'Post was made successfully!');

            }else{

                return back()->with('error', 'The server cannot handle your request at the moment. Please try again later.');

            }
        }
    }

    public function update(Request $request){

        $title = $request->post_title;

        $pid = $request->pid;

        $description = $request->post_excerpt;

        $category = $request->post_category;

        $thumbnail = $request->thumbnail;

        $author = $request->author;

        $tag = $request->tag;

        $body = $request->myTextArea;

        $status = $request->post_status;

        if(empty($title) || empty($description) || empty($category) || empty($body) ) {
            return back()->with('error', 'All compulsory fields must be filled!');
        }else{

            $post = Post::find($pid);
            $post->title = $title;
            $post->excerpt = $description;
            $post->content = $body;
            $post->category_id = $category;
            $post->thumbnail = $thumbnail;
            $post->user_id = $author;
            $post->tags = $tag;
            $post->status = $post_status;

            if($post->save()) {

                return back()->with('success', 'Post edited successfully!');

            }else{

                return back()->with('error', 'The server cannot handle your request at the moment. Please try again later.');

            }

        }
    }

    public function editPost(Request $request)
    {

        $records = Post::find($pid);

        if($records){
            $categories = Category::all();
            $images = Image::all();
            return view('dashboard.editPost', compact('records','categories','images'))->with('title', 'Edit Post');
        }else{
            echo '<script>alert("Invalid request!");</script>';
            return back();
        }

    }

    public function deletePost(Request $request)
    {
        $pid = $request->pid;

	    $sql = "DELETE FROM blogs WHERE id = ?";
        $post = Post::find($pid);
	    if($post->delete()){
	        return back();
	    }else{
	        echo '<script>alert("The server was unable to handle your request!");history.back();</script>';
	    }
    }

    public function unpublishPost(Request $request)
    {
        $pid = $request->pid;

	    $sql = "UPDATE posts SET status = ? WHERE id = ?";
	    if(DB::update($sql,['0',$pid])){
	        return back();
	    }else{
	        echo '<script>alert("The server was unable to handle your request!");history.back();</script>';
	    }
    }

    public function publishPost(Request $request)
    {
        $pid = $request->pid;

	    $sql = "UPDATE posts SET status = ? WHERE id = ?";
	    if(DB::update($sql,['1',$pid])){
	        return back();
	    }else{
	        echo '<script>alert("The server was unable to handle your request!");history.back();</script>';
	    }
    }

    public function draft()
    {
        $blog = Post::where('status','0')->get();
        return view('admin.draft', compact('blog'))->with('title', 'Drafts');
    }

    public function viewPost(Request $request)
    {
        $link = $request->slug;

        // Fetch categories
        $categories = Category::all();

        // Check if the post exists
        $post = Post::where('link', $link)->first();

        if (!$post) {
            abort(404);
        }

        // Increment views count
        $post->increment('views');

        $posts = Post::orderBy('views', 'asc')->limit(12)->get();
        $latest = Post::latest()->limit(6)->get();

        $previousPost = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $nextPost = Post::where('id', '>', $post->id)->orderBy('id')->first();

        return view('view-post', [
            'post' => $post,
            'categories' => $categories,
            'coursesCount' => $coursesCount,
            'posts' => $posts,
            'latest' => $latest,
            'previousPost' => $previousPost,
            'nextPost' => $nextPost
        ]);
    }

    public function viewCategory(Request $request)
    {
        $categories = Category::all();

        // Fetch latest posts
        $latest = Post::orderBy('id', 'desc')->limit(12)->get();

        // Fetch popular posts by views
        $popular = Post::orderBy('views', 'desc')->limit(12)->get();

        $link = $request->link;
        $category = Category::where('link', $link)->first();

        if (!$category) {
            abort(404);
        }

        $posts = $category->posts()->latest()->paginate(12);

        return view('category', compact('category', 'posts', 'categories', 'latest', 'popular'));
    }

    public function blog(Request $request)
    {
        $categories = Category::all();
        // Fetch latest posts
        $latest = Post::orderBy('id', 'desc')->limit(12)->get();

        // Fetch popular posts by views
        $popular = Post::orderBy('views', 'desc')->limit(12)->get();

        $posts = Post::latest()->paginate(12);

        return view('blog', compact('categories', 'posts', 'categories', 'latest', 'popular', 'coursesCount'));
    }
}