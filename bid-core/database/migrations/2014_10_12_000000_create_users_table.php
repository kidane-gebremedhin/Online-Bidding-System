<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullName')->nullable();
            $table->string('companyName')->nullable();
            $table->string('phoneNumber');
            $table->string('email')->nullable();
            $table->string('userName')->nullable();
            $table->string('password');
            $table->integer('subscriptionPlanId')->nullable();
            $table->integer('roleId');
            $table->integer('businessCategoryId')->nullable();
            $table->string('subscriptionDate');
            $table->rememberToken()->nullable();
            $table->integer('createdByUserId');
            $table->integer('updatedByUserId')->nullable();
            $table->string('changedPassword')->default('false');
            $table->string('status')->default('inactive');
            $table->string('isApproved')->default('false');
            $table->integer('approvedByUserId')->nullable();
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
        Schema::dropIfExists('users');
    }
}
