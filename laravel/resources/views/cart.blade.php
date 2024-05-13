<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="flex gap-4 flex-col pt-4">
                @forelse ($cart as $cartItem)
                    <div class="p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <h2 class="text-white">{{ $cartItem->name }}</h2>
                        <p class="text-white">{{ $cartItem->desc }}</p>
                        <p class="text-white">{{ $cartItem->price }}</p>
                        <p class="text-white">
                            <a href="{{ route('cartItem.destroy', $cartItem->id) }}" class="text-red-500">Remove from cart</a>
                        </p>
                    </div>
                @empty
                    <p class="text-white">Nothing in cart</p>
                @endforelse
                <a href="{{ route('cart.resetCart') }}" class="text-red-500">Reset cart</a>
            </section>
        </div>
    </div>
</x-app-layout>

