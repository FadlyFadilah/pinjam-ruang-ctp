<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanRuangKacaBitcsTable extends Migration
{
    public function up()
    {
        Schema::create('peminjaman_ruang_kaca_bitcs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('ktp');
            $table->longText('alamat')->nullable();
            $table->string('no_hp');
            $table->string('email');
            $table->date('tanggal_booking');
            $table->date('selesai_booking')->nullable();
            $table->integer('jumlah');
            $table->boolean('aggrement')->default(0);
            $table->string('infokus')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}