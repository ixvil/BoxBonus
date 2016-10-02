<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnerUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partner_users', function(Blueprint $table)
		{
			$table->integer('user_id')->index('fk_user_partners_users1_idx');
			$table->integer('partner_id')->index('fk_user_partners_partners1_idx')->default(null);
			$table->integer('id')->primary();
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
		Schema::drop('partner_users');
	}

}
