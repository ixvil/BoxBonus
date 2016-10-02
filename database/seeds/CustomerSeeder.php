<?php

use Illuminate\Database\Seeder;


class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Customer::class, 10)->create()->each(function (App\Models\Customer $u) {
            $u->user_id = $u->id;
            $u->save();
        });
    }
}
