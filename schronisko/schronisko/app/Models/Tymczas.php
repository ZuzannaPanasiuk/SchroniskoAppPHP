<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tymczas extends Model
{
    public $timestamps = false;

    protected $table='tymczas';

    protected $primaryKey='id';

    protected $fillable=['wolontariusz_id','zwierze_id','data_poczatkowa','data_koncowa'];

    public static function allTymczas()
    {
        return $alltymczas = Tymczas::all();
    }
}