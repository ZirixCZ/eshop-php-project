<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <section class="flex gap-4 flex-col pt-4">
            @forelse ($categories as $category)
            <div class="p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="text-white">{{ $category->name }}</h2>
                    <p class="text-white"><a href="{{route("category.show", $category->id)}}">Open category</a></p>
                        </div>
            @empty
                <p>No categories found</p>
            @endforelse
            <div class="w-16">
<x-primary-button>
<a href="{{route("category.create")}}">
                {{ __('Add category') }}
</a>
            </x-primary-button>
</div>
            </section>
        </div>
    </div>
</x-app-layout>
