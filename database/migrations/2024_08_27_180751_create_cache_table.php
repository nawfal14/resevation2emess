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
        // Create the cache table
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary(); // Primary key column
            $table->mediumText('value'); // Column to store cache value
            $table->integer('expiration'); // Column to store expiration time
            $table->timestamps(); // Optional: Add created_at and updated_at timestamps
        });

        // Create the cache_locks table
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary(); // Primary key column
            $table->string('owner'); // Column to store the owner of the lock
            $table->integer('expiration'); // Column to store expiration time of the lock
            $table->timestamps(); // Optional: Add created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the cache table if it exists
        Schema::dropIfExists('cache');

        // Drop the cache_locks table if it exists
        Schema::dropIfExists('cache_locks');
    }
};