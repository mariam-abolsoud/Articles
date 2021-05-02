<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //---------  insert basic user account  -----------
        $user = \App\Models\User::create([
            'name' => "admin",
            'email' => "admin@admin.com",
            'password' => bcrypt(123456),
        ]);
    }
}
