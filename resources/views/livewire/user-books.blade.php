
    Your books
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
                    <th class="px-6 py-2 text-xs ">
                        Created_at
                    </th>
                    <th class="px-6 py-2 text-xs ">
                        Edit
                    </th>
                    <th class="px-6 py-2 text-xs ">
                        Delete
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
                        <a wire:click="$emit('openModal', 'book-edit-modal', {{ json_encode(['book' => $book]) }})" class="inline-block text-center cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-700"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="inline-block text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

