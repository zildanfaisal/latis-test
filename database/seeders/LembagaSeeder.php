<?php

namespace Database\Seeders;

use App\Models\Lembaga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LembagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lembaga::insert([
            ['nama_lembaga' => 'latiseducation'],
            ['nama_lembaga' => 'tutorindonesia'],
        ]);
    }
}
