<?php

namespace Tests\Feature\Book;

use Tests\TestCase;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookCreationTest extends TestCase
{

    use RefreshDatabase;

    public function test_books_creation_form_page_can_be_viewed(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->get('/books/create');
        $response->assertStatus(200);
    }

    public function test_books_can_be_created(): void
    {
        $response = $this->post('/books', [
            'title' => 'Test story',
            'description' => 'lorem ipsum',
            'price' => 20,
            'stock_quantity' => 5,
            'author_id' => 1,
            'genre_id' => 1
        ]);

        $response->assertSessionHasNoErrors();
    }
}
