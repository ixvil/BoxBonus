<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_arrivals', function (Blueprint $table) {
            $table->integer('value', false);
            $table->integer('bonuses', false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_arrivals', function (Blueprint $table) {
            $table->dropColumn('value');
            $table->dropColumn('bonuses');
        });
    }
}
