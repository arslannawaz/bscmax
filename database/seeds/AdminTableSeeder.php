<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=['name'=>'Admin','email'=>'admin@admin.com','password'=>Hash::make('12345678')];
        User::create($data);
    }
}
