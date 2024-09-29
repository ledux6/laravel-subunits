<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->string('unit_number', 255)->nullable(false);
            $table->integer('year')->nullable(false);
            $table->text('notes');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trucks');
    }
};
