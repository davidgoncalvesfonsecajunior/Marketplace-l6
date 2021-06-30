<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'teste',
        //     'email' => 'teste1@admin.com',
        //     'email_verified_at' => now(),
        //     'password' => '$2222y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => 'okokokdsdsddsdsdsd',
        // ]);
        $users = User::factory()->count(40)->create()->each(function ($user) {
            $user->store()->save($store = Store::factory()->make());
        });
    }
}
