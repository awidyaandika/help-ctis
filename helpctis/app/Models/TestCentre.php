<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCentre extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'centre_name',
        'address',
        'postal_code',
        'phone',
        'city',
    ];

    /**
     * Get the Test Centre for the Manager.
     */
    public function user()
    {
        return $this->hasMany(User::class, 'centre_name');
    }

    public function testKit()
    {
        return $this->hasMany(TestKit::class, 'centre_id');
    }
}
