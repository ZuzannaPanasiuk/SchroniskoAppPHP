<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopcje extends Model
{
    public $timestamps = false;

    protected $table='adopcje';

    protected $primaryKey='id';

    protected $fillable=['klient_id','zwierze_id','data'];

    public static function allAdopcje()
    {
        return $allAdopcje = Adopcje::all();
    }
}