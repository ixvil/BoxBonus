<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdAndBalanceToCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->integer('balance');
            $table->integer('user_id')->nullable();

            $table->foreign('user_id', 'fk_customers_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign('fk_customers_users1');
            $table->dropColumn(array('balance', 'user_id'));
        });
    }
}
