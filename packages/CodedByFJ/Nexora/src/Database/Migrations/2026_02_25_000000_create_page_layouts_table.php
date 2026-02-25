<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function run(): void
    {
        Schema::create('page_layouts', function (Blueprint $table) {
            $table->id();
            $table->integer('channel_id')->unsigned();
            $table->string('locale');
            $table->string('page_slug');
            $table->json('layout_json');
            $table->boolean('is_active')->default(1);
            $table->timestamps();

            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_layouts');
    }
};
