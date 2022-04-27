<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{



    public function index()
    {
        return view('admin.master');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function doLogin(Request $req)
    {
        $userInfo=$req->except('_token');

        if(Auth::attempt($userInfo)){
            return view('admin.master')->with('message','Login successful.');
        }
        return redirect()->back()->with('error','Invalid user credentials');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('message','Logged out.');
    }


}
