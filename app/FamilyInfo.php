<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyInfo extends Model
{
    protected $table = "family_infos";
    protected $fillable = [
        'user_id',
        'name',
        'relationship',
        'birth_day',
        'contact_no'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
