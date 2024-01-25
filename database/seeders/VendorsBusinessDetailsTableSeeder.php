<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetail;

class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
          ['id'=>1,'vendor_id'=>1,'shop_name'=>'Mawuena Shop','shop_address'=>'123-GHA','shop_city'=>'Accra','shop_state'=>'Tema','shop_country'=>'Ghana','shop_pincode'=>'0000','shop_mobile'=>'02400000','shop_website'=>'mawuena.com','shop_email'=>'shop@admin.com','address_proof'=>'Passport','address_proof_image'=>'test.jpg','business_license_number'=>'123355643','gst_number'=>'0034555','pan_number'=>'2344566'  ],
        ];
        VendorsBusinessDetail::insert($vendorRecords);
    }
}
