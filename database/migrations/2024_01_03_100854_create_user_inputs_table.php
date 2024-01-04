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
        Schema::create('user_inputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama')->nullable();
            $table->integer('nik')->nullable();
            $table->integer('nisn')->nullable();
            $table->string('tpt_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('kelamin', ['L', 'P'])->nullable();
            $table->string('formal')->nullable();
            $table->string('diniyah')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat')->nullable();
            $table->string('ayah')->nullable();
            $table->integer('no_ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->integer('no_ibu')->nullable();
            $table->integer('nis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_inputs');
    }
};
