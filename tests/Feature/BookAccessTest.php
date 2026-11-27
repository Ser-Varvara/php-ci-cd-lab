<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class BookAccessTest extends TestCase
{
    public function test_request_without_header_is_blocked(): void
    {
        $response = $this->postJson('/books', [
            'title' => 'Енеїда',
            'isbn' => '9789660100035',
            'publicationYear' => 2022,
            'description' => 'Поема',
        ]);

        $response->assertStatus(403)
            ->assertJson(['status' => 'error']);
    }

    public function test_request_with_header_is_allowed(): void
    {
        $response = $this->withHeaders([
            'X-Librarian-Id' => '1',
        ])->postJson('/books', [
            'title' => 'Енеїда',
            'isbn' => '9789660100035',
            'publicationYear' => 2022,
            'description' => 'Поема',
        ]);

        $response->assertStatus(201);
        $response->assertHeader('X-Security-Policy', 'Enforced');
    }
}
