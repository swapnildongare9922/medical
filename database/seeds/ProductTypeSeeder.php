<?php

use App\Models\ProductType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
            'title'=>'tablet',
            'slug'=>'xui-tab',
        ]);
        DB::table('product_types')->insert([
            'title'=>'liquid',
            'slug'=>'xfi-liq',
        ]);
        DB::table('product_types')->insert([
            'title'=>'powder',
            'slug'=>'xyui-pow',
        ]);
    }
}
