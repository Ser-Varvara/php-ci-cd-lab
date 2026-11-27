<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private array $items = [
        [
            'id' => 1,
            'title' => 'Кобзар',
            'isbn' => '9789660100011',
            'publicationYear' => 2020,
            'description' => 'Збірка поезій',
        ],
        [
            'id' => 2,
            'title' => 'Лісова пісня',
            'isbn' => '9789660100028',
            'publicationYear' => 2021,
            'description' => 'Драма-феєрія',
        ],
    ];

    public function index(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => $this->items,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'isbn' => ['required', 'string'],
            'publicationYear' => ['required', 'integer', 'min:1'],
            'description' => ['required', 'string'],
        ]);

        $newItem = [
            'id' => count($this->items) + 1,
            ...$validated,
        ];

        $this->items[] = $newItem;

        return response()->json([
            'status' => 'created',
            'data' => $newItem,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        foreach ($this->items as $item) {
            if ($item['id'] === (int) $id) {
                return response()->json([
                    'status' => 'success',
                    'data' => $item,
                ], 200);
            }
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Книгу не знайдено.',
        ], 404);
    }
}
