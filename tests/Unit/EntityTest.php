<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Entity;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntityTest extends TestCase
{
    use RefreshDatabase;
    public function test_it_can_create_entity()
    {
        $entity = Entity::factory()->make([
            'api' => 'Test API',
            'description' => 'Test description',
            'link' => 'http://test.com',
            'category_id' => 1,
        ]);

        $this->assertInstanceOf(Entity::class, $entity);
        $this->assertEquals('Test API', $entity->api);
        $this->assertEquals('Test description', $entity->description);
        $this->assertEquals('http://test.com', $entity->link);
        $this->assertEquals(1, $entity->category_id);
    }
}
