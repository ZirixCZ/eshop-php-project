<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\StoreRequest;
use App\Http\Requests\Movie\UpdateRequest;
use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : Response
    {
        return response()->view("dashboard", [
            "movies" => Movie::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view("movies.edit");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request) : RedirectResponse
    {
        var_dump($request->validated());
        $m = Movie::create($request->validated());
        if ($m) {
            return redirect()->route("movie.index");
        } else {
            return redirect()->back();
        }
        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) : Response
    {
        return response()->view("movies.show", [
            "movie" => Movie::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : Response
    {
        return response()->view("movies.edit", [
            "movie" => Movie::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id) : RedirectResponse
    {
        $m = Movie::findOrFail($id);

        if ($m->update($request->validated())) {
            return redirect()->route("movie.index");
        } else {
            return abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : RedirectResponse
    {
        $m = Movie::findOrFail($id);

        if ($m->delete()) {
            return redirect()->route("movie.index");
        } else {
            return abort(500);
        }
    }
}
