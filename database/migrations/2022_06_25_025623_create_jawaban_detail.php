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
        Schema::create('jawaban_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jawaban_id')->constrained('jawaban');
            $table->foreignId('soal_id')->constrained('soal');
            $table->foreignId('soal_opsi_id')->constrained('soal_opsi');
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
        Schema::dropIfExists('jawaban_detail');
    }
};
