<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
        	['id'=>1,'name'=>'kojo','address'=>'GH-123','city'=>'accra','state'=>'G accra','country'=>'Ghana','pincode'=>'0000','mobile'=>'024000000','email'=>'kojo@admin.com','status'=>0],
        ];
         Vendor::insert($vendorRecords);
    }
}
