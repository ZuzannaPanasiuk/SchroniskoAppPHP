<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tymczas.php;

class TymczasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tymczas')->insert([
            ['wolontariusz_id'=>3, 'zwierze_id'=>3, 'data_poczatkowa'=>'2022-12-20', 'data_koncowa'=>'2023-04-20'], 
            ['wolontariusz_id'=>2, 'zwierze_id'=>2, 'data_poczatkowa'=>'2022-08-10', 'data_koncowa'=>'2022-11-20'], 
            ]);
    }
}
