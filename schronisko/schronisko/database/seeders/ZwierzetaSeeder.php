<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Zwierzeta.php;

class ZwierzetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zwierzeta')->insert([
            ['imie'=>'Nocuś', 'gatunek'=>'kot', 'plec'=>'M', 'rasa'=>'pers/angora', 'wiek'=>'5', 'historia'=>'Poprzedni właściciele nie mogli się nim zajmować po przeprowadzce'], 
            ['imie'=>'Skipper', 'gatunek'=>'kot', 'plec'=>'M', 'rasa'=>'mieszaniec', 'wiek'=>'2', 'historia'=>'Zgarnięty z ulicy, po udziale w wypadku samochodowym'], 
            ['imie'=>'Luna', 'gatunek'=>'pies', 'plec'=>'K', 'rasa'=>'flat retriver', 'wiek'=>'5', 'historia'=>'Poprzedni właściciele nie mieli funduszy, by zapewnić psu odpowiednią opiekę medyczną. Miała złamaną prawą, przednią łapę'], 
            ]);
    }
}
