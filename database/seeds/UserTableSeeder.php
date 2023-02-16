<?php


use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user',
            'username' => 'admin',
            'level' => 'Admin',
            'password' => bcrypt(12345),
            // 'remember_token'=>Str::random(60),
        ]);
    }
}
