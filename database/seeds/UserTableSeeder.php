<?php

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['id'=>1,'email'=>'admin@gmail.com','password'=>bcrypt('123456'),'full'=>'vietpro','address'=>'Thường tín','phone'=>'0356653301','level'=>1],
            ['id'=>2,'email'=>'zimpro@gmail.com','password'=>bcrypt('123456'),'full'=>'Nguyễn thế vũ','address'=>'Bắc giang','phone'=>'0356654487','level'=>2],
            ['id'=>3,'email'=>'superadmin@gmail.com','password'=>bcrypt('123456'),'full'=>'Xieu Xay Da','address'=>'Huế','phone'=>'0352264487','level'=>1],
        ]);
        Users::find(1)->assignRole('user');
        Users::find(2)->assignRole('admin');
        Users::find(3)->assignRole('super-admin');
    }
}
