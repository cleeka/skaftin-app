<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id'=>2,'name'=>'kojo','type'=>'vendor','vendor_id'=>1,'mobile'=>'3000000','email'=>'kojo@admin.com','password'=>'$2a$12$JlPjgw0XdIoVHPn0ZRN.sOvBuyuWhTy18gXhQcqgHzsKPXnG9DjxS','image'=>'','status'=>0],
        ];
          Admin::insert($adminRecords);
    }
}
