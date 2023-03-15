<?php

namespace App\Models;

use App\Supports\Traits\HasUuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Apply extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'apply_date',
        'first_name',
        'last_name',
        'gender',
        'age',
        'post_code',
        'prefecture',
        'city',
        'address',
        'building',
        'phone',
        'email',
        'user_id',
        'qanda',
        'receipt_image_required',
        'receipt_image_optional',
        'flag',
        'flag_option',
    ];

    protected $appends = [
        'full_name',
    ];

    protected $casts = [
        'qanda' => AsCollection::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function receipts(): HasMany
    {
        return $this->HasMany(Receipt::class);
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getCityAttribute(): string
    {
        return mb_convert_kana($this->attributes['city'], 'AS');
    }

    public function getAddressAttribute(): string
    {
        return mb_convert_kana($this->attributes['address'], 'AS');
    }

    public function getBuildingAttribute(): string
    {
        return mb_convert_kana($this->attributes['building'], 'AS');
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

    public function scopeName($query, $value)
    {
        return $query->where('first_name', 'like', '%'.$value.'%')->orWhere('last_name', 'like', '%'.$value.'%');
    }

    public function scopeFlag($query, $value)
    {
        return $query->where('flag', 'like', '%'.$value.'%')->orWhere('flag_option', 'like', '%'.$value.'%');
    }
}
