<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klienci extends Model
{
    public $timestamps = false;

    protected $table='klienci';

    protected $primaryKey='id';

    protected $fillable=['imie','nazwisko','email'];

    public static function allKlienci()
    {
        return $allKlienci = Klienci::all();
    }
}
