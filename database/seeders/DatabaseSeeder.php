<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(AdminsTableSeeder::class);
       // $this->call(VendorsTableSeeder::class);
       // $this->call(VendorsBusinessDetailsTableSeeder::class);
       // $this->call(VendorsBankDetailsTableSeeder::class);
       //  $this->call(SectionsTableSeeder::class);
        // $this->call(CategoryTableSeeder::class);
       //  $this->call(BrandsTableSeeder::class);
         // $this->call(ProductsTableSeeder::class);
          // $this->call(ProductsAttributesTableSeeder::class);
        //  $this->call(DeliveryAddressTableSeeder::class);
          $this->call(OrderStatusTableSeeder::class);
 
    }
}
