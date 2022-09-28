<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function check(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists on users table'
         ]);
         $creds = $request->only('email','password');
         if(Auth::guard()->attempt($creds)){


             return redirect('home');
         }else{
             return redirect()->route('user.login')->with('fail','Incorrect credentials');
         }
    }
    public function create(){
        return view('auth.login');
    }
    public function logout(){
        Auth::guard()->logout();
        return redirect('login');
    }
    public function form(){
        return view('auth.forgotpassword');
    }
    public function resetPass(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email'
        ]);
        $token = \Str::random(64);
        \DB::table('password_resets')->insert([
              'email'=>$request->email,
              'token'=>$token,
              'created_at'=>Carbon::now(),
        ]);
        $action_link = route('user.reset.password.form',['token'=>$token,'email'=>$request->email]);
        $body = "We are received a request to reset the password for <b>Your app Name </b> account associated with ".$request->email.". You can reset your password by clicking the link below";
       \Mail::send('email-forgot',['body'=>$body, 'action_link' => $action_link], function($message) use ($request){
             $message->from('noreply@example.com','Your App Name');
             $message->to($request->email,'Your name')
                     ->subject('Reset Password');
       });
       return back()->with('success', 'We have e-mailed your password reset link!');
    }
    public function showResetForm(Request $request, $token = null){
        return view('auth.reset')->with(['token'=>$token,'email'=>$request->email]);
    }
    public function resetPassword(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|confirmed',
            'password_confirmation'=>'required',
        ]);
        $check_token = \DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();
        if(!$check_token){
            return back()->withInput()->with('fail', 'Invalid token');
        }else{
            User::where('email', $request->email)->update([
                'password'=>\Hash::make($request->password)
            ]);
            \DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();
            return redirect()->route('user.login')->with('info', 'Your password has been changed! You can login with new password')->with('verifiedEmail', $request->email);
        }
    }
}
