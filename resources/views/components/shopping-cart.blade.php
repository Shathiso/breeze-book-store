<!--Overlay-->
<div  x-data x-cloak style="background-color: rgba(0,0,0,0.5); z-index:1000;" x-show="$store.Cart.show" class="absolute w-full h-[100vh] top-0 left-0 flex inset-0 items-center justify-center " style="z-index: 1000">
    <!--Dialog-->
    <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" 
         x-show="$store.Cart.show" @click.away="$store.Cart.show = false" 
         x-transition:enter="ease-out duration-300" 
         x-transition:enter-start="opacity-0 scale-90" 
         x-transition:enter-end="opacity-100 scale-100" 
         x-transition:leave="ease-in duration-300" 
         x-transition:leave-start="opacity-100 scale-100" 
         x-transition:leave-end="opacity-0 scale-90">

        <!--Title-->
        <div class="flex justify-between items-center pb-3">
            <div class="cursor-pointer z-50 w-full text-red-600 text-right" @click="$store.Cart.show = false">
                Close
            </div>
        </div>

        <!-- content -->
        <div>
            <h1 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Items In Your Cart</h1>
            <hr/>

            <div x-show="$store.Cart.count < 1" class="my-6">
                <h2>You currrently have <span class="font-bold" x-text="$store.Cart.count"></span> items in your cart.</h2>
            </div>

            <div x-show="$store.Cart.count > 0" >

                <ul class="mt-6">
                    <template x-for="book in $store.Cart.cartBooks">
                        <li class="mb-4 flex justify-between">
                            <div>
                                <img :src="book.image_url" class="w-[40px] inline-block mr-2" />
                                <span x-text="book.quantity" ></span> <span>x</span> <h1 x-text="book.title" class="inline-block"></h1>
                            </div>
                            <div class="mt-4">
                                $<h3 class="inline-block " x-text="book.price"></h3>
                                <svg x-data @click="$store.Cart.removeFromCart(book)"  xmlns="http://www.w3.org/2000/svg" class="w-[17px] h-6 inline-block cursor-pointer relative text-red-500 hover:text-red-800"
                                fill="none" viewBox="0 0 24 24" style="top:-2px" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            </div>
                        </li>
                    </template>
                </ul>
                <div class="bg-gray-100 text-right font-semibold py-2 pr-2">Total Price: <span class="text-indigo-900">$<h1 x-text="$store.Cart.totalCost" class="inline-block"></h1></span></div>
            
                <!--Footer-->
                <div class="flex justify-center mt-6 ">
                    <!--<button class="modal-close px-4 bg-red-600 hover:bg-red-400 p-3 rounded-sm text-white mr-4" @click="$store.Cart.clearCart()">Clear Cart</button>-->
                    <button class="modal-close px-4 bg-gray-800 hover:bg-indigo-500 p-3 rounded-sm text-white hover:bg-indigo-400" @click="$store.Cart.goToCart()">Checkout</button>
                </div>
            </div>
        
        </div>




    </div>
    <!--/Dialog -->
</div><!-- /Overlay -->