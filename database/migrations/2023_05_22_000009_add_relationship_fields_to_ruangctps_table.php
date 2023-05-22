<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRuangctpsTable extends Migration
{
    public function up()
    {
        Schema::table('ruangctps', function (Blueprint $table) {
            $table->unsignedBigInteger('ruangan_id')->nullable();
            $table->foreign('ruangan_id', 'ruangan_fk_8513881')->references('id')->on('ruangans');
        });
    }
}