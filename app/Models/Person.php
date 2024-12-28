<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'user_type',
        'begin_time',
        'end_time',
        'user_verify_mode',
        'note',
    ];

    public function fingers()
    {
        return $this->hasMany(FingerPrint::class);
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
