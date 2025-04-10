<?php

namespace Database\Seeders;

use App\Models\Permiso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            [
                'nombre' => 'crear-permiso'
            ],
            [
                'nombre' => 'editar-permiso'
            ],
            [
                'nombre' => 'eliminar-permiso',
            ],
            [
                'nombre' => 'listar-permiso',
            ],
            [
                'nombre' => 'visualizar-permiso',
            ],
            [
                'nombre' => 'exportar-permiso',
            ],
            [
                'nombre' => 'acceso-permiso',
            ],
            [
                'nombre' => 'crear-rol',
            ],
            [
                'nombre' => 'editar-rol',
            ],
            [
                'nombre' => 'eliminar-rol',
            ],
            [
                'nombre' => 'listar-roles',
            ],
            [
                'nombre' => 'visualizar-rol',
            ],
            [
                'nombre' => 'exportar-rol',
            ],
            [
                'nombre' => 'acceso-rol',
            ],
            [
                'nombre' => 'crear-usuario',
            ],
            [
                'nombre' => 'editar-usuario',
            ],
            [
                'nombre' => 'eliminar-usuario',
            ],
            [
                'nombre' => 'listar-usuario',
            ],
            [
                'nombre' => 'visualizar-usuario',
            ],
            [
                'nombre' => 'exportar-usuario',
            ],
            [
                'nombre' => 'acceso-usuario',
            ],
            [
                'nombre' => 'crear-categoria',
            ],
            [
                'nombre' => 'editar-categoria',
            ],
            [
                'nombre' => 'eliminar-categoria',
            ],
            [
                'nombre' => 'listar-categoria',
            ],
            [
                'nombre' => 'visualizar-categoria',
            ],
            [
                'nombre' => 'exportar-categoria',
            ],
            [
                'nombre' => 'acceso-categoria',
            ],
            [
                'nombre' => 'crear-ticket',
            ],
            [
                'nombre' => 'editar-ticket',
            ],
            [
                'nombre' => 'eliminar-ticket',
            ],
            [
                'nombre' => 'listar-ticket',
            ],
            [
                'nombre' => 'visualizar-ticket',
            ],
            [
                'nombre' => 'exportar-ticket',
            ],
            [
                'nombre' => 'acceso-ticket',
            ],


        ];

        Permiso::insert($permisos);
    }
}
