<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatetenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tender', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('companyId');
            $table->string('title');
            $table->text('summery');
            $table->text('description')->nullable();
            $table->integer('countryId');
            $table->integer('regionId');
            $table->integer('zoneId');
            $table->integer('weredaId');
            $table->integer('businessCategoryId');
            $table->string('openingDate');
            $table->string('closingDate');
            $table->text('requiremets')->nullable();
            $table->integer('outingCount')->nullable();
            $table->text('tenderProcedure')->nullable();
            $table->string('image')->nullable();
            $table->text('howToApply')->nullable();
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
        Schema::dropIfExists('tender');
    }
}
