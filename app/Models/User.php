<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'phone',
        'instagram',
        'role',
        'image',
        'address',
        'city',
        'province',
        'postal_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'two_factor_confirmed_at'

    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Cek apakah user adalah admin
    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    // Cek apakah user adalah author
    public function isAuthor()
    {
        return $this->role == 'author';
    }

    // Cek apakah user adalah user
    public function isUser()
    {
        return $this->role == 'user';
    }

    // Relasi One-to-Many dengan Article
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function products()
    {
        return $this->hasMany(Products::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }
}
