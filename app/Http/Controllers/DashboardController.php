<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function profile()
    {
        $id = Auth::id();
        $profile = User::find($id);
        return view('dashboard.profile', compact('profile'))->with('title', 'Admin Profile');
    }

    public function updateProfile(Request $request)
    {
        $id = Auth::id();
        $profile = User::find($id);

        $profile->name = $request->name;
        $profile->gender = $request->gender;
        $profile->phone = $request->phone;
        $profile->bio = $request->bio;
        $profile->fb_url = $request->fb_url;
        $profile->tw_url = $request->tw_url;

        $profile->occupation = $request->occupation;
        $profile->org = $request->org;

        if($profile->save()){
            echo '<script>alert("Profile was updated successfully!");history.back();</script>';
        }else{
            echo '<script>alert("The server is unable to handle your request at the moment!");</script>';
        }

    }
    public function updateProfilePic(Request $request)
    {
        $image = $_FILES['pic']['name'];

        $size = $_FILES['pic']['size'];

        $id = Auth::id();
        $profile = User::find($id);

        $extension = strtolower(pathinfo($image,PATHINFO_EXTENSION));

        if(($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif')  && $size < 2000000 ){

           $profile->image_link = $profile->name.rand(999, 10000).'.'. $extension;
           $request->file('pic')->storeAs('public/images/user', $profile->image_link);

           if($profile->save()){
               echo '<script>alert("Image changed successfully!");history.back();</script>';
           }

        }else{
           echo '<script>alert("Uploaded Image must be of type jpg, jpeg or png and Size must be less than 2mb");</script>';
           return back();
        }
    }

    public function members()
    {
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $members = DB::select($sql);
        return view('dashboard.members', compact('members'))->with('title', 'Members');
    }
    public function approveMember(Request $request){
        $id = $request->id;

        $sql = "UPDATE users SET verified = '1' WHERE id = ?";
        if(DB::update($sql,[$id])){
            echo '<script>alert("Member was approved successfully!");</script>';
            return back();
        }else{
            echo '<script>alert("The server was unable to handle your request at the moment...");history.back();</script>';
        }
    }
    function memberProfile(Request $request){
        $mid = $request->mid;
        $member = User::where('id',$mid)->get();
        $output = '<table class="w3-table table-row-out">';
        foreach($member as $rec){
            if(!empty($rec['image_link'])){
                $output .= '<tr>
                    <th colspan="2" style="text-align:center"><img src="../storage/app/public/images/user/'.$rec['image_link'].'" style="width:150px;height:150px;object-fit:cover"></th>
                </tr>';
            }else{
                $output .= '<tr>
                    <th colspan="2" style="text-align:center"><img src="../storage/app/public/images/user/not-found.png" style="width:150px;height:150px;object-fit:cover"></th>
                </tr>';
            }
            $output .= '<tr>
                <th>Full Name:</th><td>'.$rec['name'].'</td>
            </tr>';
            $output .= '<tr>
                <th>Set Year:</th><td>'.$rec['year'].'</td>
            </tr>';
            $output .= '<tr>
                <th>Email:</th><td>'.$rec['email'].'</td>
            </tr>';
            $output .= '<tr>
                <th>Phone:</th><td><a href="https://wa.me/'.$rec['phone'].'" target="_blank">'.$rec['phone'].'</a></td>
            </tr>';
            $output .= '<tr>
                <th>Occupation:</th><td>'.$rec['occupation'].'</td>
            </tr>';
            $output .= '<tr>
                <th>Business/Org:</th><td>'.$rec['org'].'</td>
            </tr>';
            $output .= '<tr>
                <th>Facebook:</th><td>'.$rec['fb_url'].'</td>
            </tr>';
        }
        $output .= '</table>';

        return $output;
    }
    public function makeAdmin(Request $request){
        $id = $request->id;
        $opt = $request->opt;

        $sql = "UPDATE users SET level = ? WHERE id = ?";

        if(DB::update($sql, [$opt,$id])){
            echo '<script>alert("Success!");</script>';
            return back();
        }else{
            echo '<script>alert("The server was unable to handle your request at the moment...");history.back();</script>';
        }
    }
    public function directory()
    {
        $members = User::where('verified', '1')->paginate(12);
        return view('dashboard.directory', compact('members'))->with('title', 'Members Directory');
    }
    public function newMembers()
    {
        $members = User::where('verified', '0')->get();
        return view('dashboard.newMembers', compact('members'))->with('title', 'Accept New Members');
    }

    public function admins()
    {
        $sql = "SELECT * FROM users WHERE level = 'a' OR level = 'b'";
        $admins = DB::select($sql);
        return view('dashboard.admins', compact('admins'))->with('title', 'View Admins');
    }
    public function addAdmin()
    {
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $members = DB::select($sql);
        return view('dashboard.addAdmin', compact('members'))->with('title', 'Add Admin');
    }
}
