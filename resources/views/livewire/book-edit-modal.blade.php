
    <div class="p-6 max-h-screen">
        <button class="absolute text-red-600" style="right:24px;" class="mt-6" wire:click="$emit('closeModal')">Close</button>
          
            <form wire:submit.prevent="updateBook" class="mt-6">
            @csrf 

            <!-- Name -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input class="block mt-1 w-full" type="text" name="title" wire:model="title" :value="$book['title']" required autofocus autocomplete="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input class="block mt-1 w-full" type="text" name="description" wire:model="description" :value="$book['description']" required autocomplete="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Price -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input class="block mt-1 w-full" type="text" name="price" wire:model="price" :value="$book['price']" required autocomplete="price" />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="stock_quantity" :value="__('Quantity')" />
                <x-text-input class="block mt-1 w-full" type="number" name="stock_quantity" wire:model="stock_quantity" :value="$book['stock_quantity']" required autocomplete="stock_quantity" />
                <x-input-error :messages="$errors->get('stock_quantity')" class="mt-2" />
            </div>


            <!-- Genre -->
            <div class="mt-4">
                <x-input-label for="genre" :value="__('Genre')" />
                <select class="form-control" name="genre_id" wire:model="genre_id">
                    @if ($genres->count() > 0)
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" @selected($book['genre_name'] == $genre->name) >
                                {{ $genre->name }}
                            </option>
                        @endForeach
                    @else
                        No Record Found
                    @endif
                </select>
                <x-input-error :messages="$errors->get('genre_id')" class="mt-2" />
            </div>



            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Update Book') }}
                </x-primary-button>
            </div>
        </form>
    </div>