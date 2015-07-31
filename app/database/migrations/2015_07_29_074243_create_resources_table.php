<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('resources'))
        {
            Schema::drop('resources');
        }
		Schema::create('resources', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('resourceid')->unique();
            $table->integer('courseid');
            $table->string('resourcename', 255);
            $table->string('resourceimage', 255);
            $table->string('resourcetype', 255);
            $table->string('resourceurl', 255);
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
		Schema::drop('resources');
	}

}
