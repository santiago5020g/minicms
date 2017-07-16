<?php

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
        $users = [
            [
                'firstName' => 'admin',
                'lastName'  => 'Juan',
                'address' => 'Carlos',
                'email' => 'Sanchez',
                'telephone' => 'santiago5020g@gmail.com',
                'id_status' => 1,
                'password' => Hash::make("1234")
            ]
        ];

        DB::table('cr_users')->truncate(); 

        foreach($users as $user) {
            DB::table('cr_users')->insert($user);
        }
    }
}
