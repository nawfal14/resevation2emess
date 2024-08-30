<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('localities', function (Blueprint $table) {
            $table->id();
            $table->string('postal_code', 10);
            $table->string('locality');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('localities');
    }
};
