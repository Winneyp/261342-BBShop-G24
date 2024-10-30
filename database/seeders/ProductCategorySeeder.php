<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Product_catagory')->insert([
            ['catagoryname' => 'shirt'],
            ['catagoryname' => 'short'],
            ['catagoryname' => 'trousers'],
            ['catagoryname' => 'jacket'],
            ['catagoryname' => 'shoes'],
        ]);
    }
}
