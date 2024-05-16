<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizs', function (Blueprint $table) {
            $table->id();
            $table->text('soal_1');
            $table->text('pilihan_1');
            $table->text('jawaban_1'); 
            $table->text('soal_2');
            $table->text('pilihan_2');
            $table->text('jawaban_2');
            $table->text('soal_3');
            $table->text('pilihan_3');
            $table->text('jawaban_3');
            $table->text('soal_4');
            $table->text('pilihan_4');
            $table->text('jawaban_4');
            $table->text('soal_5');
            $table->text('pilihan_5');
            $table->text('jawaban_5');
            $table->text('soal_6');
            $table->text('pilihan_6');
            $table->text('jawaban_6');
            $table->text('soal_7');
            $table->text('pilihan_7');
            $table->text('jawaban_7'); 
            $table->text('soal_8');
            $table->text('pilihan_8');
            $table->text('jawaban_8');
            $table->text('soal_9');
            $table->text('pilihan_9');
            $table->text('jawaban_9');
            $table->text('soal_10');
            $table->text('pilihan_10');
            $table->text('jawaban_10'); 
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
        Schema::dropIfExists('quizs');
    }
}
