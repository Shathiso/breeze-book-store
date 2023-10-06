<x-guest-layout>
    <x-slot name="main" >
    <div x-data>
        <h1 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Your Cart</h1>
        <hr/>

        <div x-show="$store.Cart.count < 1" class="my-6">
            <h2>You currrently have <span class="font-bold" x-text="$store.Cart.count"></span> items in your cart.</h2>
        </div>

        <div x-show="$store.Cart.count > 0" class="flex flex-wrap justify-between" >

            <div>
                <ul class="mt-6">
                    <template x-for="book in $store.Cart.cartBooks">
                        <li class="mb-4 flex flex-col justify-between">
                            <div class="flex">
                                <img :src="book.image_url" class="w-[95px] inline-block mr-6" />

                                <div class="inline-block">

                                    <!-- Book title -->
                                    <h1 x-text="book.title" class="text-md"></h1>

                                    <!-- Book price -->
                                    <div class="font-bold text-lg">$<h3  x-text="book.price / book.quantity" class="inline-block font-bold"></h3></div> 

                                    <h1 class="mt-4 text-sm">Quantity</h1>
                                    <div class="flex flex-row mt-2">
                                        <!-- Subtract btn -->
                                        <button x-data :disabled="book.quantity <= 1" :class="book.quantity <= 1 ? 'cursor-default fill-gray-300 hover:fill-gray-300': 'cursor-pointer '" @click="$store.Cart.reduceBookCartQuantity(book)" class=" border rounded-md" style="padding: 2px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" :class="book.quantity <= 1 ? 'hover:fill-gray-300':'hover:fill-indigo-500'" height="0.8em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z"/></svg>
                                        </button>
                                        <!-- Quantity -->
                                        <p x-text="book.quantity" class="mx-4 relative"></p>

                                        <!-- Add  btn -->
                                        <button x-data @click="$store.Cart.increaseBookCartQuantity(book)" class="cursor-pointer border rounded-md" style="padding: 3px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="hover:fill-indigo-500" height="0.8em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                                        </button>
                                        <!-- Delete from Cart -->
                                        <svg x-data @click="$store.Cart.removeFromCart(book)"  xmlns="http://www.w3.org/2000/svg" 
                                        class="w-[22px] inline-block cursor-pointer ml-6 relative text-red-500 hover:text-red-800"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </template>
                </ul>
            </div>
           
            <!--Sidebar-->
            <div class="flex flex-col flex-wrap ml-6 bg-gray-100 mt-6 p-2 justify-between">
                <div class=" text-center font-bold text-lg py-2 pr-2 ">Total Price 
                    <div class="text-indigo-900">$<h1 x-text="$store.Cart.totalCost" class="inline-block"></h1></div>
                </div>
                <button class="modal-close px-4 bg-gray-800 hover:bg-indigo-500 p-3 rounded-sm text-white hover:bg-indigo-400" @click="$store.Cart.goToLogin()">Checkout</button>
            </div>
        </div>
    
    </div>
    </x-slot>
</x-guest-layout>