<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function profile()
    {
        $profile = Auth::user();
        return view('admin.profile', compact('profile'))->with('title', 'Admin Profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:255',
            'fb_url' => 'nullable|string|max:255',
            'tw_url' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'org' => 'nullable|string|max:255',
        ]);

        $user->update($validatedData);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function updateProfilePic(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'pic' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $imagePath = $request->file('pic')->store('public/images/user');

        $user->image_link = basename($imagePath);
        $user->save();

        return redirect()->back()->with('success', 'Image changed successfully!');
    }

    public function members(Request $request)
    {
        $usersCount = User::count();
        $type = $request->type;
        if($type == 'verified'){
            $users = User::where('role', 'a')->where('role', 'b')->latest()->paginate(30);
        }elseif($type == 'unverified'){
            $users = User::where('role', 'c')->latest()->paginate(30);
        }else{
            return redirect()->back()->with('error', 'Invalid request!');
        }

        return view('admin.members', compact('users', 'usersCount'))->with('title', 'Members');
    }

    public function approveMember(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->verified = 1;
        $user->save();

        return back()->with('success', 'Member was approved successfully!');
    }

    public function memberProfile(Request $request)
    {
        $member = User::findOrFail($request->mid);
        return view('admin.member_profile', compact('member'));
    }

    public function makeAdmin(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->level = $request->opt;
        $user->save();

        return back()->with('success', 'Success!');
    }

    public function directory()
    {
        $members = User::where('verified', '1')->paginate(12);
        return view('admin.directory', compact('members'))->with('title', 'Members Directory');
    }

    public function newMembers()
    {
        $members = User::where('verified', '0')->get();
        return view('admin.newMembers', compact('members'))->with('title', 'Accept New Members');
    }

    public function admins()
    {
        $admins = User::where('level', 'a')->orWhere('level', 'b')->get();
        return view('admin.admins', compact('admins'))->with('title', 'View Admins');
    }

    public function addAdmin()
    {
        $members = User::orderBy('id', 'DESC')->get();
        return view('admin.addAdmin', compact('members'))->with('title', 'Add Admin');
    }

}
