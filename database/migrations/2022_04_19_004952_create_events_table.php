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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->default(Auth::id());
            $table->boolean('approved')->default(false);
            $table->boolean('deleted')->default(false);
            $table->boolean('published')->default(false);
            $table->string('name', 100);
            $table->string('by', 100);
            $table->string('about', 1000);
            $table->string('s3_image_url', 255)->nullable();
            $table->string('web_url', 255)->nullable();
            $table->string('address', 255);
            $table->string('entry_fee', 255);
            $table->string('start_time');
            $table->string('end_time');
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
        Schema::dropIfExists('events');
    }
};
