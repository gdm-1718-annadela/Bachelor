<?php

use Illuminate\Database\Seeder;

class MoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mood')->insert([
            [
                'id' => '1',
                'mood' => 'Blij',
                'picturetitle' => 'Blij.png',
                'picturepath' => 'storage/mood',
            ],[
                'id' => '2',
                'mood' => 'Boos',
                'picturetitle' => 'boos.png',
                'picturepath' => 'storage/mood',
            ],[
                'id' => '3',
                'mood' => 'Bang',
                'picturetitle' => 'bang.png',
                'picturepath' => 'storage/mood',
            ],[
                'id' => '4',
                'mood' => 'Verdrietig',
                'picturetitle' => 'Verdrietig.png',
                'picturepath' => 'storage/mood',
            ],[
                'id' => '5',
                'mood' => 'Verrast',
                'picturetitle' => 'Verast.png',
                'picturepath' => 'storage/mood',
            ],[
                'id' => '6',
                'mood' => 'Teleurgesteld',
                'picturetitle' => 'Teleurgesteld.png',
                'picturepath' => 'storage/mood',
            ]
            ]
        );
    }
}
