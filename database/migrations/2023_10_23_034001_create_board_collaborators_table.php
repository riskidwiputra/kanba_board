<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_collaborators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_board');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_board')->references('id')->on('boards'); // Relasi dengan tabel "boards"
            $table->foreign('id_user')->references('id')->on('users'); // Relasi dengan tabel "users"
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('board_collaborators');
    }
};
