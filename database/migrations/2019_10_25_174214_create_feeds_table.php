<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('team_id');
            $table->string('feed_title');
            $table->string('feed_url');
            $table->json('filter_keywords');
            $table->json('regex_curations');
            $table->enum('audience', ['All', 'Admin', 'Admin & Moderators', 'Users', 'Own', 'None']);
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
        Schema::dropIfExists('feeds');
    }
}
