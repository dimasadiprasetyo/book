<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id_ts');
            $table->text('keterangan')->nullable();
            $table->date('tgl')->nullable();
            $table->text('Lk')->nullable();
            $table->string('id_nama')->nullable();
            $table->timestamps();

            $table->foreign('id_nama')->references('id')->on('jenis');
            $table->foreignId('id_master')->nullable()->constrained('masters')->OnDelete('set null')->onUpdate('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
