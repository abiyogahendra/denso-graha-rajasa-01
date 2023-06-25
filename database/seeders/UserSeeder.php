<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user')->insert([
            'userID' => '25052023',
            'username' => 'cokrominoto',
            'password' => Hash::make('Minoto2506'),
            'created_at' => Carbon::now(),
            'created_by' => '13022023'
        ]);
    }
}
