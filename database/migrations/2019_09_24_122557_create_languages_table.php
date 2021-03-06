<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('languages', function(Blueprint $table)
		{
			$table->integer('languages_id', true);
			$table->string('name', 32)->index('IDX_LANGUAGES_NAME');
			$table->char('code', 6);
			$table->text('image', 65535)->nullable();
			$table->string('directory', 32)->nullable();
			$table->integer('sort_order')->nullable();
			$table->string('direction', 100);
			$table->boolean('is_default')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('languages');
	}

}
