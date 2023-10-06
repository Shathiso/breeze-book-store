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
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-300">
        @foreach ($books as $book)
        <tr class="text-center whitespace-nowrap">
            <td class="px-6 py-4 text-sm text-gray-500">
                {{ $book['id'] }}
            </td>
            <td class="px-6 py-4">
                <div class="text-sm text-gray-900">
                {{ $book['title'] }}
                </div>
            </td>
            <td class="px-6 py-4">
                <div class="text-sm text-gray-500">{{ $book['description'] }}</div>
            </td>
            <td class="px-6 py-4 text-sm text-gray-500">
               ${{ $book['price'] }}
            </td>
            <td class="px-6 py-4 text-sm text-gray-500">
                {{ $book['genre_name'] }}
            </td>
            <td class="px-6 py-4 text-sm text-gray-500">
                {{ $book['stock_quantity'] }}
            </td>
            <td class="px-6 py-4 text-sm text-gray-500">
                {{ $book['created_at'] }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>