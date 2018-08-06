<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('parent_id')->index()->unsigned()->nullable();
            $table->string('user_name');
            $table->string('email');
            $table->text('text');
            $table->timestamps();
        });

        Schema::table('comments', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
