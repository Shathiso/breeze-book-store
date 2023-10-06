
<div class="p-6 max-h-screen">
    <button class="absolute text-red-600" style="right:24px;" class="mt-6" wire:click="$emit('closeModal')">Close</button>
      
        <form wire:submit.prevent="deleteBook" class="mt-6 text-center">
        @csrf 

        <p class="p-6">Are you sure you wish to delete the book titled <b class="block">{{ $book['title']}}?</b></p>
        <div class="flex items-center justify-center mt-4">

            <x-primary-button class="ml-4 bg-red-600 hover:bg-red-400">
                {{ __('Delete Book') }}
            </x-primary-button>
        </div>
    </form>
</div>
