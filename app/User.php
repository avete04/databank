<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'join_date',
        'employee_id',
        'mobile_no',
        'profile_image',
        'birth_day',
        'gender',
        'address',
        'category',
        'department_id',
        'designation_id',
        'user_level',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function personal_info()
    {
        return $this->hasOne('App\PersonalInfo');
    }
    
    public function emegency_contact()
    {
        return $this->hasOne('App\EmergencyContact');
    }

    public function family_info()
    {
        return $this->hasMany('App\FamilyInfo');
    }

    public function educational_info()
    {
        return $this->hasMany('App\EducationalInfo');
    }

    public function experience()
    {
        return $this->hasMany('App\Experience');
    }

    public function attachment()
    {
        return $this->hasMany('App\Attachment');
    }

    public function appraisal()
    {
        return $this->hasMany('App\Appraisal');
    }
}
