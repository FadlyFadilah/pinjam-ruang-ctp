<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanStudioDubbingsTable extends Migration
{
    public function up()
    {
        Schema::create('peminjaman_studio_dubbings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('ktp');
            $table->longText('alamat')->nullable();
            $table->string('no_hp');
            $table->string('email');
            $table->date('booking');
            $table->date('selesai_booking')->nullable();
            $table->string('operator')->nullable();
            $table->boolean('persetujuan')->default(0);
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}