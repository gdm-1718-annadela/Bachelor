<?php

use Illuminate\Database\Seeder;

class SubtypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subtype')->insert([
            [
                'id' => '1',
                'type_id' => '1',
                'title' => 'Gedeeltelijke voetamputatie',
                'picturetitle' => '1.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '2',
                'type_id' => '1',
                'title' => 'Enkel ontleding',
                'picturetitle' => '2.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '3',
                'type_id' => '1',
                'title' => 'Onder de knie amputaties',
                'picturetitle' => '3.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '4',
                'type_id' => '1',
                'title' => 'Door de knie amputaties',
                'picturetitle' => '4.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '5',
                'type_id' => '1',
                'title' => 'Boven knie amputatie',
                'picturetitle' => '5.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '6',
                'type_id' => '1',
                'title' => 'Heup ontleding',
                'picturetitle' => '6.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '7',
                'type_id' => '1',
                'title' => 'Hemipelvectomie',
                'picturetitle' => '7.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '8',
                'type_id' => '2',
                'title' => 'Gedeeltelijke handamputatie',
                'picturetitle' => '8.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '9',
                'type_id' => '2',
                'title' => 'Middenhandsbeen Amputatie',
                'picturetitle' => '9.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '10',
                'type_id' => '2',
                'title' => 'Polsdisarticulatie',
                'picturetitle' => '10.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '11',
                'type_id' => '2',
                'title' => 'Onder elleboog amputatie',
                'picturetitle' => '11.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '12',
                'type_id' => '2',
                'title' => 'Elleboogdisarticulatie',
                'picturetitle' => '12.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '13',
                'type_id' => '2',
                'title' => 'Boven elleboog amputatie',
                'picturetitle' => '13.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '14',
                'type_id' => '2',
                'title' => 'Schouderdisarticulatie',
                'picturetitle' => '14.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '15',
                'type_id' => '3',
                'title' => 'Oor amputatie',
                'picturetitle' => '15.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '16',
                'type_id' => '3',
                'title' => 'Neus amputatie ',
                'picturetitle' => '16.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '17',
                'type_id' => '3',
                'title' => 'Tong amputatie',
                'picturetitle' => '17.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '18',
                'type_id' => '3',
                'title' => 'Oog amputatie',
                'picturetitle' => '18.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '19',
                'type_id' => '3',
                'title' => 'Tand amputatie',
                'picturetitle' => '19.png',
                'picturepath' => 'storage/type',
            ],[
                'id' => '20',
                'type_id' => '4',
                'title' => 'Borstamputatie',
                'picturetitle' => '20.png',
                'picturepath' => 'storage/type',
            ]
        ]);
    }
}
