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
        if (!Schema::hasTable('text')) {
            Schema::create('text', function (Blueprint $table) {
                $table->id();
                // $table->foreignId('page_id')->constrained()->cascadeOnDelete();
                // $table->foreignId('audio_id')->constrained()->cascadeOnDelete();
                // $table->foreignId('images_id')->constrained()->cascadeOnDelete();
                $table->string('word');
                $table->float('positionX');
                $table->float('positionY');
                $table->timestamps();
            });
        };
        
        // Schema::table('text', function (Blueprint $table) {
        //     $table->foreignId('page_id')->constrained()->cascadeOnDelete();
        //     $table->foreignId('audio_id')->constrained()->cascadeOnDelete();
        //     $table->foreignId('images_id')->constrained()->cascadeOnDelete();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('text');
    }
};
