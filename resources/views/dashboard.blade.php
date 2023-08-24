<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <x-slot name="main">
        <div class="flex justify-between" style="margin-bottom: 30px">
            <span>You're logged in!</span>

            <a href="books/create" class="rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Store a book
             </a>
        </div>  
        <livewire:user-books />                        
    </x-slot>
</x-app-layout>
