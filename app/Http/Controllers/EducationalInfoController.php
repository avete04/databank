<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\EducationalInfo;

class EducationalInfoController extends Controller
{
    public function add(Request $request)
    {
        $educational_info = new EducationalInfo($request->all());

        if($educational_info->save())
        {
            return response()->json([
                'status' => 1,
                'message' => 'Data added'
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
        $educational_info = EducationalInfo::all();

        if($educational_info->count() > 0)
        {
            return response()->json([
                'status' => 1,
                'message' => $educational_info
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
        $educational_info = EducationalInfo::find($request->get('id'));

        if($educational_info)
        {
            $educational_info->update([
                'school' => $request->get('school'),
                'course' => $request->get('course'),
                'start' => $request->get('start'),
                'end' => $request->get('end')
            ]);

            $educational_info->save();

            return response()->json([
                'status' => 1,
                'message' => 'Data updated'
            ]);
        }   
    }

    function delete(Request $request)
    {
        $educational_info = EducationalInfo::find($request->get('id'));
        if($educational_info)
        {
            $educational_info->delete();
            return response()->json([
                'status' => 1,
                'message' => 'Data deleted'
            ]);
        }
    }
}
