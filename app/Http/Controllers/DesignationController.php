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
        ->select('designations.id as designation_id', 'departments.id as department_id', 'designations.*', 'departments.*')
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

    public function update_designation(Request $request)
    {
        $designation = Designation::find($request->get('designation_id'));

        if($designation)
        {
            $designation->designation_name = $request->get('designation_name');
            $designation->department_id = $request->get('department_id');

            $designation->save();

            return response()->json([
                'status' => 1,
                'message' => 'Data has been updated.'
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 0,
                'message' => 'Failed to update data.'
            ], 500);
        }
    }

    public function delete_designation(Request $request)
    {
        $designation = Designation::find($request->get('designation_id'));

        if($designation)
        {
            $designation->delete();

            return response()->json([
                'status' => 1,
                'message' => 'Data has been deleted.'
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 0,
                'message' => 'Failed to delete data.'
            ], 500);
        }
    }
}
