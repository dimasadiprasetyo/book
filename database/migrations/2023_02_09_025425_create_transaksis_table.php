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
            $table->string('nama_apk');
            // $table->char('id_master',10);
            $table->text('keterangan');
            $table->string('catatan');
            $table->text('Lk');
            $table->timestamps();

            // $table->foreignId('id_master')->constrained('masters')->nullOnDelete();
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
