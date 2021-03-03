<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Appraisal;
use App\User;

class AppraisalController extends Controller
{
    public function add(Request $request)
    {
        $appraisal = new Appraisal($request->all());

        return response()->json([
            'status' => 1,
            'message' => 'Data has been added'
        ]);
    }

    public function user()
    {
        $user = User::where('user_level', 2)->get();

        return $user;
    }
}
