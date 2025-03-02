<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function scopeSelf($query)
    {
        return $query->where('id',auth()->id());
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function productsToCart(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->wherePivot('order_id', '=',null);
    }

    public function productsUserToCart(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->with('category')->withPivot('qty','order_id')->wherePivot('order_id', '=',null);
    }


    public function productsCount()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty');
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }


}
