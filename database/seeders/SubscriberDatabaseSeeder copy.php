<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subscribers;

class SubscriberDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $runnerCount = 500;
        // \App\Models\User::factory(10)->create();
        $tierStart = 1;

        for($i=1; $i<=$runnerCount; $i++) {
            Subscribers::create([
                'name' => 'RandomUser' . $i,
                'subscription_tier' => rand(1,3)
            ]);
        }
    }
}
