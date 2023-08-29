<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MerchSales;

class MerchSaleDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $runnerCount = 500;
        $date=date('Y-m-d H:i:s');
        $currentDate = date_create($date);
        $item=['casual shoes', 'fancy pants', 'party wear', 'sun glasses', 'lipstick'];
        $itemAmount = [10,20,30,40,50];

        for($i=1; $i<=$runnerCount; $i++) {
            date_sub($currentDate,date_interval_create_from_date_string("6 hours"));
            $rand = rand(0,4);
            MerchSales::create([
                'name' => 'RandomUser' . rand(1,500),
                'item_name' => $item[$rand],
                'amount' => $itemAmount[$rand],
                'price' => $itemAmount[$rand] * rand(1,4),
                'created_at' => date_format($currentDate,"Y-m-d H:i:s")
            ]);
        }
    }
}
