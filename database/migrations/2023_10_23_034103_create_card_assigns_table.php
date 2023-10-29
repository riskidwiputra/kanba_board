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
        Schema::create('card_assigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_card');
            $table->foreign('id_card')->references('id')->on('cards'); // Relasi dengan tabel "cards"
            $table->unsignedBigInteger('id_user');
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
        Schema::dropIfExists('card_assigns');
    }
};
