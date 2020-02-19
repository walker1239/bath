<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationBathsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bathsusers', function(Blueprint $table) {
            if (!Schema::hasColumn('bathsusers', 'baths_id')) {
                $table->integer('baths_id')->unsigned()->nullable();
                $table->foreign('baths_id')->references('id')->on('baths')->onDelete('cascade');
                }
            if (!Schema::hasColumn('bathsusers', 'employees_id')) {
                $table->integer('employees_id')->unsigned()->nullable();
                $table->foreign('employees_id')->references('id')->on('employees')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bathsusers', function(Blueprint $table) {
            
        });
    }
}
