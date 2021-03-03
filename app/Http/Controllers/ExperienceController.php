<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Experience;

class ExperienceController extends Controller
{
    public function add_experience(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'position' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);

        $experience = new Experience($request->all());
        if($experience->save())
        {
            return response()->json([
                'status' => 1,
                'message' => 'Data has been added'
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

    public function get_all()
    {
        $experience = Experience::all();
        if($experience->count() > 0)
        {
            return response()->json([
                'status' => 1,
                'message' => $experience
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
}
