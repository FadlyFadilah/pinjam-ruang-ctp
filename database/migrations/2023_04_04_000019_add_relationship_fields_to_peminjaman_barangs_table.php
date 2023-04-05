<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPeminjamanBarangsTable extends Migration
{
    public function up()
    {
        Schema::table('peminjaman_barangs', function (Blueprint $table) {
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->foreign('barang_id', 'barang_fk_8280418')->references('id')->on('barangs');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8280419')->references('id')->on('users');
        });
    }
}