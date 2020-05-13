<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        //$this->call(RoleTableSeeder::class);

        $path = 'public/datosBD.sql';
        DB::unprepared(file_get_contents($path));
    }
}
