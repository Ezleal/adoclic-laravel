<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Entity;
use App\Services\ApiService;

class ApiController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function fetchAndInsertEntities()
    {
        try {
            $entities = $this->apiService->fetchEntities();

            $categories = array_filter($entities, function ($entity) {
                return $entity['Category'] === 'Animals' || $entity['Category'] === 'Security';
            });

            foreach ($categories as $category) {
                Entity::create([
                    'api' => $category['API'],
                    'description' => $category['Description'],
                    'link' => $category['Link'],
                    'category_id' => Category::NAMES[$category['Category']],
                ]);
            }

            return response()->json(['message' => 'Entities inserted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch and insert entities']);
        }
    }
}
