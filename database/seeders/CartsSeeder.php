<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userIds = User::pluck('id')->toArray();
        $productIds = Product::pluck('id')->toArray();
        $serviceIds = Service::pluck('id')->toArray();

        foreach ($userIds as $userId) {

            Cart::factory()->create([
                'user_id' => $userId,
                'product_id' => rand(1, count($productIds)),
                'service_id' => rand(1, count($serviceIds)),
            ]);
        }
    }
}
