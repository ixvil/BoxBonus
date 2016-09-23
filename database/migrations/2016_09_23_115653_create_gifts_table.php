<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGiftsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gifts', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('partner_id')->index('fk_gifts_partners_idx');
			$table->string('name')->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('logo', 45)->nullable();
			$table->integer('price')->nullable();
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
		Schema::drop('gifts');
	}

}
