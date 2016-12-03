<?php declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->bigInteger('phone')->unique();
            $table->integer('user_type_id')->index('fk_users_user_types1_idx')->nullable();
            $table->string('name', 45)->default('');
            $table->string('email', 45)->default('');
            $table->string('password', 255)->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        Schema::drop('users');
    }

}
