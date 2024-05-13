<form action="{{ isset($movie) ? route("movie.update", $movie->id) : route("movie.store")}}" method="post" >
@csrf
<div class="row">
    <label for="">Title</label>
    <input type="text" name="title" id="title" @isset($movie) value="{{$movie->title}}" @endisset>
</div>
<div class="row">
    <label for="">Duration</label>
    <input type="time" name="duration" id="duration" @isset($movie) value="{{$movie->duration}}" @endisset>
</div>
<div class="row">
</div>
<div class="row">
    @isset($movie)
        @method("PUT")
    @endisset
    <button type="submit">Zapsat film</button>
</div>
</form>

