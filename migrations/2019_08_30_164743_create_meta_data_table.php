<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('for')->default('post');
            $table->integer('source_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('creator_id');
            $table->integer('moderator_id');
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
        Schema::dropIfExists('meta_data');
    }
}
