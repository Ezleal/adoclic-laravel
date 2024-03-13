<?php

namespace Database\Seeders;

use App\Http\Controllers\ApiController;
use App\Services\ApiService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apiController = new ApiController(app(ApiService::class));
        $apiController->fetchAndInsertEntities();
    }
}
