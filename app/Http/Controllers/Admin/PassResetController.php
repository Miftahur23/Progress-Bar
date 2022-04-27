<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ResetPassEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PassResetController extends Controller
{
    public function forgetPassword()
    {
        return view('admin.pages.reset-pass.forget');
    }

    public function forgetPasswordEmailPost(Request $req)
    {
        // dd($req->all());
        $req->validate([
            'email'=>'required|exists:users'

        ]);
        $token=Str::random(20);
        $user=User::where('email',$req->email)->first();
        $user->update([
            'reset_token'=>$token,
            'reset_token_expire_at'=>Carbon::now()->addMinute(2),
        ]);
        // dd($user);
        $link=route('admin.reset.password',$token);
        // dd($link);
        //  creating instance
         Mail::to($req->email)->send(new ResetPassEmail($link));
        return redirect()->back()->with('msg','Email sent to : '. $req->email);



    }
    public function resetPassword($token)
    {
        return view('admin.pages.reset-pass.reset',compact('token'));

    }
    public function resetPasswordPost(Request $req)
    {
        $req->validate([
            'reset_token'=>'required',
            'password'=>'required|confirmed',
        ]);
        $userHasToken=User::where('reset_token',$req->reset_token)->first();
        if($userHasToken)
        {
            if($userHasToken->reset_token_expire_at>=Carbon::now())
            {
                $userHasToken->update([
                    'password'=>bcrypt($req->password),
                    'reset_token'=>null

                ]);
                return redirect()->back()->with('msg','Reset password successful');
            }
            else
            {
                return redirect()->back->withErrors('token expired');            }

        }
        else
        {
            return redirect()->back()->withErrors("token not found");
        }

    }
}
