<?php

namespace Database\Seeders;

use App\Models\IndexCard;
use Database\Factories\IndexCardFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IndexCardFactory::factory(1000)->create();

    }
}

