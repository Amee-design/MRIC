<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Mail\WelcomeMail;
use App\Mail\OtpMail;
use App\Mail\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(!$request->email){
            return back()->with('error', 'You must provide your email address to continue...');
        }

        if(!$request->password){
            return back()->with('error', 'You must provide your password to continue...');
        }

        $email = $request->email;
        $password = $request->password;

        // $validator = Validator::make($request->all(), [
        //     'g-recaptcha-response' => 'required|captcha',
        // ]);

        // if ($validator->fails()) {
        //     return back()->with('error', 'You need to prove that you are a human!');
        // }

        $user = User::where('email', $credentials['email'])->first();

        if($user){

            // if($user->is_verified == 0){
            //     $token = mt_rand(100000, 999999);

            //     DB::update("UPDATE users SET verify_token = '$token' WHERE email = ?", [$credentials['email']]);

            //     $message = '<p>You are getting this message because your account is not yet verified. Kindly provide the following code to verify your account:.<br>
            //     <br>
            //     <p><b>Verification Code:</b> '.$token.'</p>';

            //     try{
            //         Mail::to($check->email)->send(new Notification($check, $message));
            //     }catch(Exception $e){
            //         return back()->with('error', $e->getMessage());
            //     }
            //     $url = url('/verify-account/'.$email.'/'.base64_encode($password));

            //     return redirect($url);
            // }

            if($user->is_blocked == '1'){
                return back()->with('error', 'Your account has been suspended. Kindly contact support.');
            }
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                if($user->role == 'b'){
                    return redirect()->intended('account');
                }elseif($user->role == "a"){
                    return redirect()->intended('admin');
                }else{

                }

            }
        }

        return back()->with('error', 'Either the email or password is not correct. Try again...');
    }

    public function register(){
        return view('auth.register');
    }

    public function handleRegistration(Request $request)
    {
        if($request->password != $request->cpassword){
            return back()->with('error', 'The password entered does not match!');
        }

        if(!isset($request->toc)){
            return back()->with('error', 'You must accept our terms and conditions to proceed!');
        }

        if(User::where('email', $request->email)->count() > 0){
            return back()->with('error', 'Email taken!');
        }

        if(User::where('phone', $request->phone)->count() > 0){
            return back()->with('error', 'Phone number taken!');
        }

        // $validator = Validator::make($request->all(), [
        //     'g-recaptcha-response' => 'required|captcha',
        // ]);

        // if ($validator->fails()) {
        //     return back()->with('error', 'You need to prove that you are a human!');
        // }

        // Validate the incoming request data
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'name' => 'required|min:3|max:50',
            'role' => 'required|min:5|max:15',
            'phone' => 'required|min:11|max:15',
        ]);

        $user = new User();

        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->password = Hash::make($validatedData['password']);
        $user->name = $validatedData['name'];

        if ($user->save()) {
            return back()->with('success', 'Registration successful!');
        }
        return back()->with('error', 'Registration failed. Please try again.');
    }

    public function forgotPassword(){
        return view('auth.forgot-pw');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
