<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FingerPrint extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'person_id',
        'finger_data',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
