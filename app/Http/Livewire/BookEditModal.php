<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;

use notify;
use Livewire\Component;
use App\Services\BookService;
use LivewireUI\Modal\ModalComponent;

class BookEditModal extends ModalComponent
{
    public $book;

    public $title;
    public $description;
    public $price;
    public $stock_quantity;
    public $genre_id;
    public $genre_name;
 
    protected $rules = [
        'title' => 'required|min:3',
        'description' => 'required',
        'price' => 'required',
        'stock_quantity' => 'required',
        'genre_id' => 'required'
    ];

    public function mount($book)
    {
        $this->book = $book;
        $this->title = $book['title'];
        $this->description =  $book['description'];
        $this->price = $book['price'];
        $this->stock_quantity = $book['stock_quantity'];
        $this->genre_name = $book['genre_name'];
    }

    public function render()
    {
        $genres  = Genre::all();

        return view('livewire.book-edit-modal', compact('genres'));
    }

    public function updateBook(){

        $this->validate();

        $book = Book::where('id', $this->book['id']);

        $book->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'stock_quantity' => $this->stock_quantity,
            'genre_id' => $this->genre_id
        ]);

        //session()->flash('msg', 'Book Updated');
        notify()->success('Book Updated');
        
        return redirect('dashboard');
    }
}
