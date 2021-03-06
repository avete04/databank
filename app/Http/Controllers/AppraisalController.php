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
        $request->validate([
            'user_id' => 'required'
        ]);
        
        $appraisal = new Appraisal($request->all());
        
        if($appraisal->save())
        {
            return response()->json([
                'status' => 1,
                'message' => 'Data has been saved'
            ]);
        }
        else 
        {
            return response()->json([
                'status' => 0,
                'message' => 'All fields are required'
            ]);
        }


        
    }

    public function user()
    {
        $user = User::where('user_level', 2)->get();

        return $user;
    }

    public function get_all()
    {
        $appraisal = Appraisal::join('users', 'users.id', '=', 'appraisals.user_id')
        ->join('departments', 'departments.id', '=', 'users.department_id')
        ->join('designations', 'designations.id', '=', 'users.designation_id')
        ->select('appraisals.id as appraisal_id', 'appraisals.*', 'users.*', 'departments.*', 'designations.*')
        ->orderBy('appraisals.created_at', 'desc')
        ->get()
        ->groupBy('employee_id');

        $a = [];

        foreach($appraisal as $appraisal)
        {
            array_push($a, $appraisal);
        }

        return $a;
    }

    public function get($id)
    {
        $appraisal = Appraisal::where('user_id', $id)->get();

        $integrity = $appraisal->sum('integrity');
        $teamwork = $appraisal->sum('teamwork');
        $professionalism = $appraisal->sum('professionalism');
        $critical_thinking = $appraisal->sum('critical_thinking');
        $conflict_management = $appraisal->sum('conflict_management');
        $attendance = $appraisal->sum('attendance');
        $ability_to_make_deadline = $appraisal->sum('abiliti_to_make_deadline');
        $management = $appraisal->sum('management');
        $administration = $appraisal->sum('administration');
        $presentation_skill = $appraisal->sum('presentation_skill');
        $quality_of_work = $appraisal->sum('quality_of_work');
        $efficiency = $appraisal->sum('efficiency');

        return $integrity;

        // if($appraisal->count() > 0)
        // {
        //     return $appraisal;
        // }
    }
}
