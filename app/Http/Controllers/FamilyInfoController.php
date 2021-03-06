<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\FamilyInfo;
use App\User;

class FamilyInfoController extends Controller
{
    public function add(Request $request)
    {
        $family_info = new FamilyInfo($request->all());

        if($family_info->save())
        {
            return response()->json([
                'status' => 1,
                'message' => 'Data addded'
            ]);
        }
        else 
        {
            return response()->json([
                'status' => 0,
                'message' => 'Failed to add data'
            ]);
        }
    }

    public function get()
    {
        $family_info = FamilyInfo::all();

        if($family_info->count() > 0)
        {
            return response()->json([
                'status' => 1,
                'message' => $family_info
            ]);
        }
        else
        {
            return response()->json([
                'status' => 0,
                'message' => 'No data found'
            ]);
        }
    }

    public function update(Request $request)
    {
        $family_info = FamilyInfo::find($request->get('family_id'));

        if($family_info)
        {
            $family_info->update($request->all());
            $family_info->save();

            return response()->json([
                'status' => 1,
                'message' => 'Data updated'
            ]);
        }
        else
        {
            return response()->json([
                'status' => 0,
                'message' => 'Failed to update data'
            ]);
        }
    }

    public function delete(Request $request)
    {
        $family_info = FamilyInfo::find($request->get('family_id'));

        if($family_info)
        {
            $family_info->delete();

            return response()->json([
                'status' => 1,
                'message' => 'Data deleted'
            ]);
        }
    }
}
