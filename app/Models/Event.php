<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'title',
        'date',
        'description',
        'city',
        'private',
        'image',
        'items',
        'user_id'
    ];

    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = [
        'date'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
