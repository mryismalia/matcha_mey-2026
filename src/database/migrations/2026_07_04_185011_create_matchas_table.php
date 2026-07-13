<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matchas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('grade');
            $table->string('origin');
            $table->text('description');
            $table->string('taste_profile');
            $table->text('usage_recommendation');
            $table->string('image')->nullable();
            $table->timestamps();

            $table->index(['name', 'grade', 'origin']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matchas');
    }
};
