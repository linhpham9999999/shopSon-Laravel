<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'email' => 'mytran187@gmail.com',
                'password' => bcrypt('12345678'),
            ]
        ];
        DB::table('nguoi_dung')->insert($data);
    }
}
