<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerArrivalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_arrivals', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('customers_id')->index('fk_operations_customers1_idx');
			$table->integer('partners_id')->index('fk_operations_partners1_idx');
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
		Schema::drop('customer_arrivals');
	}

}
