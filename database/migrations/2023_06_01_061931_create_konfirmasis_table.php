<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
class CreateKonfirmasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('idlaporan');
            $table->string('nosuratpengantar')->nullable();
            $table->date('tglsuratpengantar')->nullable();
            $table->integer('nomorsp')->nullable();
            $table->string('tujuan');
            $table->string('alamat');
            $table->string('penerima')->nullable();
            $table->string('jabatanpenerima')->nullable();
            $table->date('tglditerima')->nullable();
            $table->string('token')->nullable();
            $table->date('tglkirim')->nullable();
            $table->date('tglekspedisi')->nullable();

            
        });

        $randomString = Str::random(10);
        DB::table('konfirmasis')->update(['token' => $randomString]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konfirmasis');
        
    }
}
