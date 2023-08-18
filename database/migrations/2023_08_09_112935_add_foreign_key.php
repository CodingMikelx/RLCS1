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
        Schema::table('text', function (Blueprint $table) {
            $table->foreignId('page_id')->references('id')->on('page')->onDelete('cascade')->nullable();
            $table->foreignId('audio_id')->references('id')->on('audio')->onDelete('cascade')->nullable();
            $table->foreignId('images_id')->references('id')->on('images')->onDelete('cascade')->nullable();
        });
        Schema::table('images', function (Blueprint $table) {
            $table->foreignId('text_id')->nullable()->constrained('text')->onDelete('cascade');
        });
        Schema::table('page', function (Blueprint $table) {
            $table->foreignId('story_id')->references('id')->on('story')->onDelete('cascade')->nullable();
            $table->foreignId('images_id')->references('id')->on('images')->onDelete('cascade')->nullable();
        });
        Schema::table('interact', function (Blueprint $table) {
            $table->foreignId('page_id')->references('id')->on('page')->onDelete('cascade')->nullable();
            $table->foreignId('animation_id')->references('id')->on('animation')->onDelete('cascade')->nullable();
            $table->foreignId('text_id')->references('id')->on('text')->onDelete('cascade')->nullable();
            $table->foreignId('images_id')->references('id')->on('images')->onDelete('cascade')->nullable();
            $table->foreignId('interact_event_id')->references('id')->on('interact_event')->onDelete('cascade')->nullable();
        });
        Schema::table('story', function (Blueprint $table) {
            $table->foreignId('images_id')->references('id')->on('images')->onDelete('cascade')->nullable();
            $table->foreignId('creator_id')->references('id')->on('creator')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
