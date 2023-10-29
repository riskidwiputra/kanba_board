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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_list');
            $table->foreign('id_list')->references('id')->on('lists'); // Relasi dengan tabel "lists"
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('id_label');
            $table->timestamp('due_date')->nullable();
            $table->unsignedBigInteger('id_assign')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users'); // Relasi dengan tabel "users"
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
};
