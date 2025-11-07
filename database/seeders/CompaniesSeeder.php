<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
                $userIds = User::pluck('id')->toArray();

                foreach ($userIds as $userId) {

                Company::factory()->create([
                    'user_id' => $userId,
                ]);

        }
    }
}
