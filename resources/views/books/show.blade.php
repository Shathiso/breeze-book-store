
<x-guest-layout>
    <x-slot name="main">  
        <div>Name: {{ $book->title}}</div>
        <div>Description: {{ $book->description}}</div>
        <div>Price: {{ $book->price}}</div>
        <div>Genre: {{ $book->genre_name}}</div>
       <div> Author: {{ $book->author_name}}</div>
    </x-slot>

</x-guest-layout>