<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('path_folder')->nullable();
            $table->integer('path_int');
            $table->string('path_slug');
            $table->longText('pc_min_spec')->nullable();
            $table->longText('pc_recom_spec')->nullable();
            $table->longText('linux_min_spec')->nullable();
            $table->longText('linux_recom_spec')->nullable();
            $table->string('release_date')->nullable();
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
        Schema::dropIfExists('apps');
    }
}
