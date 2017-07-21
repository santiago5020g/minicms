<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pages = [
            [
                'name' => 'inicio',
                'id_status' => 1,
                'id_menu' => 1
            ],
            [
                'name' => 'contactenos',
                'id_status' => 1,
                'id_menu' => 1
            ]
        ];

        DB::table('cr_pages')->truncate(); 

        foreach($pages as $page) {
            DB::table('cr_pages')->insert($page);
        }
    }
}
