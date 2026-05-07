<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Movie;
    use App\Models\Category;
    class MovieController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {

            $data = Movie::with('category')->get();
            return view('Pages.page1',compact('data'));

        }

        /**
         * Show the form for creating a new resource.
         */
    public function create()
    {
        $categories = Category::select('id', 'name')->where('id', '<',5)->get();
        return view('Pages.movie-form', compact('categories'));
    }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'star_rating'=>'required|integer|min:1|max:5',
        'director'=>'required',
        'date_published'=>'required|date',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);


    if($request->hasFile('photo')){
        $file = $request->file('photo');
        $filename = time().'.'.$file->getClientOriginalExtension();
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

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            $data = Movie::findOrFail($id);
            $categories = Category::select('id', 'name')->get();
            return view('Pages.movie-form', compact('data', 'categories'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            $data = Movie::findOrFail($id);
            $path = $data->photo;

            if($request->hasFile('photo')){
                $file = $request->file('photo');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $path = $file->storeAs('movies', $filename, 'public');
            }

            $request->validate([
                'title' => 'required',
                'star_rating'=>'required|integer|min:1|max:5',
                'director'=>'required',
                'date_published'=>'required|date',
                'photo' => 'nullable|image|mimes:jpg,jpeg,png'
            ]);

            $data->update([
                'title' => $request->title,
                'description' => $request->description,
                'star_rating' => $request->star_rating,
                'director' => $request->director,
                'date_published' => $request->date_published,
                'category_id' => $request->category_id,
                'photo'=> $path ?? null,




            ]);
            return redirect()->route('movies.index')->with('success', 'Movie sucessfully updated');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
        $data = Movie::findOrFail($id);
        $data ->delete();
            return redirect()->route('movies.index')
                        ->with('success', 'Movie deleted successfully!');

        }
    }
