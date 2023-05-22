<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpsTable extends Migration
{
    public function up()
    {
        Schema::create('kps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('univ');
            $table->string('no_hp');
            $table->string('email');
            $table->longText('alamat')->nullable();
            $table->date('lama');
            $table->date('sampai');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}