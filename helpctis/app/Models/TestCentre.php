<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCentre extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'centreName',
        'address',
        'postalCode',
        'phone',
        'city',
    ];

    /**
     * Get the Test Centre for the Manager.
     */
    public function user()
    {
        return $this->hasMany('App\User');
    }
}
