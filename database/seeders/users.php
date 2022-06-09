<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $calve='$2y$10$VDWy1n/f1mwi0oXd73IZT.SKcjmfMSAQFvjhGuYuw.BVgM5fF7QN6';
        DB::table('users')->insert([
            "name"=>"admin",
            "email"=>"admin@admin.com",
            "password"=>$calve,
            "tipo_usuario"=>"1"

        ]);
    }
}
