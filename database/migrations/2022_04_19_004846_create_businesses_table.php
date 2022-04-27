<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->default(Auth::id());
            $table->boolean('approved')->default(false);
            $table->boolean('deleted')->default(false);
            $table->boolean('published')->default(false);
            $table->string('name', 100);
            $table->string('about', 1000);
            $table->string('address', 255)->nullable();
            $table->string('phone', 10)->nullable();
            $table->string('s3_image_url', 255)->nullable();
            $table->string('web_url', 255)->nullable();
            $table->string('facebook_url', 255)->nullable();
            $table->string('instagram_url', 255)->nullable();
            $table->string('twitter_url', 255)->nullable();
            $table->string('linkedin_url', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesses');
    }
};
