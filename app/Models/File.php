<?php

namespace App\Models;

use App\Supports\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $fillable = [
        'name',
        'size',
        'mime_type',
        'path',
        'upload_date_time',
    ];
}
