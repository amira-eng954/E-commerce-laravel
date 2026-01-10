<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [ 'name'=>"amira", 'email'=>'a@a.com','password'=>Hash::make(123),'role'=> 'admin'],
            [ 'name'=>"asmaa", 'email'=>'s@s.com','password'=>Hash::make(123),'role'=> 'vendor'],
            [ 'name'=>"aml", 'email'=>'d@d.com','password'=>Hash::make(123),'role'=> 'user'],
        ]);
    }
}
