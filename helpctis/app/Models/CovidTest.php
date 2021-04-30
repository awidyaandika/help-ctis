<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovidTest extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'officer_name',
        'patient_name',
        'test_date',
        'test_name',
        'symptoms',
        'result_date',
        'status',
        'result',
    ];

    protected $dates = [
        'test_date',
        'result_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
