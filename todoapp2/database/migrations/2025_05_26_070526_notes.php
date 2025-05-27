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
      Schema::create('notes', function (Blueprint $table) {
    // Auto-incrementing primary key.
    $table->id();
    // String column for the title, cannot be null.
    $table->string('title', 255)->nullable(false);
    // String column for the description, max 1000 chars, can be null.
    $table->string('description', 1000)->nullable();
    // Date column for the date.
    $table->date('date');
    // String column for the list, max 255 chars, can be null.
    $table->string('list', 255)->nullable();
    // String column for the status, with a default value of 'pending'.
    $table->string('status')->default('pending');
    // Adds 'created_at' and 'updated_at' timestamp columns.
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
