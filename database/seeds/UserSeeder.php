<?php declare(strict_types = 1);

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
    public function run ()
    {
        factory(User::class, 9)->create()->each(function (User $u) {
            $u->user_type_id = 1;
            $u->save();
        });

        DB::table('users')->insert([
            'user_type_id' => 1,
            'name' => 'Фёдор Конюхов',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'email' => 'ixvil@mail.ru',
            'password' => hash('sha256', 'TestPassword')
        ]);
    }
}
