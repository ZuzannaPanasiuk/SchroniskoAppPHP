<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wolontariusze.php;

class WolontariuszeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wolontariusze')->insert([
            ['imie'=>'Maciej', 'nazwisko'=>'Łabiak', 'nr_tel'=>'222333444', 'rola'=>'wyprowadzacz psów'], 
            ['imie'=>'Mikołaj', 'nazwisko'=>'Żyliński', 'nr_tel'=>'777666777', 'rola'=>'dom tymczasowy'],
            ['imie'=>'Ewa', 'nazwisko'=>'Chłosta', 'nr_tel'=>'887887887', 'rola'=>'dom tymczasowy'],
            ]);
    }
}
