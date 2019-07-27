<?php

use Illuminate\Database\Seeder;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert(['name'=>'Saturday']);
        DB::table('days')->insert(['name'=>'Sunday']);
        DB::table('days')->insert(['name'=>'Monday']);
        DB::table('days')->insert(['name'=>'Tuesday']);
        DB::table('days')->insert(['name'=>'Wednesday']);
        DB::table('days')->insert(['name'=>'Thursday']);
        DB::table('days')->insert(['name'=>'Friday']);
    }
}
