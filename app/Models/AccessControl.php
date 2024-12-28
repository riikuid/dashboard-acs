<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccessControl extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'identity',
        'ip_address',
        'is_active',
        'note',
    ];
}
