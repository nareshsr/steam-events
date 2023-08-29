<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Followers;

class FollowerDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $runnerCount = 500;
        $date=date('Y-m-d H:i:s');
        $currentDate = date_create($date);

        for($i=1; $i<=$runnerCount; $i++) {
            date_sub($currentDate,date_interval_create_from_date_string("6 hours"));
            Followers::create([
                'name' => 'RandomUser' . $i,
                'created_at' => date_format($currentDate,"Y-m-d H:i:s")
            ]);
        }
    }
}
