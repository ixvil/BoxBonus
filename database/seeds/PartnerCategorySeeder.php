<?php

use Illuminate\Database\Seeder;

class PartnerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partner_categories')->insert([
            'id' => 1,
            'name' => 'Здоровье',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('partner_categories')->insert([
            'id' => 2,
            'name' => 'Красота',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('partner_categories')->insert([
            'id' => 3,
            'name' => 'Магазины',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
