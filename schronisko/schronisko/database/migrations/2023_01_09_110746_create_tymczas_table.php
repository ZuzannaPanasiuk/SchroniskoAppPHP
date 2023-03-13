<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Tymczas.php;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tymczas', function (Blueprint $table) {
            $table->id();
            $table->integer('wolontariusz_id')->unsigned();
            $table->foreign('wolontariusz_id')->references('id')->on('wolontariusze');
            $table->integer('zwierze_id')->unsigned();
            $table->foreign('zwierze_id')->references('id')->on('zwierzeta');
            $table->date('data_poczatkowa');
            $table->date('data_koncowa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tymczas');
    }
};
