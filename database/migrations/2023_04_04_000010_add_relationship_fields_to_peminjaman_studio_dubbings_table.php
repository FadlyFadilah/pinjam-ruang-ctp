<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPeminjamanStudioDubbingsTable extends Migration
{
    public function up()
    {
        Schema::table('peminjaman_studio_dubbings', function (Blueprint $table) {
            $table->unsignedBigInteger('ruangan_id')->nullable();
            $table->foreign('ruangan_id', 'ruangan_fk_8275870')->references('id')->on('ruangans');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8275871')->references('id')->on('users');
        });
    }
}