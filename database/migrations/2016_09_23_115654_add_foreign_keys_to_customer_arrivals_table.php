<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCustomerArrivalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('customer_arrivals', function(Blueprint $table)
		{
			$table->foreign('customers_id', 'fk_operations_customers1')->references('id')->on('customers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('partners_id', 'fk_operations_partners1')->references('id')->on('partners')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('customer_arrivals', function(Blueprint $table)
		{
			$table->dropForeign('fk_operations_customers1');
			$table->dropForeign('fk_operations_partners1');
		});
	}

}
