<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Donations;

class DonationDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $runnerCount = 500;
        $date=date('Y-m-d H:i:s');
        $currentDate = date_create($date);
        $currenyList = ["₹","$","€"];
        $donationList = [10,20,30,40,50];

        for($i=1; $i<=$runnerCount; $i++) {
            date_sub($currentDate,date_interval_create_from_date_string("6 hours"));
            Donations::create([
                'name' => 'RandomUser' . rand(1,500),
                'amount' => $donationList[rand(0,count($donationList)-1)],
                'currency' => $currenyList[rand(0,count($currenyList)-1)],
                'donation_message' => "Thank you for being awesome"
            ]);
        }
    }
}
