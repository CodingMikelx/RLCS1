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
        if (!Schema::hasTable('story')) {
            Schema::create('story', function (Blueprint $table) {
                $table->id();
                // $table->foreignId('images_id')->constrained()->cascadeOnDelete();
                // $table->foreignID('creator_id')->constrained()->cascadeOnDelete();
                $table->string('name');
                $table->string('lessionLevel');
                $table->timestamps();
            });
        };

        // Schema::table('story', function (Blueprint $table) {
        //     $table->foreignId('images_id')->constrained()->cascadeOnDelete();
        //     $table->foreignID('creator_id')->constrained()->cascadeOnDelete();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('story');
    }
};
