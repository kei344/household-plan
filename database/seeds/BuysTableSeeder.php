<?php

use Illuminate\Database\Seeder;

class BuysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {

            DB::table('buys')->insert([
                'user_id' => 1,
                'goods' => 'goods' . $i,
                'price' => 100,
                'purchase_number' => 1
            ]);
        }
    }
}
