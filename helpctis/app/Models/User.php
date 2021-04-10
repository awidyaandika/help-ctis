<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'centre_id',
        'username',
        'password',
        'name',
        'gender',
        'dob',
        'email',
        'phone',
        'address',
        'position',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    protected $dates = [
        'dob'
    ];

    /**
     * Get the Manager that owns the Test Centre.
     */
    public function testcentre()
    {
        return $this->belongsTo(TestCentre::class, 'centre_id');
    }
}
