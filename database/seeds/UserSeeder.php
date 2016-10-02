<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserType;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create()->each(function (User $u) {
            $u->user_type_id = 1;
            $u->save();
        });
    }
}
