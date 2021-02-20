<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    protected $table = 'emergency_contacts';

    protected $fillable = [
        'user_id',
        'name',
        'relationship',
        'contact_no'
    ];
}
