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

    public function rols()
    {
        return $this->belongsToMany(Rol::class);
    }

    public function hasPermiso(string $permiso) : bool {
        $permisosArray = [];

        foreach ($this->rols as $rol) {
            foreach ($rol->permisos as $UnicoPermiso) {
                $permisosArray[] = $UnicoPermiso->nombre;
            }
        }

        return collect($permisosArray)->unique()->contains($permiso);
    }

    public function hasRol(string $rol) : bool {
        return $this->rols()->where('nombre', $rol)->exists();
    }
}
