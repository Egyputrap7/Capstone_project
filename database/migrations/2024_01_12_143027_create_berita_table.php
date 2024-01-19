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
        Schema::create('berita_desas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('noBerita')->unique();;
            $table->string('image')->nullable();
            $table->string('judul');
            $table->string('keterangan');
            $table->timestamps();
            $table->boolean('published')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita_desas');
    }
};
