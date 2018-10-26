<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('app_id');
            $table->integer('compatibility_id');
            $table->string('user_id');
            $table->integer('gpu_id');
            $table->integer('cpu_id');
            $table->text('driver_version');
            $table->integer('distro_id');
            $table->text('distro_version');
            $table->text('works');
            $table->text('broken');
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
        Schema::dropIfExists('entries');
    }
}
