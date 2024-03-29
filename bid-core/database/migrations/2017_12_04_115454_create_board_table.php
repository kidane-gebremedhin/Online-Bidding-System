<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateboardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->integer('tenderId');
            $table->string('pinnedDate');
            $table->string('status')->default("active");
            $table->string('isDeleted')->default('false');
            $table->integer('deletedByUserId')->nullable();
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
        Schema::dropIfExists('board');
    }
}
