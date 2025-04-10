<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    const ROLS = [
        'Administrador' => 'Administrador',
        'Moderador' => 'Moderador',
        'Usuario' => 'Usuario',
        'Visitante' => 'Visitante'
    ];

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
