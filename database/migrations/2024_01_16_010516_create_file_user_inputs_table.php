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
        Schema::create('file_user_inputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_input_id')->constrained()->onDelete('cascade');
            $table->string('original_name');
            $table->string('name');
            $table->string('url_file');
            $table->string('typeFile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_user_inputs');
    }
};
