<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensajeTexto extends Model
{
    use HasFactory;

    protected $fillable = [
        'mensaje',
        'respuesta',
        'enviado_a',
        'enviado_por',
        'estado',
        'comentarios',
    ];

    const ESTADOS = [
        "PENDIENTE" => "PENDIENTE",
        "ÉXITO" => "ÉXITO",
        " FALLIDO" => "FALLIDO",
    ];
    public function enviarA(){
        return $this->belongsTo(User::class, 'enviado_a',);
    }
    public function enviadoPor(){
        return $this->belongsTo(User::class, 'enviado_por',);
    }
}
