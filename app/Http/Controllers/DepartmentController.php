<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Department;

class DepartmentController extends Controller
{
    public function add_department(Request $request)
    {
        $department = new Department([
            'department_name' => $request->get('department_name')
        ]);

        if($department)
        {
            $department->save();
            return response()->json([
                'status' => 1,
                'message' => 'Department added'
            ], 201);
        }
        else
        {
            return response()->json([
                'status' => 0,
                'message' => 'Failed to add department'
            ], 500);
        }
    }

    public function get_department(Request $request)
    {
        $department = Department::find($request->get('department_id'));

        if($department)
        {
            return response()->json([
                'status' => 1,
                'message' => $department
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 0,
                'message' => 'No departments found'
            ], 500);
        }
    }

    public function update_department(Request $request)
    {
        $department = Department::find($request->get('department_id'));

        if($department)
        {
            $department->department_name = $request->get('department_name');
            $department->save();

            return response()->json([
                'status' => 1,
                'message' => 'Department updated'
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 0,
                'message' => 'Failed to update department'
            ], 500);
        }
    }

    public function delete_department(Request $request)
    {
        $department = Department::find($request->get('department_id'));

        if($department)
        {
            $department->delete();

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

    public function get_all_department()
    {
        $department = Department::all();

        if($department)
        {
            return $department;
        }
    }
}
