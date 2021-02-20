<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expreience extends Model
{
    protected $table = 'expreiences';

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
