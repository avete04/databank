<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalInfo extends Model
{
    protected $table = 'educational_infos';

    protected $fillable = [
        'user_id',
        'school',
        'course',
        'start',
        'end'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
