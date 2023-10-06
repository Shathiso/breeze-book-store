<?php

namespace App\Http\Livewire;

use notify;
use App\Models\Book;
use Livewire\Component;
use App\Services\BookService;
use App\Exports\UserBooksExport;
use Maatwebsite\Excel\Facades\Excel;


class UserBooks extends Component
{
    public $searchText = "";
    public $created_at_orderby = "desc";
    public $booksArray;


    public function render()
    {
        $books = (new BookService)->getUserBooks($this->searchText, $this->created_at_orderby);
        $this->booksArray = $books->items();
        return view('livewire.user-books', compact('books'));
    }

    public function createdOrderBy($order){
        $this->created_at_orderby = $order;
    }

    public function download($type){

        $export = new UserBooksExport($this->booksArray);

       if($type == 'csv'){
         session()->flash('msg', 'Download Complete');
         return Excel::download($export, 'books.xlsx');
       }
       if($type == 'pdf'){
        return Excel::download($export, 'books.pdf');
       }
    }

}
