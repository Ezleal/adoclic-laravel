<?php

namespace App\Services;

use App\Models\Entity;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EntityService
{
    public function getEntitiesByCategory($category)
    {
        $entities = Entity::with('category')
            ->whereHas('category', function ($query) use ($category) {
                $query->where('category', $category)
                    ->orWhere('id', $category);
            })
            ->get();

        if ($entities->isEmpty()) {
            throw new ModelNotFoundException("No entities found for category: $category");
        }

        return $entities;
    }
}
