<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->nombre = 'admin';
        $role->descripcion = 'Administrador';
        $role->save();

        $role = new Role();
        $role->nombre = 'nutricionista';
        $role->descripcion = 'Nutricionista';
        $role->save();

        $role = new Role();
        $role->nombre = 'entrenador';
        $role->descripcion = 'Entrenador';
        $role->save();
        
        $role = new Role();
        $role->nombre = 'corredor';
        $role->descripcion = 'Corredor';
        $role->save();
    }
}
