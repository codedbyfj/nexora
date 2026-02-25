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
        Schema::create('page_layouts', function (Blueprint $output) {
            $output->id();
            $output->integer('channel_id')->unsigned();
            $output->string('locale');
            $output->string('page_slug')->index();
            $output->json('layout_json');
            $output->boolean('is_active')->default(true);
            $output->timestamps();

            $output->foreign('channel_id')->references('id')->on('channels')->onDelete('cascade');
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
