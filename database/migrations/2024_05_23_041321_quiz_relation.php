<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuizRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
        Schema::table('quizs', function (Blueprint $table) {
            $table->unsignedBigInteger('guru_id')->after('jawaban_5'); // Menambah kolom 'guru_id' setelah kolom 'jawaban_5'
            $table->foreign('guru_id')->references('id')->on('users'); // Menetapkan kunci asing ke kolom 'id' di tabel 'users'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quizs', function (Blueprint $table) {
            $table->dropForeign(['guru_id']); // Menghapus kunci asing dari kolom 'guru_id'
            $table->dropColumn('guru_id'); // Menghapus kolom 'guru_id' jika migrasi di-rollback
        });
    }
}
