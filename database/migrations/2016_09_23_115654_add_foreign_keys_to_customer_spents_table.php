<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCustomerSpentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('customer_spents', function(Blueprint $table)
		{
			$table->foreign('customers_id', 'fk_customer_spents_customers1')->references('id')->on('customers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('gifts_id', 'fk_customer_spents_gifts1')->references('id')->on('gifts')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('partners_id', 'fk_customer_spents_partners1')->references('id')->on('partners')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('customer_spents', function(Blueprint $table)
		{
			$table->dropForeign('fk_customer_spents_customers1');
			$table->dropForeign('fk_customer_spents_gifts1');
			$table->dropForeign('fk_customer_spents_partners1');
		});
	}

}
