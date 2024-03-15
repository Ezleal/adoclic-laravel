<?php

namespace Tests\Unit;

use App\Models\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_it_can_create_category(): void
    {
        $entity = Category::factory()->make([
            'name' => 'Test Category',
        ]);

        $this->assertInstanceOf(Category::class, $entity);
        $this->assertEquals('Test Category', $entity->name);
    }
}
