<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $companyIds = Company::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();

        foreach ($companyIds as $companyId) {



            Service::factory()->create([
                'company_id' => $companyId,
                'category_id' => rand(1, count($categoryIds)),
            ]);
        }
    }
}
