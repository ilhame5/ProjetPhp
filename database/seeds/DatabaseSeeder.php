<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        DB::table('teachers')->insert([
            'email' => 'admin@parisnanterre.fr',
            'password' => bcrypt('admin'),
        ]);

        DB::table('teachers')->insert([
            'email' => 'test@parisnanterre.fr',
            'password' => bcrypt('test'),
        ]);
    }
}
