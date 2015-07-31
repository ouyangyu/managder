<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apps', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('appversion',100);
            $table->string('appfile', 255);
            $table->dateTime('apptime', 255);
            $table->boolean('isonline')->default(1);
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
		Schema::drop('apps');
	}

}
