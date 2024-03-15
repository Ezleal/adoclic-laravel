<?php

namespace Tests\Unit;

use App\Services\ApiService;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    public function test_fetch_entities_from_api()
    {
        $apiService = new ApiService();
        $apiService->baseUrl = 'https://api.publicapis.org';
        $entities = $apiService->fetchEntities();

        $this->assertNotEmpty($entities);

        foreach ($entities as $entity) {
            $this->assertArrayHasKey('API', $entity);
            $this->assertArrayHasKey('Description', $entity);
            $this->assertArrayHasKey('Link', $entity);
            $this->assertArrayHasKey('Category', $entity);
        }
    }
}
