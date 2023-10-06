<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ConfirmBookDeleteModal extends ModalComponent
{
    public $book;

    public function mount($book)
    {
        $this->book = $book;
    }

    public function render()
    {
        return view('livewire.confirm-book-delete-modal');
    }

    public function deleteBook(){

        $book = Book::where('id', $this->book['id']);

        $book->delete();

        notify()->success('Book Deleted');
        return redirect('dashboard');
    }


}
