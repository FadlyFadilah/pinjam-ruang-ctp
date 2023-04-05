<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanBarangsTable extends Migration
{
    public function up()
    {
        Schema::create('peminjaman_barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_usaha');
            $table->longText('alamat')->nullable();
            $table->string('name');
            $table->string('ktp');
            $table->date('booking');
            $table->string('tujuan');
            $table->string('no_hp');
            $table->string('email');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}