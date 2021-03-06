<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use Auth;
use DB;
use App\User;

class EmployeeController extends Controller
{
    public function add_employee(Request $request)
    {
        $validateData = $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'min:8'],
            'password_confirmation' => ['required_with', 'same:password', 'min:8']
        ]);


        $employee = new User([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'join_date' => $request->get('join_date'),
            'employee_id' => 'EM-'.Str::random(5),
            'mobile_no' => $request->get('mobile_no'),
            'profile_image' => null,
            'birth_day' => null,
            'gender' => null,
            'address' => null,
            'department_id' => $request->get('department_id'),
            'designation_id' => $request->get('designation_id'),
            'user_level' => 2,
            'is_active' => 1
        ]);

        if($employee->save())
        {
            return response()->json([
                'status' => 1,
                'message' => 'Employee added'
            ], 201);
        }
        else
        {
            return response()->json([
                'status' => 0,
                'message' => 'Failed to add employee'
            ], 422);
        }
    }

    public function get_all_employee()
    {
        $employee = User::join('departments', 'users.department_id', '=', 'departments.id')
        ->join('designations', 'users.designation_id', '=', 'designations.id')
        ->where('user_level', 2)
        ->select('users.id as user_id', 'designations.id as designation_id', 'departments.id as department_id', 'users.*', 'designations.*', 'departments.*')
        ->get();

        if($employee->count() > 0)
        {
            return response()->json([
                'status' => 1,
                'message' => $employee
            ]);
        }
        else
        {
            return false;
        }
    }

    public function get_employee(Request $request)
    {
        $employee = User::join('departments', 'users.department_id', '=', 'departments.id')
        ->join('designations', 'users.designation_id', '=', 'designations.id')
        ->select('users.id as user_id', 'designations.id as designation_id', 'departments.id as department_id', 'users.*', 'designations.*', 'departments.*')
        ->where('users.id', $request->get('user_id'))
        ->where('employee_id', $request->get('unique_id'))
        ->first();

        if($employee)
        {
            return response()->json([
                'status' => 1,
                'message' => $employee
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 0,
                'message' => 'Employee not found'
            ], 404);
        }
    }

    public function update_employee(Request $request)
    {
        $employee = User::find($request->get('user_id'));

        if($employee)
        {
            $employee->update($request->all());
            $employee->save();

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

    public function delete_employee(Request $request)
    {
        $employee = User::find($request->get('user_id'));
        if($employee)
        {
            $employee->delete();

            return response()->json([
                'status' => 1,
                'message' => 'Data has been deleted.'
            ]);
        }
        else
        {
            return response()->json([
                'status' => 0,
                'message' => 'Failed to delete data.'
            ], 500);
        }
    }

    public function upload_profile_image(Request $request)
    {
        $user = User::find($request->get('user_id'));

        if($request->hasFile('profile_image'))
        {
            $uploadedImage = $request->file('profile_image');
            $imageName = 'profile-'.time() . '.' . $uploadedImage->getClientOriginalExtension();
            $destinationPath = public_path('/images/profile');
            $uploadedImage->move($destinationPath, $imageName);
            $user->profile_image = '/images/profile/' . $imageName;
        }
        else
        {
            unlink(public_path($user->profile_image));
            $uploadedImage = $request->file('profile_image');
            $imageName = 'profile-'.time() . '.' . $uploadedImage->getClientOriginalExtension();
            $destinationPath = public_path('/images/profile');
            $uploadedImage->move($destinationPath, $imageName);
            $user->profile_image = '/images/profile/' . $imageName;
        }

        $user->save();
        return back();

    }

}
