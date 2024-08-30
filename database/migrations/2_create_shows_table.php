<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 60)->unique();
            $table->string('title');
            $table->string('poster_url');
            $table->smallInteger('duration');
            $table->year('created_in');
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
            $table->boolean('bookable');
        });
    }

    public function down()
    {
        Schema::dropIfExists('shows');
    }
};