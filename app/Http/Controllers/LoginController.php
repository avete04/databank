<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\User;


class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if(Auth::user()->user_level == 2 && Auth::user()->is_active == 1)
            {
                $url = "profile?id=".Auth::user()->id.'&unique_id='.Auth::user()->employee_id;
            }
            if(Auth::user()->user_level == 1)
            {
                $url = route('employees');
            }

            return response()->json([
                'status' => 1,
                'url' => $url
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

}
