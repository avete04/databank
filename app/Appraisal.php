<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{
    protected $table = 'appraisals';

    protected $fillable = [
        'user_id',
        'integrity',
        'professionalism',
        'teamwork',
        'critical_thinking',
        'conflict_management',
        'attendance',
        'ability_to_make_deadline',
        'management',
        'administration',
        'presentation_skill',
        'quality_of_work',
        'efficiency'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
