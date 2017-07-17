<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $menus = [
            [
                'name' => 'inicio',
                'id_status' => 1
            ],
            [
                'name' => 'contactenos',
                'id_status' => 1
            ]
        ];

        DB::table('cr_menus')->truncate(); 

        foreach($menus as $menu) {
            DB::table('cr_menus')->insert($menu);
        }
    }
}
