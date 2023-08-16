<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'organization',
        'title',
        'description',
        'date',
        'time',
        'location'
    ];

    public function rsvps()
    {
        return $this->hasMany(Rsvp::class);
    }

}
