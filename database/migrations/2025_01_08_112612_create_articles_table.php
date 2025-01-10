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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');

            $table->string('preview_picture');
            $table->string('detail_picture');

            $table->text('preview_text');
            $table->text('detail_text');

            $table->json('tags')->nullable();

            $table->unsignedBigInteger('category_id');

            $table->dateTime('published_at');

            $table->boolean('active')->default(true);

            $table->foreign('category_id')->references('id')->on('article_categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
