<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Country;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Book::with('country')->get();
        return view('Pages.page2',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $countries = Country::select('id', 'name')
            ->get();

        return view('Pages.book-form', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $request->validate([
        'title' => 'required',
        'stocks'=>'required|integer|min:1|max:50',
        'amount' => 'required|numeric|min:0.01|max:1000',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('books', $filename, 'public');
        }

            Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'country_id' => $request->country_id,
            'stocks' => $request->stocks,
            'amount' => $request->amount,
            'photo' => $path ?? null,

        ]);
        return redirect()->route('books.index')->with('success', 'Book sucessfully created');
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
        $data = Book::findOrFail($id);
        $countries = Country::select('id', 'name')->get();

        return view('Pages.book-form', compact('data', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Book::findOrFail($id);
            $path = $data->photo;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('books', $filename, 'public');
        }
        $request->validate([
        'title' => 'required',
        'stocks'=>'required|integer|min:1|max:50',
        'amount' => 'required|numeric|min:0.01|max:1000',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

          $data->update([
            'title' => $request->title,
            'description' => $request->description,
            'country_id' => $request->country_id,
            'stocks' => $request->stocks,
            'amount' => $request->amount,
            'photo'=> $path ?? null,

        ]);
        return redirect()->route('books.index')->with('success', 'Book sucessfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy($id)
{
    $book = Book::findOrFail($id);
    $book->delete();
    return redirect()->route('books.index')
        ->with('success', 'Book deleted successfully');
}
}
