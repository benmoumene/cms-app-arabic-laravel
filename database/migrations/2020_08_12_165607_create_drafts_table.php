<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drafts', function (Blueprint $table) {
            $table->id();
            $table->string('new_writer');
            $table->unsignedBigInteger('category_id');
            $table->string('reference_address');
            $table->string('news_address');
            $table->string('source');
            $table->string('image');
            $table->string('video')->nullable();
            $table->text('new_body');
            $table->string('position');
            $table->string('link');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('drafts');
    }
}
