<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\BookService;

class UserBooks extends Component
{
    public function render()
    {
        $books = (new BookService)->getUserBooks();
        return view('livewire.user-books', compact('books'));
    }
}
