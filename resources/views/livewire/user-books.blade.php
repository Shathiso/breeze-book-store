
<div>
    @if ($books->count() > 0)
        <div class="flex justify-between">
            <h1 class="inline-block">Your books</h1>   
            <div class="flex inline-block">
                <button wire:click="$emit('openModal', 'email-modal', {{ json_encode(['books' => $books]) }})" class="flex w-full justify-center hover:text-indigo-700 text-black items-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" style="height: 42px;margin-right:8px;">
                    <div>Email</div>

                    <div class="ml-1">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/></svg>
                    </div>
                </button>

                <x-dropdown align="right" width="48" class="mr-2">
                    <x-slot name="trigger">
                        <button class="flex w-full justify-center hover:text-indigo-700 text-black items-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" style="height: 42px;margin-right:8px;">
                            <div>Download</div>
    
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
    
                    <x-slot name="content">
                        <x-dropdown-link class="cursor-pointer" wire:click="download('csv')">
                            {{ __('CSV') }}
                        </x-dropdown-link>
    
                        <x-dropdown-link class="cursor-pointer" wire:click="download('pdf')">
                            {{ __('PDF') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
         
                <x-text-input id="title" class="inline-block ml-2" wire:model="searchText" placeholder="Search" type="text" name="title" :value="old('title')" autofocus autocomplete="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
        </div>

        <table class="divide-y divide-gray-400 w-full mt-4 " id="dataTable">
            <thead class="bg-gray-800 text-white">
                <tr class="rounded-md">
                    <th class="px-6 py-2 text-xs ">
                        ID
                    </th>
                    <th class="px-6 py-2 text-xs ">
                        Title
                    </th>
                    <th class="px-6 py-2 text-xs ">
                        Description
                    </th>
                    <th class="px-6 py-2 text-xs ">
                        Price
                    </th>
                    <th class="px-6 py-2 text-xs ">
                        Genre
                    </th>
                    <th class="px-6 py-2 text-xs ">
                        Quantity
                    </th>
                    <th class="px-6 py-2 text-xs relative">
                        Created_at 
                        <span class="absolute" style="top: 5px; right: 55px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="16px" wire:click="createdOrderBy('asc')" class="{{ $created_at_orderby == 'desc' ? 'cursor-pointer' : '' }}" style="position: relative; top: 1px; {{ $created_at_orderby == 'desc' ? 'fill:white' : 'fill:#4338ca' }}"  height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M182.6 137.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9s16.6 19.8 29.6 19.8H288c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z"/></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="16px" wire:click="createdOrderBy('desc')" class="{{ $created_at_orderby == 'asc' ? 'cursor-pointer' : '' }}" style="position: relative; top: -7px;  {{ $created_at_orderby == 'asc' ? 'fill:white' : 'fill:#4338ca' }}" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                        </span>
                    </th>
                    <th class="px-6 py-2 text-xs ">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300">
                @foreach ($books as $book)
                <tr class="text-center whitespace-nowrap">
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $book->id }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                        {{ $book->title }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-500">{{ $book->description }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                       ${{ $book->price }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $book->genre_name }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $book->stock_quantity }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $book->created_at }}
                    </td>
                    <td class="px-6 py-4">
                        <span wire:click="$emit('openModal', 'book-edit-modal', {{ json_encode(['book' => $book]) }})" class="inline-block text-center cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-700"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </span>
                   
                        <span wire:click="$emit('openModal', 'confirm-book-delete-modal', {{ json_encode(['book' => $book]) }})" class="inline-block text-center cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $books->links() }}
    @else
        No Books Found
    @endif
</div>