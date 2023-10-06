<?php

namespace App\Http\Controllers;

use notify;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Services\BookService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BookStoreRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Query\JoinClause;

use function Laravel\Prompts\error;

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
 
        $s3Path = 'https://swnpublicimages.s3.eu-west-1.amazonaws.com';
        $imagePath = $s3Path.'/book-cover2.png';


        if(isset($request->image)){

            try{

                # rename file name to random name
                $fileName = $request->image->getClientOriginalName();
                $filePath = 'images/' . $fileName;

                $imagePath = Storage::disk('s3')->put($filePath, file_get_contents($request->image));
                $imagePath = $s3Path.'/images/'.$fileName;

            }catch(\Exception $e) {
                return $e->getMessage();
            }
        }

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'author_id' => $request->author_id,
            'genre_id' => $request->genre_id,
            'image_url' => $imagePath
        ]);
        

        notify()->success('Book Stored');
        
        return redirect('dashboard');
     }

    public function edit(Request $request){
      $book_id = $request->route('book');
      $book = $this->bookService->getBooks($book_id);

      return view('books.edit', compact('book'));
    }



   public function show(Request $request){
        $book_id = $request->route('book');
        $book = $this->bookService->getBooks($book_id);

        return view('books.show', compact('book'));
   }

}