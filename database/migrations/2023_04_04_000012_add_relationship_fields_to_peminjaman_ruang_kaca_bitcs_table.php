<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPeminjamanRuangKacaBitcsTable extends Migration
{
    public function up()
    {
        Schema::table('peminjaman_ruang_kaca_bitcs', function (Blueprint $table) {
            $table->unsignedBigInteger('ruangan_id')->nullable();
            $table->foreign('ruangan_id', 'ruangan_fk_8280189')->references('id')->on('ruangans');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8280190')->references('id')->on('users');
        });
    }
}