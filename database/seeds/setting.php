<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class setting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->delete();
        DB::table('setting')->insert([
            ['id' => 1,
            'logo' => 'SP01',
             'footer1' => 'Áo nam da thật MX105',
             'footer2' => 500000,
             'footer3' => 1,
             'about' => 1,
             'contact' => 1,

            ],
        ]);
    }
}
