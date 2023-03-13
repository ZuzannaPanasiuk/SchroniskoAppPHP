<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zwierzeta extends Model
{
    public $timestamps = false;

    protected $table='zwierzeta';

    protected $primaryKey='id';

    protected $fillable=['imie','gatunek','plec','rasa','wiek','historia'];

    public static function allZwierzeta()
    {
        return $allZwierzeta = Zwierzeta::all();
    }

    public static function zwierzetaGatunek($gatunek)
    {
        return $zwierzetaGatunek = Zwierzeta::all()->where('gatunek', $gatunek);
    }
}
