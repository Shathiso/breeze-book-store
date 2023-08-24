<?php

namespace Tests\Feature\Book;

use Tests\TestCase;
use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewBooksTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_all_books_can_be_viewed(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSessionHasNoErrors();

    }

    public function test_a_single_book_can_be_viewed(): void
    {

        $response = $this->get('/books/2/view');

        $response->assertStatus(200);
        $response->assertSessionHasNoErrors();

    }
}
