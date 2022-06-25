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
        Schema::create('soal_opsi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('soal_id')->constrained('soal');
            $table->enum('tipe_opsi', ['teks', 'gambar']);
            $table->text('opsi');
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
        Schema::dropIfExists('soal_opsi');
    }
};
