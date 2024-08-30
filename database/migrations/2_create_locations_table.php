<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 60)->unique();
            $table->string('designation');
            $table->string('address');
            $table->foreignId('locality_id')->constrained()->onDelete('cascade');
            $table->string('website')->nullable();
            $table->string('phone', 20)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('locations');
    }
};