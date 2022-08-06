<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('rating');
            $table->string('genre');
            $table->integer('duration');
            $table->date('jadwalPenayangan');
            $table->date('jadwalPenutupan');
            $table->time('jamPenayangan')->nullable();
            $table->time('jamPenutupan')->nullable();
            $table->string('harga');
            $table->text('deskripsi');
            $table->string('file')->nullable();
            // $table->string('status')->nullable();
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
        Schema::dropIfExists('films');
    }
}
