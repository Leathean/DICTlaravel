<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;

class MovieController extends Controller
{
    public function index()
    {
        $data = Movie::with('category')->get();
        return view('Pages.page1', compact('data'));
    }

    public function create()
    {
        $categories = Category::select('id', 'name')
            ->get();

        return view('Pages.movie-form', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'star_rating' => 'required|integer|min:1|max:5',
            'director' => 'required',
            'date_published' => 'required|date',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $path = null;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs('movies', $filename, 'public');
        }

        Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'star_rating' => $request->star_rating,
            'director' => $request->director,
            'date_published' => $request->date_published,
            'category_id' => $request->category_id,
            'photo' => $path ?? null,
        ]);

        return redirect()->route('movies.index')
            ->with('success', 'Movie successfully created');
    }

    public function edit(string $id)
    {
        $data = Movie::findOrFail($id);
        $categories = Category::select('id', 'name')->get();

        return view('Pages.movie-form', compact('data', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $data = Movie::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'star_rating' => 'required|integer|min:1|max:5',
            'director' => 'required',
            'date_published' => 'required|date',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $path = $data->photo;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('movies', $filename, 'public');
        }

        $data->update([
            'title' => $request->title,
            'description' => $request->description,
            'star_rating' => $request->star_rating,
            'director' => $request->director,
            'date_published' => $request->date_published,
            'category_id' => $request->category_id,
            'photo' => $path ?? null,
        ]);

        return redirect()->route('movies.index')
            ->with('success', 'Movie successfully updated');
    }

    public function destroy(string $id)
    {
        $data = Movie::findOrFail($id);
        $data->delete();

        return redirect()->route('movies.index')
            ->with('success', 'Movie deleted successfully!');
    }
}
