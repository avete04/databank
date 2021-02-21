<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachments';

    protected $fillable = [
        'user_id',
        'file_name',
        'file'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
