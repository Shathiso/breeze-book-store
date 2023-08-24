<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Services\BookService;

class BookEditModal extends ModalComponent
{
    public $book;

    public function mount($book)
    {
        $this->book = $book;
    }

    public function render()
    {
        $book = $this->book;
        return view('livewire.book-edit-modal', compact('book'));
    }
}
