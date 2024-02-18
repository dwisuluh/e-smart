<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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

    public function adminlte_image()
    {
        // return 'https://picsum.photos/300/300';
        return Auth::user()->avatar;
    }
    public function adminlte_desc()
    {
        return 'That\'s a nice guy';
    }
    public function adminlte_profile_url()
    {
        return 'profile/username';
    }

    public function getRoleAttribute($value)
    {
        switch ($value) {
            case 1:
                return 'superadmin';
            case 2:
                return 'admin';
            case 3:
                return 'Verifikator'; // Sesuaikan dengan label yang sesuai untuk nilai ENUM 3
            case 4:
                return 'dst'; // Sesuaikan dengan label yang sesuai untuk nilai ENUM 4
            default:
                return 'Non Role';
        }
    }
}
