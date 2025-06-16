<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoordinatesToTables extends Migration
{
    public function up()
    {
        Schema::table('tables', function (Blueprint $table) {
            $table->integer('x')->default(0);
            $table->integer('y')->default(0);
        });
    }

    public function down()
    {
        Schema::table('tables', function (Blueprint $table) {
            $table->dropColumn(['x', 'y']);
        });
    }
}