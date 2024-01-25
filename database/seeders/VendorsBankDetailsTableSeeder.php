<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetail;

class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
          ['id'=>1,'vendor_id'=>1,'account_holder_name'=>'Mawuena','bank_name'=>'GCB','account_number'=>'00001122333','bank_ifsc_code'=>'12345'  ],
        ];
        VendorsBankDetail::insert($vendorRecords);
    }
}
