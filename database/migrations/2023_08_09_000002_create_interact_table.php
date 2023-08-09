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
        if (!Schema::hasTable('interact')) {
            Schema::create('interact', function (Blueprint $table) {
                $table->id();
                // $table->foreignId('page_id')->constrained()->cascadeOnDelete();
                // $table->foreignId('animation_id')->constrained()->cascadeOnDelete();
                // $table->foreignId('text_id')->constrained()->cascadeOnDelete();
                // $table->foreignId('images_id')->constrained()->cascadeOnDelete();
                // $table->foreignId('interactEvent_id')->constrained()->cascadeOnDelete();
                $table->string('name');
                $table->float('interactX');
                $table->float('interactY');
                $table->timestamps();
            });
        }

        // Schema::table('interact', function (Blueprint $table) {
        //     $table->foreignId('page_id')->constrained()->cascadeOnDelete();
        //     $table->foreignId('animation_id')->constrained()->cascadeOnDelete();
        //     $table->foreignId('text_id')->constrained()->cascadeOnDelete();
        //     $table->foreignId('images_id')->constrained()->cascadeOnDelete();
        //     $table->foreignId('interactEvent_id')->constrained()->cascadeOnDelete();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interact');
    }
};
