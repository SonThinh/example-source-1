<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'login_id',
        'password',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function scopeRole($query, $role)
    {
        return $query->whereHas('roles', function ($query) use ($role) {
            return $query->where('name', $role);
        });
    }

    public function getCreatedAtAttribute($date): string
    {
        return Carbon::createFromTimestamp(strtotime($date))
                     ->timezone(config('app.timezone'))
                     ->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date): string
    {
        return Carbon::createFromTimestamp(strtotime($date))
                     ->timezone(config('app.timezone'))
                     ->format('Y-m-d H:i:s');
    }
}
