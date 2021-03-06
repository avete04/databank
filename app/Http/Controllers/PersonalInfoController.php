<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\User;
use App\PersonalInfo;

class PersonalInfoController extends Controller
{
    public function add_personal_info(Request $request)
    {
        $check = PersonalInfo::where('user_id', $request->get('user_id'))->first();

        if($check)
        {
            $check->update($request->all());

            if($check->save())
            {
                return response()->json([
                    'status' => 1,
                    'message' => 'Data has been update.'
                ], 200);
            }
            else
            {
                return response()->json([
                    'status' => 0,
                    'message' => 'Failed'
                ], 500);
            }
        }
        else
        {
            $personal_info = PersonalInfo::create($request->all());

            if($personal_info->save())
            {
                return response()->json([
                    'status' => 1,
                    'message' => 'Data has been created.'
                ], 200);
            }
            else
            {
                return response()->json([
                    'status' => 0,
                    'message' => 'Failed'
                ], 500);
            }
        }
    }

    public function get_personal_info(Request $request)
    {
        $personal_info = PersonalInfo::where('user_id', $request->get('user_id'))->first();

        if($personal_info)
        {
            return response()->json([
                'status' => 1,
                'message' => $personal_info
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 0,
                'message' => 'Personal info not found'
            ], 404);
        }
    }
}
