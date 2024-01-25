<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectionRecords = [
          ['id'=>1,'name'=>'Electronics','status'=>1],
          ['id'=>2,'name'=>'Home Appliance','status'=>1],
          ['id'=>3,'name'=>'Fashion','status'=>1]
    
        ];

        Section::insert($sectionRecords);
    }
}
