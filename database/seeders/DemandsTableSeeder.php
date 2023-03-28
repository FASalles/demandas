<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('demands')->insert([
            'title' => 'Demanda Exemplo',
            'description' => 'Descrição Demanda',
            'body' => 'Conteúdo Demanda',
            'slug' => 'post-exemplo',
            'thumb' => 'thumb-test.png',
            'created_at' => date ('Y-m-d H:i:s'),
            'updated_at' => date ('Y-m-d H:i:s'),
        ]);
    }
}
