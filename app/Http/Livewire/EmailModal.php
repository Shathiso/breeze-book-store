<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Mail\BookListEmail;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use LivewireUI\Modal\ModalComponent;

class EmailModal extends ModalComponent
{
    public $email = "";
    public $books;

    public function mount($books)
    {
        $this->books = $books;
    }

    public function render()
    {
        return view('livewire.email-modal');
    }

    public function email(){
 
        Mail::to($this->email)->send(new BookListEMail($this->books['data']));
        notify()->success('Email Sent');
        return redirect('dashboard');

        /*Mail::to($request->user())
    ->cc($moreUsers)
    ->bcc($evenMoreUsers)
    ->send(new OrderShipped($order));*/
    }
}
