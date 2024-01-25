<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeliveryAddress;

class DeliveryAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryRecords = [
        	
           ['id'=>1,'user_id'=>1,'name'=>'Joyce doh','address'=>'','city'=>'Accra','state'=>'Madina','country'=>'Ghana','pincode'=>'','mobile'=>'','status'=>1],
           ['id'=>2,'user_id'=>1,'name'=>'lizzy doh','address'=>'','city'=>'Accra','state'=>'Madina','country'=>'Ghana','pincode'=>'','mobile'=>'','status'=>1]
        ];

        DeliveryAddress::insert($deliveryRecords);
    }
}
