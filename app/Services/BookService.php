<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\JoinClause;

class BookService{


    public function getBooks($book_id){

        $books = DB::table('books')
           ->select('books.title', 'books.description', 'books.price', 'books.image_url', 'genres.name as genre_name', 'users.name as author_name')
           ->where('books.id', '=', $book_id)
           ->join('genres', function (JoinClause $join) {
               $join->on('books.genre_id', '=', 'genres.id');
           })
           ->join('authors', function (JoinClause $join) {
              $join->on('books.author_id', '=', 'authors.id');
           })
           ->join('users', function (JoinClause $join) {
              $join->on('authors.user_id', '=', 'users.id');
           })
           ->get()[0];
  
         return $books;
    }

    public function getUserBooks($search, $orderby_created_at){
        
        $user = Auth::user();
        
        $books = DB::table('books')
            ->select('books.id', 'books.title', 'books.description', 'books.price', 'books.stock_quantity', 'books.created_at', 'genres.name as genre_name', 'users.name as author_name')
            ->where('books.title', 'like', '%'.$search.'%')
            ->join('genres', function (JoinClause $join) {
                $join->on('books.genre_id', '=', 'genres.id');
            })
            ->join('authors', function (JoinClause $join) {
                $join->on('books.author_id', '=', 'authors.id');
            })
            ->join('users', function (JoinClause $join) {
                $join->on('authors.user_id', '=', 'users.id');    
            })
            ->where('users.id', '=', $user->id)
            ->orderBy('books.created_at', $orderby_created_at)
            ->paginate(2);
  
        return $books;
    }

    public function getUserBook($book_id){
        
        $user = Auth::user();
        
        $book = DB::table('books')
            ->select('books.id', 'books.title', 'books.description', 'books.price', 'books.stock_quantity', 'books.created_at', 'genres.id as genre_id', 'genres.name as genre_name', 'authors.id as author_id', 'users.name as author_name')
            ->where('books.id', '=', $book_id)
            ->join('genres', function (JoinClause $join) {
                $join->on('books.genre_id', '=', 'genres.id');
            })
            ->join('authors', function (JoinClause $join) {
                $join->on('books.author_id', '=', 'authors.id');
            })
            ->join('users', function (JoinClause $join) {
                $join->on('authors.user_id', '=', 'users.id');    
            })
            ->where('users.id', '=', $user->id)
            ->orderBy('books.created_at', 'desc')
            ->get()[0];
  
        return $book;
        
    }

    public function updateBook($book_id, $request){
      
        $book = Book::where('id', $book_id);
        $result = $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'author_id' => $request->author_id,
            'genre_id' => $request->genre_id
        ]);

        return $result;

    }
}