<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGiftsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gifts', function(Blueprint $table)
		{
			$table->foreign('partner_id', 'fk_gifts_partners')->references('id')->on('partners')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('gifts', function(Blueprint $table)
		{
			$table->dropForeign('fk_gifts_partners');
		});
	}

}
