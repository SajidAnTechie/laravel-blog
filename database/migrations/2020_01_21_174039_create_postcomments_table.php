<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postcomments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('commenter_id');
            $table->unsignedBigInteger('post_id');
            $table->text('comment');
            $table->timestamps();

            $table->foreign('commenter_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('post_id')
                ->references('id')->on('posts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postcomments');
    }
}
