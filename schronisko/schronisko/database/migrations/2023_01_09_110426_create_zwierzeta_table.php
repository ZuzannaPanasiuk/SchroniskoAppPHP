<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zwierzeta', function (Blueprint $table) {
            $table->id();
            $table->string('imie')->unique();
            $table->string('gatunek');
            $table->string('plec');
            $table->string('rasa');
            $table->string('wiek');
            $table->string('historia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zwierzeta');
    }
};
