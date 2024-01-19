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
        Schema::create('arsip_ktps', function (Blueprint $table) {
            $table->id();
            $table->string('jenisKTP');
            $table->string('nama');
            $table->string('noKK');           
            $table->string('nik');
            $table->text('alamat');
            $table->string('RT');
            $table->string('RW');
            $table->string('kodePos');
            $table->date('tglSurat');
            $table->string('Camat');
            $table->string('lurah');
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
        Schema::dropIfExists('arsip_ktps');
    }
};
