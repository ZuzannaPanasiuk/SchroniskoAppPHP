<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Adopcje.php;

class AdopcjeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tymczas')->insert([
            ['klient_id'=>2, 'zwierze_id'=>1, 'data'=>'2022-09-17'], 
            ['klient_id'=>2, 'zwierze_id'=>2, 'data'=>'2022-11-28'], 
            ]);
    }
}
