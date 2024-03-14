<?php

namespace App\Http\Controllers;

use App\Http\Resources\EntityResource;
use App\Services\EntityService;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    protected $entityService;

    public function __construct(EntityService $entityService)
    {
        $this->entityService = $entityService;
    }

    public function getEntitiesByCategory($category)
    {
        try {
            $entities = $this->entityService->getEntitiesByCategory($category);
            return response()->json(['success' => true, 'data' => EntityResource::collection($entities)]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch entities by category'], 500);
        }
    }
}
