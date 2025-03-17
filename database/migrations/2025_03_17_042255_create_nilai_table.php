<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id(); // ID untuk tabel nilai
            $table->unsignedBigInteger('student_id'); // Foreign key untuk tabel students
            $table->unsignedBigInteger('teacher_id'); // Foreign key untuk tabel teachers
            $table->unsignedBigInteger('mapel_id'); // Foreign key untuk tabel mapels
            $table->integer('nilai'); // Nilai yang diberikan
            $table->timestamps(); // Waktu pembuatan dan update

            // Mendefinisikan foreign key constraints
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('mapel_id')->references('id')->on('mapels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai');
    }
}
