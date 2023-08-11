<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(){
       $books = Book::all();
       return view('welcome', compact('books'));
    }

    public function store(){
       
    }

    public function update(){
       
    }

    public function delete(){
       
    }
}
