<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasile', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->unsignedBigInteger('id_quiz');
            $table->foreign('id_quiz')->references('id')->on('quizs');
            $table->string('hasil');
            $table->enum('seleksi', ['lolos', 'gagal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil');
    }
}
