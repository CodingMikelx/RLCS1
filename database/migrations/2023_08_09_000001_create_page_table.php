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
        if (!Schema::hasTable('page')) {
            Schema::create('page', function (Blueprint $table) {
                $table->id();
                // $table->foreignId('story_id')->constrained()->cascadeOnDelete();
                // $table->foreignId('images_id')->constrained()->cascadeOnDelete();
                // $table->foreignId('text_id')->constrained()->cascadeOnDelete();
                $table->string('name');
                $table->timestamps();
            });
        };
        // Schema::table('page', function (Blueprint $table) {
        //     $table->foreignId('story_id')->constrained()->cascadeOnDelete();
        //     $table->foreignId('images_id')->constrained()->cascadeOnDelete();
        //     $table->foreignId('text_id')->constrained()->cascadeOnDelete();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page');
    }
};
