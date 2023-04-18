<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTable extends Migration
{
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->longText('alamat');
            $table->string('asal_sekolah')->nullable();
            $table->string('jurusan')->nullable();
            $table->longText('ketertarikan');
            $table->string('email');
            $table->string('no');
            $table->string('sosmed')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}