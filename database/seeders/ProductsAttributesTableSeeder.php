<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsAttribute;

class ProductsAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ProductAttributesRecords = [
        	['id'=>1,'product_id'=>6,'size'=>'Small','price'=>2000,'stock'=>10,'sku'=>'HS100-S','status'=>1],
        	['id'=>2,'product_id'=>6,'size'=>'Medium','price'=>2400,'stock'=>30,'sku'=>'HS100-M','status'=>1],
        	['id'=>3,'product_id'=>6,'size'=>'Large','price'=>2600,'stock'=>20,'sku'=>'HS100-L','status'=>1]
        ];
        ProductsAttribute::insert($ProductAttributesRecords);
    }
}
