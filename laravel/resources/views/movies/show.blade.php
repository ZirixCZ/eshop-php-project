<h2>{{$movie->title}}</h2>
<p>Duration: {{$movie->duration}}</p>

<p><a href="{{route("movie.edit", $movie->id)}}">Edit</a></p>


<form action="{{route("movie.destroy", $movie->id)}}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete</button>
</form>
