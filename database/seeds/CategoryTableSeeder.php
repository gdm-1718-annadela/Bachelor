<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            [
                'id' => '1',
                'type' => 'Herinnering'
            ],[
                'id' => '2',
                'type' => 'Verhaal'
            ],[
                'id' => '3',
                'type' => 'Tip'
            ],
        ]);
    }
}
