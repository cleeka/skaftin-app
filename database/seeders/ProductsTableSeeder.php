<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $productRecords = [

           ['id'=>1,'section_id'=>1,'category_id'=>3,'brand_id'=>2,'vendor_id'=>1,'admin_id'=>0,'admin_type'=>'vendor','product_name'=>'Hisense frigde','product_code'=>'HS20','product_color'=>'White','product_price'=>2500,'product_discount'=>10,'product_weight'=>200,'product_image'=>'','product_video'=>'','description'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_featured'=>'Yes','status'=>1],
            ['id'=>2,'section_id'=>3,'category_id'=>11,'brand_id'=>1,'vendor_id'=>0,'admin_id'=>1,'admin_type'=>'superadmin','product_name'=>'Black shoes for women','product_code'=>'ws43','product_color'=>'black','product_price'=>250,'product_discount'=>10,'product_weight'=>20,'product_image'=>'','product_video'=>'','description'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_featured'=>'Yes','status'=>1]
       ];

       Product::insert($productRecords);

    }
}
