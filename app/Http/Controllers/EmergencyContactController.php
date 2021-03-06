<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\EmergencyContact;
use App\User;


class EmergencyContactController extends Controller
{
    public function add(Request $request)
    {
        $emergency_contact = EmergencyContact::where('user_id', $request->get('user_id'))->first();

        if($emergency_contact)
        {
            $emergency_contact->update($request->all());
            $emergency_contact->save();

            return response()->json([
                'status' => 1,
                'message' => 'Data updated'
            ]);
        }
        else
        {
            $emergency_contact = new EmergencyContact($request->all());
            $emergency_contact->save();

            return response()->json([
                'status' => 1,
                'message' => 'Data created'
            ]);
        }
    }

    public function get($id)
    {
        $emergency = EmergencyContact::where('user_id', $id)->first();

        if($emergency)
        {
            return $emergency;
        }
    }
}
