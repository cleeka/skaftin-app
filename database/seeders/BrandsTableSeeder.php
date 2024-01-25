<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandRecords = [
           ['id'=>1,'name'=>'Carriwell','brand_image'=>'','status'=>1],
           ['id'=>2,'name'=>'Hisense','brand_image'=>'','status'=>1],
           ['id'=>3,'name'=>'JBL','brand_image'=>'','status'=>1],
           ['id'=>4,'name'=>'Cadac','brand_image'=>'','status'=>1],
           ['id'=>5,'name'=>'Smeg','brand_image'=>'','status'=>1],
           ['id'=>6,'name'=>'Harman Kardon','brand_image'=>'','status'=>1],
           ['id'=>7,'name'=>'GX&Co','brand_image'=>'','status'=>1],
           ['id'=>8,'name'=>'HP','brand_image'=>'','status'=>1]

        ];
        Brand::insert($brandRecords);
    }
}
