<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('courses'))
        {
            Schema::drop('courses');
        }
		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('courseid')->unique();
            $table->integer('moodleid');
            $table->string('coursename', 255);
            $table->string('courseimage', 255);
            $table->string('subject', 100);
            $table->boolean('isdelete')->default(1);
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
		Schema::drop('courses');
	}

}
