<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prIds = DB::table('products')->pluck('id');
        $prCatIds = DB::table('product_categories')->pluck('id');
        $cnt = count($prCatIds);
        foreach ($prIds as $id) {
            $kArr = array_rand($prCatIds, random_int(2, $cnt));
            foreach ($kArr as $k) {
                DB::table('products_product_categories')->insert([
                    'category_id' => $prCatIds[$k],
                    'product_id' => $id
                ]);
            }
        }
    }
}
