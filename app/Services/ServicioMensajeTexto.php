<?php

namespace App\Services;

use App\Models\MensajeTexto;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

/**
 * Servicio para el envio de mensajes de texto
 * @package App\Services
 */
class ServicioMensajeTexto {

    //funcion para enviar mensaje
    public static function enviarMensaje(array $data, Collection $records)
    {
        $mensajesTexto = Collect([]);
        $records->map(function ($record) use ($data, $mensajesTexto)
        {
            $mensajeTexto =  self::enviarMensajeTexto($record, $data);
            $mensajesTexto->push($mensajeTexto);
        });

        MensajeTexto::insert($mensajesTexto->toArray());

    }

    //funcion para enviar mensjae de texto
    public static function enviarMensajeTexto(User $record, array $data): array
    {
        $mensaje = Str::replace('{name}', $record->name, $data['mensaje']);

        return [
            'mensaje' => $mensaje,
            'enviado_por' => auth()?->id() ?? null,
            'estado' => MensajeTexto::ESTADOS['PENDIENTE'],
            'respuesta' => '',
            'enviado_a' => $record->id,
            'comentarios' => $data['comentarios'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
