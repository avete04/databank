<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    protected $table = 'personalinfos';

    protected $fillable = [
        'user_id',
        'nationality',
        'religion',
        'marital_status',
        'employment_of_spouse',
        'no_of_children'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
