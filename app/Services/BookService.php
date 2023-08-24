<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\JoinClause;

class BookService{


    public function getBooks($book_id){

        $books = DB::table('books')
           ->select('books.title', 'books.description', 'books.price', 'genres.name as genre_name', 'users.name as author_name')
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

    public function getUserBooks(){
        
        $user = Auth::user();;
        
        $books = DB::table('books')
            ->select('books.id', 'books.title', 'books.description', 'books.price', 'books.stock_quantity', 'books.created_at', 'genres.name as genre_name', 'users.name as author_name')
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
            ->get();
  
        return $books;
    }
}