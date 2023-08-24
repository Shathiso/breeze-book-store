<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BookStoreRequest;
use App\Services\BookService;
use Illuminate\Database\Query\JoinClause;

class BookController extends Controller
{

   protected $bookService;

   public function __construct(){
       $this->bookService = new BookService();
   }

   public function index(){
       $books = Book::orderBy('created_at', 'desc')->get();
       return view('welcome', compact('books'));
   }

    public function create(){
        $authors = Author::all();
        $genres  = Genre::all();
        return view('books.create', compact('authors', 'genres'));
     }

     public function store(BookStoreRequest $request){

        Book::create([
         'title' => $request->title,
         'description' => $request->description,
         'price' => $request->price,
         'stock_quantity' => $request->stock_quantity,
         'author_id' => $request->author_id,
         'genre_id' => $request->genre_id
        ]);
        
        session()->flash('msg', 'Book Stored');
        
        return redirect('dashboard');
     }

    public function edit(Request $request){
      $book_id = $request->route('book');
      $book = $this->bookService->getBooks($book_id, $options = null);

      return view('books.edit', compact('book'));
    }

    public function update(Book $book){
       
    }

   public function show(Request $request){
      $book_id = $request->route('book');
      $book = $this->bookService->getBooks($book_id, $options = null);

      return view('books.show', compact('book'));
   }
}