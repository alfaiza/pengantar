<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nolaporan');
            $table->date('tgllaporan');
            $table->string('judullaporan');
            $table->date('tglpenyerahan')->nullable();
            $table->string('pengirim')->nullable();
            $table->date('tglkirim')->nullable();
            $table->string('penginput')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}
