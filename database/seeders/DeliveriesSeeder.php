<?php

namespace Database\Seeders;

use App\Models\Delivery;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userIds = User::pluck('id')->toArray();

                foreach ($userIds as $userId) {

                Delivery::factory()->create([
                    'user_id' => $userId,
                ]);

        }
    }
}
