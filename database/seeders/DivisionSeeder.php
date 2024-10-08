<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::statement("

                INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`) VALUES 
                                (1, 'Chattagram', 'চট্টগ্রাম', 'www.chittagongdiv.gov.bd'),
                                (2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd'),
                                (3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd'),
                                (4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd'),
                                (5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd'),
                                (6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd'),
                                (7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd'),
                                (8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd');
            ");
    }
}
