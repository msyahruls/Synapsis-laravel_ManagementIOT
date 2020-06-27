<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listUsers = [
			['name' => 'Admin',	'email' => 'admin@ad.min',	'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',],
			['name' => 'User1',	'email' => 'user1@us.er',	'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',],
			['name' => 'User2',	'email' => 'user2@us.er',	'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',]
        ];

        foreach ($listUsers as $user) {
            User::create($user);
        }
    }
}
