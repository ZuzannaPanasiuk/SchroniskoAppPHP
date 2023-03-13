<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wolontariusze extends Model
{
    public $timestamps = false;

    protected $table='wolontariusze';

    protected $primaryKey='id';

    protected $fillable=['imie','nazwisko','nr_tel','rola'];

    public static function allWolontariusze()
    {
        return $allWolontariusze = Wolontariusze::all();
    }

    public static function findWolontariuszById($id)
    {
        return $wolontariuszZBazy = Wolontariusze::find($id);
    }
}