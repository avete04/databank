<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Designation;
use DB;

class DesignationController extends Controller
{
    public function add_designation(Request $request)
    {
        $designation = new Designation([
            'designation_name' => $request->get('designation_name'),
            'department_id' =>  $request->get('department_id')
        ]);

        if($designation->save())
        {
            return response()->json([
                'status' => 1,
                'message' => 'New data added'
            ], 201);
        }
        else
        {
            return response()->json([
                'status' => 0,
                'message' => 'Failed to add data.'
            ], 500);
        }
    }

    public function get_designation(Request $request)
    {
        $designation = DB::table('designations')
        ->join('departments', 'departments.id', '=', 'designations.department_id')
        ->get();

        if($designation)
        {
            return response()->json([
                'status' => 1,
                'message' => $designation
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 0,
                'message' => 'Designation not found.'
            ], 404);
        }
    }
}
