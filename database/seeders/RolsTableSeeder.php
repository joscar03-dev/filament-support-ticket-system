<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rols = [
            [
                'id' => '1',
                'nombre' => Rol::ROLS['Administrador'],
            ],
            [
                'id' => '2',
                'nombre' => Rol::ROLS['Moderador'],
            ],
        ];

        Rol::insert($rols);
    }
}
