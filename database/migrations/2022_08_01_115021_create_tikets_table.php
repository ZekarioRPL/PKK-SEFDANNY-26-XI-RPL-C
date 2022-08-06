<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('film_id');
            $table->foreignId('bioskop_id');
            $table->foreignId('user_id');
            $table->string('kodeKursi');
            $table->string('reference');
            $table->string('merchant_ref');
            $table->integer('amount');
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
            $table->date('tanggalPembelian');
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
        Schema::dropIfExists('tikets');
    }
}
