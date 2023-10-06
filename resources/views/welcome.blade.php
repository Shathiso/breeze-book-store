<x-guest-layout>
    <x-slot name="main" >

        @if($books->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8" >
                @foreach ( $books as $book )
                    <div>
                        <a href="books/{{$book->id}}/view" >
                            <div class="flex">
                                <img src="{{ $book->image_url }}" class=" inline-block max-w-[120px] scale-100 p-0 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" />

                                <div class="inline-block ml-4">
                                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ $book->title }}</h2>
                                    <h4 class="mt-2 text-lg font-semibold text-gray-900 dark:text-white">${{ $book->price }}</h4>
                                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                        {{ $book->description }}
                                    </p>
                                </div>
                            </div>
                        </a>
                        
                        <button x-data @click="$store.Cart.addToCart({{$book}})" class="rounded-md mt-6 bg-gray-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" >add to cart</button>
                    </div>

                  
                @endforeach

            </div>
        @else
        No Books available
        @endif
    </x-slot>
</x-guest-layout>