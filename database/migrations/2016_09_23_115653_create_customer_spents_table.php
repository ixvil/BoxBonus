<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerSpentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_spents', function(Blueprint $table)
		{
			$table->integer('id')->unique('id_UNIQUE');
			$table->integer('customers_id')->index('fk_customer_spents_customers1_idx');
			$table->integer('partners_id')->index('fk_customer_spents_partners1_idx');
			$table->integer('gifts_id')->index('fk_customer_spents_gifts1_idx');
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
		Schema::drop('customer_spents');
	}

}
