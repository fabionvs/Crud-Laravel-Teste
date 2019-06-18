<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'nome' => Str::random(10),
            'valor' => rand(0, 1000),
            'quantidade' => rand(0, 100),
            'status' => 1
        ]);
        DB::table('produtos')->insert([
            'nome' => Str::random(10),
            'valor' => rand(0, 1000),
            'quantidade' => rand(0, 100),
            'status' => 1
        ]);
        DB::table('produtos')->insert([
            'nome' => Str::random(10),
            'valor' => rand(0, 1000),
            'quantidade' => rand(0, 100),
            'status' => 1
        ]);
    }
}
