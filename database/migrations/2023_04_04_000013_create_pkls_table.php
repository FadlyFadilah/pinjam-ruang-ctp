<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePklsTable extends Migration
{
    public function up()
    {
        Schema::create('pkls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('asal_sekolah');
            $table->longText('alamat')->nullable();
            $table->string('no_hp');
            $table->string('email');
            $table->date('lama')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}