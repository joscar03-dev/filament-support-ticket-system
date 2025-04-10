<?php

namespace Database\Seeders;

use App\Models\Permiso;
use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermisoRolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos_admin = Permiso::all();

        $permisos_agente = Permiso::whereIn('nombre', [
            'acceso-categoria',
            'visualizar-categoria',
            'acceso-ticket',
            'visualizar-ticket',
        ])->get();

        Rol::find(1)->permisos()->sync($permisos_admin);
        Rol::find(2)->permisos()->sync($permisos_agente);
    }
}
