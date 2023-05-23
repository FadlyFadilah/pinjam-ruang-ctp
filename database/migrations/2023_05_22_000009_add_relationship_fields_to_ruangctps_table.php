<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRuangctpsTable extends Migration
{
    public function up()
    {
        Schema::table('ruangctps', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8519637')->references('id')->on('users');
            $table->unsignedBigInteger('ruangan_id')->nullable();
            $table->foreign('ruangan_id', 'ruangan_fk_8513881')->references('id')->on('ruangans');
        });
    }
}