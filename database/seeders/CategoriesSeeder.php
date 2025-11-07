<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $companyIds = Company::pluck('id')->toArray();

        foreach ($companyIds as $deliveryId) {

            Category::factory()->create([
                'company_id' => $deliveryId,
            ]);
        }
    }
}
