<?php

namespace App\Services;

use App\Models\Entity;

class EntityService
{
    public function getEntitiesByCategory($category)
    {
        return Entity::with('category')
        ->whereHas('category', function ($query) use ($category) {
            $query->where('category', $category)
                  ->orWhere('id', $category);
        })
        ->get();
    }
}
