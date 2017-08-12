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
                'position' => 1,
                'id_status' => 1
            ],
            [
                'name' => 'contactenos',
                'position' => 2,
                'id_status' => 1
            ]
        ];

        DB::table('cr_menus')->truncate(); 

        foreach($menus as $menu) {
            DB::table('cr_menus')->insert($menu);
        }
    }
}
