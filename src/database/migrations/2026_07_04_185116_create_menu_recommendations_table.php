<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('description');
            $table->string('taste_profile');
            $table->string('sweetness_level');
            $table->string('menu_type');
            $table->timestamps();

            $table->index(
                ['taste_profile', 'sweetness_level', 'menu_type'],
                'menu_rec_filter_idx'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_recommendations');
    }
};
