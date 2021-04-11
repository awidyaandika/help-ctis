<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestKit extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'centre_id',
        'test_name',
        'stock'
    ];

    public function testCentre()
    {
        return $this->belongsTo(TestCentre::class, 'centre_id');
    }
}
