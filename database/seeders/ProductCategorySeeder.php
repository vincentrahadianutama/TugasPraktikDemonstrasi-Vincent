<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        ProductCategory::create(['category_name' => 'Kue']);
        ProductCategory::create(['category_name' => 'Roti']);
        ProductCategory::create(['category_name' => 'Permen']);
    }
}
