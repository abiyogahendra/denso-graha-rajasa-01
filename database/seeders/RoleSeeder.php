<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('role')->insert([
            'roleCode' => Int::random(10),
            '' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
