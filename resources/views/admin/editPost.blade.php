@extends('layouts.dashboard')

@section('title', 'Admin | MRIC')

@section('content')
    <?php
    foreach($records as $rec){
        $title = $rec->post_title;
        $thumbnail = $rec->post_thumbnail;
        $excerpt = $rec->post_excerpt;
        $status = $rec->post_status;
        $id = $rec->id;

        if($status == '1'){
            $state = "Publish Now";
        }else{
            $state = "Save as Draft";
        }

        $author = $rec->post_author;
        $category = $rec->post_category;
        $tags = $rec->post_tags;
        $body = $rec->post_content;
    }

    ?>
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Admin</a></li>
                        <li class="breadcrumb-item">Blog</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Blog Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    @include('partials.notifications')
    <!-- Start Contentbar -->
    <div class="contentbar">

        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Edit Blog Post</h5>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form method="post" name="myform" id="myform" action="">

                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="post_title" required="required" placeholder="post title..." id="form-input-post-title" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category:</label>
                                            <select name="post_category" required="required" class="form-control">
                                                <option value="{{$category}}">{{$category}}</option>
                                                @if($categories)
                                                    @foreach($categories as $cat)
                                                        <option value="{{$cat->title}}">{{$cat->title}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="post_status" required="required" class="form-control">
                                                <option value="{{$status}}">{{$state}}</option>
                                                <option value="publish">Publish Now</option>
                                                <option value="draft">Save as Draft</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Thumbnail</label>
                                            <select name="thumbnail" placeholder="thumbnail image name" class="form-control">
                                                <option value="{{$thumbnail}}">{{$thumbnail}}</option>
                                                @if($images)
                                                    @foreach($images as $rec)
                                                        <option value="{{$rec->link}}">{{$rec->title}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="author" value="{{$author}}">

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Post Body</label>
                                            <textarea id="summernote" name="myTextArea" class="form-control">{{$body}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Excerpt</label>
                                            <textarea class="form-control" name="post_excerpt" required="required" id="post-excerpt" placeholder="post excerpt...">{{$excerpt}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tags&darr;</label>
                                            <input type="text" value="{{$tags}}" name="tag" placeholder="enter post tag separated by comma" required="required" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <input type="submit" name="publish" value="Save Changes" class="btn btn-info">
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
    <script>

        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Hi. I am your text editor...',
                tabsize: 2,
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });

    </script>
    @endpush
@stop
