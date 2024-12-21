<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'nama_lengkap',
        'no_hp',
        'alamat',
        'role',
        'status',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relasi dengan Merchant (jika user adalah merchant)
    public function merchant()
    {
        return $this->hasOne(Merchant::class, 'id_user');
    }

    // Relasi dengan Pesanan (sebagai customer)
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_user');
    }

    // Relasi dengan Review
    public function review()
    {
        return $this->hasMany(Review::class, 'id_user');
    }

    // Helper method untuk cek role
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isMerchant()
    {
        return $this->role === 'merchant';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }
}
