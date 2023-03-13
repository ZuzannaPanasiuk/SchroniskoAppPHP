<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Adopcje.php;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adopcje', function (Blueprint $table) {
            $table->id();
            $table->integer('klient_id')->unsigned();
            $table->foreign('klient_id')->references('id')->on('klienci');
            $table->integer('zwierze_id')->unsigned();
            $table->foreign('zwierze_id')->references('id')->on('zwierzeta');
            $table->date('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adopcje');
    }
};
