
    <div class="p-6 max-h-screen">
        <form method="POST" action="{{ route('book.store') }}">
            @csrf 

            <!-- Name -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input class="block mt-1 w-full" type="text" name="title" :value="$book['title']" required autofocus autocomplete="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input class="block mt-1 w-full" type="text" name="description" :value="$book['description']" required autocomplete="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Price -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input class="block mt-1 w-full" type="text" name="price" :value="$book['price']" required autocomplete="price" />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="stock_quantity" :value="__('Quantity')" />
                <x-text-input class="block mt-1 w-full" type="number" name="stock_quantity" :value="$book['stock_quantity']" required autocomplete="stock_quantity" />
                <x-input-error :messages="$errors->get('stock_quantity')" class="mt-2" />
            </div>

            <!-- Author -->
            <div class="mt-4">
                <x-input-label for="author" :value="__('Author')" />
                <select class="form-control" name="author">
                <option>option 1</option>
                </select>
            </div>

            <!-- Genre -->
            <div class="mt-4">
                <x-input-label for="genre" :value="__('Genre')" />
                <select class="form-control" name="genre">
                    <option>option 1</option>
                </select>
            </div>



            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Update Book') }}
                </x-primary-button>
            </div>
        </form>
    </div>