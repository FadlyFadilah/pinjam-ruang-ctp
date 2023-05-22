<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuangctpsTable extends Migration
{
    public function up()
    {
        Schema::create('ruangctps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('skpd');
            $table->string('bidang_kegiatan');
            $table->string('nama');
            $table->longText('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('kodepos');
            $table->string('no');
            $table->string('ktp');
            $table->string('instansi');
            $table->string('statusdiinstansi')->nullable();
            $table->string('bidanginstansi');
            $table->longText('alamatinstansi')->nullable();
            $table->date('mulai');
            $table->time('mulaijam');
            $table->date('selesai');
            $table->time('selesaijam');
            $table->string('nama_acara');
            $table->string('jumlah_peserta');
            $table->string('narasumber');
            $table->string('outpu')->nullable();
            $table->string('outcome')->nullable();
            $table->longText('ringkasan');
            $table->string('rundown')->nullable();
            $table->string('gladiresik')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}