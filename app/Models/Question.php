<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'type',
        'title',
        'answers',
        'have_other_option',
        'other_option_name',
        'order',
        'is_required',
        'options',
        'key',
    ];

    protected $casts = [
        'answers' => 'array',
        'options' => 'array',
    ];
}
