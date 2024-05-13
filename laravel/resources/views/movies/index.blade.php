<section>
@forelse ($movies as $movie)
    <article>
        <h2>{{ $movie->title }}</h2>
        <p>{{ $movie->duration }}</p>
        <p><a href="{{route("movie.show", $movie->id)}}">Vice</a></p>
    </article>
@empty
    <p>No movies found</p>
@endforelse
<p><a href="{{route("movie.create")}}">Pridat novy</a></p>
</section>
