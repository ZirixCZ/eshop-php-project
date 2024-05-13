<x-app-layout>
    <form action="{{ isset($product) ? route("product.update", $product->id) : route("product.store")}}" method="post" >
    @csrf
    <div class="row text-white">
        <label for="name">Name</label>
        <input class="text-black" type="text" name="name" id="name" @isset($product) value="{{$product->name}}" @endisset>
    </div>
    <div class="row text-white">
        <label for="desc">Description</label>
        <input class="text-black" type="text" name="desc" id="desc" @isset($product) value="{{$product->desc}}" @endisset>
    </div>
    <div class="row text-white">
        <label for="price">Price</label>
        <input class="text-black" type="number" name="price" id="price" @isset($product) value="{{$product->price}}" @endisset>
    </div>
    <div class="row text-white">
        <label for="category_id">CategoryId</label>
        <input class="text-black" type="text" name="category_id" id="category_id" @isset($product) value="{{$product->category_id}}" @endisset>
    </div>
    <div class="row text-white">
        <label for="img_url">Img url (ending on .png, .jpg and such)</label>
        <input class="text-black" type="text" name="img_url" id="img_url" @isset($product) value="{{$product->img_url}}" @endisset>
    </div>
    <img src="{{ isset($product) ? asset($product->img_url) : "" }}" alt="product image">
    <div class="row text-white">
    </div>
    <div class="row text-white">
        @isset($product)
        @method("PATCH")
        @endisset

        <x-primary-button>
            {{ __('WRITE CATEGORY') }}
        </x-primary-button>
    </div>
    </form>
</x-app-layout>
