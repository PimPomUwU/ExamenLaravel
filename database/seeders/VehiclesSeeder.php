<?php

namespace Database\Seeders;

use App\Models\Delivery;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
                $deliveryIds = Delivery::pluck('id')->toArray();

                foreach ($deliveryIds as $deliveryId) {

                Vehicle::factory()->create([
                    'delivery_id' => $deliveryId,
                ]);

        }
    }
}
