<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bab');
            $table->text('isi_bab');
            $table->text('deskripsi');
            $table->unsignedBigInteger('id_quiz');
            $table->foreign('id_quiz')->references('id')->on('quizs');
            $table->unsignedBigInteger('id_matpel');
            $table->foreign('id_matpel')->references('id')->on('matpel');
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
        Schema::dropIfExists('materi');
    }
}
