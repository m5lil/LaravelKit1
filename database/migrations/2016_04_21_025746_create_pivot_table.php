<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_profile', function (Blueprint $table) {
            $table-> integer('profile_id')->unsigned()->default(0);
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table-> integer('course_id')->unsigned()->default(0);
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::drop('course_profile');
    }
}
