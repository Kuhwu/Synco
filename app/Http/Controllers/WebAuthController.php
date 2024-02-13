<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class WebAuthController extends Controller
{
    public function login(){
            
        if(!empty(Auth::check())){
            return redirect('admin/dashboard');
        }

        return view('Auth.login');
    }

    public function Authlogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:20'
        ]);
    
        $remember = !empty($request->remember);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect('admin/dashboard');
        } else {
            return back()->with('fail', 'Incorrect Email or Password');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect(url(''));
    }
}
