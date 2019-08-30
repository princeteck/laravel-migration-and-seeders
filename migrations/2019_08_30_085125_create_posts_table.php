<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('banner')->default('https://source.unsplash.com/random/600x600');
            $table->boolean('status')->default(false);
            $table->bigInteger('views')->default(0);
            $table->string('creator_id');
            $table->string('moderator_id');
            $table->timestamps();
        });
        
        Schema::create('category_post', function (Blueprint $table) {
            $table->bigInteger('category_id', 'post_id');
            $table->primary(['category_id', 'post_id']);
            $table->timestamps();
        });

        Schema::create('post_tag', function (Blueprint $table) {
            $table->bigInteger('post_id', 'tag_id');
            $table->primary(['post_id', 'tag_id']);
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
        Schema::dropIfExists('posts');
        Schema::dropIfExists('category_post');
        Schema::dropIfExists('post_tag');
    }
}
