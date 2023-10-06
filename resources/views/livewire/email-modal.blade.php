
<div class="p-6 max-h-screen">
    <button class="absolute text-red-600" style="right:24px;" class="mt-6" wire:click="$emit('closeModal')">Close</button>
      
        <form wire:submit.prevent="email" class="mt-6 text-center">
        @csrf 

         <!-- Email -->
         <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input class="block mt-1 w-full" type="text" name="email" wire:model="email" required autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="flex items-center justify-center mt-4">

            <x-primary-button class="ml-4 hover:bg-indigo-700">
                {{ __('Send Email') }}
            </x-primary-button>
        </div>
    </form>
</div>
