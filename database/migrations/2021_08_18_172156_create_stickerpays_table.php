<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStickerpaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stickerpays', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('sticker_id');
            $table->foreign('sticker_id')->references('id')->on('stickers');
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
        Schema::dropIfExists('stickerpays');
    }
}
