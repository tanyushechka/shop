<?php

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        /**
         * @var App\ProductCategory $pc
         */
        factory(App\ProductCategory::class, 5)->create()->each(function($pc) {
            $pc->save();
        });
    }


}
