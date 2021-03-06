<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(categorys::class);
        $this->call(produucts::class);
        $this->call(RolePermissionSeeder::class,);
        $this->call(UserTableSeeder::class);
        $this->call(attribute::class);
        $this->call(values::class);
        $this->call(values_product::class);
        $this->call(variant::class);
        $this->call(variant_values::class);
    }
}
