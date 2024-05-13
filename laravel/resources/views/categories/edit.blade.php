<x-app-layout>
<form action="{{ isset($category) ? route("category.update", $category->id) : route("category.store")}}" method="post" >
@csrf
<div class="row text-white">
    <label for="name">Name</label>
    <input class="text-black" type="text" name="name" id="name" @isset($category) value="{{$category->name}}" @endisset>
</div>
<div class="row text-white">
</div>
<div class="row text-white">
    @isset($category)
        @method("PATCH")
    @endisset

<x-primary-button>
                {{ __('WRITE CATEGORY') }}
            </x-primary-button>
</div>
</form>
</x-app-layout>
