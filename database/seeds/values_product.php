<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class values_product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('values_product')->delete();
        DB::table('values_product')->insert([
            ['product_id'=>1,'values_id'=>'1'],
            ['product_id'=>1,'values_id'=>'2'],
            ['product_id'=>1,'values_id'=>'4'],

        ]);
    }
}
