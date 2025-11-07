<?php

namespace Database\Seeders;

use App\Models\Delivery;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            User::factory(7)->create();
            Rol::factory(7)->create();

/*         User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */


        //Seeders
                $this->call([
            //EmployeesSeeder::class,
            DeliveriesSeeder::class,
            VehiclesSeeder::class,
            CompaniesSeeder::class,
            CategoriesSeeder::class,
            ServicesSeeder::class,

        ]);
    }
}
