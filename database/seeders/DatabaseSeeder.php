<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Disability;
use App\Models\Environment;
use App\Models\IndexCard;
use App\Models\Program;
use App\Models\Service;
use App\Models\Users;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {

        $this->call(RoleSeeder::class);
        // $this->call(UsersSeeder::class);
     Users::factory(10000)->create();
     Environment::factory(1000)->create();
     Program::factory(1000)->create();
     IndexCard::factory(1000)->create();
     Environment::factory(1000)->create();
     Service::factory(1000)->create();
     Disability::factory(10000)->create();
        // // \App\Models\User::factory()->create([
        // //     'name' => 'Test User',
        // //     'email' => 'test@example.com',
        // // ]);
    }
}
