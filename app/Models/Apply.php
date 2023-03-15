<?php

namespace App\Models;

use App\Supports\Traits\HasUuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Apply extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'apply_date',
        'data ',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /** Scopes Start */
    public function scopeApplyDateStart($query, $date)
    {
        return $query->whereRaw('DATE(apply_date) >= ?', [Carbon::parse($date)->startOfDay()]);
    }

    public function scopeApplyDateEnd($query, $date)
    {
        return $query->whereRaw('DATE(apply_date) <= ?', [Carbon::parse($date)->endOfDay()]);
    }
}
