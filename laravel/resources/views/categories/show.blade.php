<x-app-layout>
        <div class="text-white flex gap-4 flex-col p-4">
            <h2 class="text-2xl font-bold">{{$category->name}}</h2>

            <div class="flex gap-4 mt-2">
                <p><a href="{{route("category.edit", $category->id)}}"><x-primary-button>
                    {{ __('Edit') }}
                </x-primary-button></a></p>

                <form action="{{route("category.destroy", $category->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <x-primary-button>
                        {{ __('Delete') }}
                    </x-primary-button>
                </form>
            </div>

            <div class="mt-8">
                <h3 class="text-xl font-semibold">Products</h3>
                <ul class="mt-4 grid grid-rows-1 md:grid-rows-2 lg:grid-rows-3 gap-4">
                    @foreach ($products as $product)
                        <div class="bg-gray-800 p-4 rounded-lg relative">
                            <h4 class="text-lg font-semibold">{{ $product->name }}</h4>
                            <h4 class="text-lg font-semibold">{{ $product->price }}</h4>
                            <h4 class="text-lg font-semibold">{{ $product->desc }}</h4>
                            <img src="{{ asset($product->img_url) }}" alt="product image">
                            <div class="flex flex-col gap-4">
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                            @csrf
                                            <x-primary-button>{{ __('Add to Cart') }}</x-primary-button>
                                </form>
<div class="w-fit">
                                <x-primary-button>
                                    <a  href="{{route("product.edit", $product->id)}}">
                                    {{ __('Edit') }}
                                    </a>
                                </x-primary-button>
</div>
                                <form action="{{route("product.destroy", $product->id)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <x-primary-button>
                                        {{ __('Delete') }}
                                    </x-primary-button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </ul>
                    <x-primary-button>
<a href="{{route("product.create")}}">

                        {{ __('New product') }}
</a>
                    </x-primary-button>
            </div>
        </div>
</x-app-layout>

