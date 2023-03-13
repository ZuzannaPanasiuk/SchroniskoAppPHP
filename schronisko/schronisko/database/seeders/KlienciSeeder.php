<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Klienci.php;

class KlienciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('klienci')->insert([
            ['imie'=>'Mikołaj', 'nazwisko'=>'Piskorz', 'email'=>'miki.kiki@gmail.com'], 
            ['imie'=>'Michał', 'nazwisko'=>'Panasiuk', 'email'=>'halogen131@gmail.com'], 
            ['imie'=>'Martyna', 'nazwisko'=>'Nakraszewicz', 'email'=>'m.nak@gmail.com'],
            ]);
    }
}
