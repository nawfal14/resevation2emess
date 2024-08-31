<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
        });
    }

    public function down()
    {
        Schema::dropIfExists('artists');
    }
};