<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class createseedersusers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            User::create([
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ]);
            User::create([
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user123'),
            ]);
        });
    }
}
