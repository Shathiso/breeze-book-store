<?php

namespace Tests\Feature\Book;

use Tests\TestCase;
use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewAllBooksTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_books_can_be_retrieved(): void
    {


    }
}
