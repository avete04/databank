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
            return response()->json([
                'status' => 1
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

}
