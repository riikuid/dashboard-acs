<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'card_data',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
