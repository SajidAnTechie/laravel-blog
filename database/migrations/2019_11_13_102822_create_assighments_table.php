<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssighmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assighments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject');
            $table->string('assigh_name');
            $table->boolean('completed')->default(false);
            $table->date('release-date')->nullable();
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
        Schema::dropIfExists('assighments');
    }
}
