<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->string('cpu');
            $table->string('memory');
            $table->string('main_camera');
            $table->string('selfie_camera');
            $table->string('battery');
            $table->text('features');
            $table->string('display');
            $table->string('capacity');
            $table->string('price');
            $table->string('image');
            $table->string('os');
            $table->date('date');
            $table->string('review')->nullable();
            $table->string('youtube','50')->nullable();
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
        Schema::dropIfExists('specifications');
    }
}
