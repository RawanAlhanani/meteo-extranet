<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrow_record', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_examplaire');
            $table->unsignedBigInteger('id_reservation')->nullable();
            $table->date('borrow_date');
            $table->date('return_date')->nullable();
            $table->date('due_date');

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_examplaire')->references('id')->on('examplaires')->onDelete('cascade');
            $table->foreign('id_reservation')->references('id')->on('reservations')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow_record');
    }
};
