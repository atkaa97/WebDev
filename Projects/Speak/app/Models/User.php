<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const MALE   = 1;
    const FEMALE = 0;


    const PENDING = 1;
    const APPROVED = 2;
    const REJECTED = 3;

    protected $appends = ['full_name'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'phone', 'gender', 'api_token', 'day', 'month', 'year', 'status', 'password', 'is_admin'
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
     * @return array
     */
    public static function getStatuses()
    {
        return [
            'approved' => self::APPROVED,
            'rejected' => self::REJECTED,
            'pending'  => self::PENDING
        ];
    }


    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->attributes['name'] . ' ' . $this->attributes['surname'];
    }

    /**
     * @return mixed
     */
    public function getGenderAttribute() {
        $genders = [
            self::MALE   => 'Male',
            self::FEMALE => 'Female'
        ];

        return $genders[$this->attributes['gender']];
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function team()
    {
        return $this
            ->hasOne(UserTeam::class, 'user_id', 'id')
            ->with('team');
    }
}
