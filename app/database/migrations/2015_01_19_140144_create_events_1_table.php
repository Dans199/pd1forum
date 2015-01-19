<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvents1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
				Schema::create('events_now', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');		
			$table->string('when');
			$table->string('where');
			$table->text('description');
			$table->integer('author_id');
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
	        Schema::drop('events_now');
	}

}
