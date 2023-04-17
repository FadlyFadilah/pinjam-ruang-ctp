<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudioFotosTable extends Migration
{
    public function up()
    {
        Schema::create('studio_fotos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pemohon');
            $table->longText('alamat');
            $table->string('wa');
            $table->string('produk');
            $table->longText('profil');
            $table->string('konten');
            $table->string('oss');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}