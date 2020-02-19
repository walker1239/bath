<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBathsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('bathsusers')) {
            Schema::create('bathsusers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('photo');
                $table->dateTime('time_entry');
                $table->dateTime('time_exit');
                $table->string('latitude');
                $table->string('longitude');

                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bathsusers');
    }
}
