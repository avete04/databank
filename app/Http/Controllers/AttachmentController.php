<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Attachment;
use App\User;

class AttachmentController extends Controller
{
    public function add(Request $request)
    {

        $attachment = new Attachment();
        $attachment->user_id = $request->get('user_id');
        $attachment->file_name = $request->get('add_file_name');

        if($request->hasFile('add_file'))
        {
            $uploadedImage = $request->file('add_file');
            $imageName = 'attachment-'.time() . '.' . $uploadedImage->getClientOriginalExtension();
            $destinationPath = public_path('/images/attachments');
            $uploadedImage->move($destinationPath, $imageName);
            $attachment->file = '/images/attachments/' . $imageName;

            $attachment->save();
            return back();
        }
    }

    public function get_all()
    {
        $attachment = Attachment::all();

        if($attachment->count() > 0)
        {
            return response()->json([
                'status' => 1,
                'message' => $attachment
            ]);
        }
    }

    public function update(Request $request)
    {
        $attachment = Attachment::find($request->get('attachment_id'));

        if($attachment)
        {
            $attachment->file_name = $request->get('edit_file_name');

            if($request->hasFile('edit_file'))
            {
                unlink(public_path($attachment->file));
                $uploadedImage = $request->file('edit_file');
                $imageName = 'attachment-'.time() . '.' . $uploadedImage->getClientOriginalExtension();
                $destinationPath = public_path('/images/attachments');
                $uploadedImage->move($destinationPath, $imageName);
                $attachment->file = '/images/attachments/' . $imageName;
            }

            $attachment->save();
            return back();
        }
    }

}
