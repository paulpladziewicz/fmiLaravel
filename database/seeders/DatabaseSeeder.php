<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Event;
use App\Models\Person;
use App\Models\User;
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
//         \App\Models\User::factory(10)->create();

        Event::create([
            'user_id' => 1,
            'name' => 'Paul',
            'by' => 'Pladziewicz',
            'about' => 'Write a concise description about yourself here.',
            'entry_fee' => '5',
            'address' => '100 Main St.',
            'web_url' => 'paulpadziewicz.com',
            'start_time' => now(),
            'end_time' => now(),
        ]);

        Business::create([
            'user_id' => 1,
            'name' => 'Paul\'s Business',
            'about' => 'Write a concise description about yourself here.',
            'address' => '100 Main St.',
            'phone' => '2315555555',
            'web_url' => 'paulpadziewicz.com',
            'facebook_url' => 'paulpadziewicz.com',
            'instagram_url' => 'paulpadziewicz.com',
            'twitter_url' => 'paulpadziewicz.com',
            'linkedin_url' => 'paulpadziewicz.com',
        ]);
    }
}
