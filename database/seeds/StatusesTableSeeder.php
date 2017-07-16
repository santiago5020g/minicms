<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'description' => 'Habilitado'
            ],
            [
                'description' => 'Deshabilitado'
            ]
        ];

        DB::table('cr_statuses')->truncate(); 

        foreach($statuses as $status) {
            DB::table('cr_statuses')->insert($status);
        }
    }
}
