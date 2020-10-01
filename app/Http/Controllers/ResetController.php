<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\User;

class ResetController extends Controller
{
    
    public function resetaccount()
    {
        $user = Auth::user();
        return View('admin.pages.resetaccount')->with(compact('user'));
    }

    public function reset(Request $request)
    {
        if(Auth::check())
        {
            $id = Auth::id();
            $user = User::find($id);
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->setRememberToken(Str::random(60));
            $user->save();
            return Redirect()->back()->with('status', 'Account updated!');;
        }
        abort(404);
    }
    
    public function customlogin(Request $request)
    {
        if (Auth::login($user)) {
            // Authentication passed...
            dd(Auth::users());
            return redirect()->back();
        }
        dd(Auth::users());
        return redirect()->back();
    }
}
