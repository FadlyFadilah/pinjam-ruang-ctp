<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanChesTable extends Migration
{
    public function up()
    {
        Schema::create('peminjaman_ches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('ktp');
            $table->longText('alamat')->nullable();
            $table->string('no_hp');
            $table->string('email');
            $table->string('tujuan');
            $table->date('booking');
            $table->date('selesai')->nullable();
            $table->integer('jumlah');
            $table->string('infokus')->nullable();
            $table->boolean('persetujuan')->default(0);
            $table->boolean('persetujuan_2')->default(0);
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}