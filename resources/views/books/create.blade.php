
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Store a Book') }}
        </h2>
    </x-slot>
    <x-slot name="main">
        <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autocomplete="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>


            <!-- Price -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autocomplete="price" />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="stock_quantity" :value="__('Quantity')" />
                <x-text-input id="stock_quantity" class="block mt-1 w-full" type="number" name="stock_quantity" :value="old('stock_quantity')" required autocomplete="stock_quantity" />
                <x-input-error :messages="$errors->get('stock_quantity')" class="mt-2" />
            </div>

            <!-- Author -->
            <div class="mt-4">
                <x-input-label for="author" :value="__('Author')" />
                <select class="form-control" name="author_id">
                    @if ($authors->count() > 0)
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" @selected(old('author_id') == $author)>
                                {{ $author->user->name }}
                            </option>
                        @endForeach
                    @else
                        No Record Found
                    @endif
                </select>
            </div>

            <!-- Genre -->
            <div class="mt-4">
                <x-input-label for="genre" :value="__('Genre')" />
                <select class="form-control" name="genre_id">
                    @if ($genres->count() > 0)
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" @selected(old('genre_id') == $genre)>
                                {{ $genre->name }}
                            </option>
                        @endForeach
                    @else
                        No Record Found
                    @endif
                </select>
            </div>

            <!-- Image -->
            <div class="mt-4">
                <x-input-label for="image" :value="__('Image')" />
                <input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autocomplete="image" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>



            <div class="flex items-center justify-end mt-4">
                <button class="rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Store a book
                </button>
            </div>
        </form>
    </x-slot>

</x-app-layout>