<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type')->insert([
            [
                'id' => '1',
                'type' => 'Been amputatie',
                'picturetitle' => '4.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '2',
                'type' => 'Arm amputatie',
                'picturetitle' => '11.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '3',
                'type' => 'Gezicht amputatie',
                'picturetitle' => '16.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '4',
                'type' => 'Andere amputatie',
                'picturetitle' => '20.png',
                'picturepath' => 'storage/type',
            ],
        ]);
    }
}
