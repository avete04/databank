<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';

    protected $fillable = [
        'user_id',
        'company',
        'position',
        'start',
        'end'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
