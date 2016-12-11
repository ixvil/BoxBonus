<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('partner_categories_id')->index('fk_partners_partner_categories1_idx');
            $table->string('name')->nullable();
            $table->timestamps();
            $table->text('description', 65535)->nullable();
            $table->string('location')->nullable();
            $table->string('logo', 45)->nullable();
            $table->tinyInteger('active')->default('0');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('partners');
	}

}
