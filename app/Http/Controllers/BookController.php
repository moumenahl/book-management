<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            $books = Book::all();
            return view('books.list', ['books'=>$books]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        // dd($request->all());
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->category_id = $request->category_id;
        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book= Book::findOrFail($id);
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book=Book::findOrFail($id);
        $categories = Category::all();
        return view('books.edit',compact('book','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBookRequest $request, string $id)
    {
        $book=Book::findOrFail($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->category_id = $request->category_id;
        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book=Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index');
    }
    public function trash(){
        $books = Book::onlyTrashed()->get();
        return view('books.trash', compact('books'));
    }
    public function restore($id){
        $book = Book::withTrashed()->findOrFail($id);
        $book->restore();

        return redirect()->route('books.trash')->with('success', 'Book restored successfully.');
    }

    public function forceDelete($id){
        $book = Book::withTrashed()->findOrFail($id);
        $book->forceDelete();

        return redirect()->route('books.trash')->with('success', 'Book deleted permanently.');
    }

}
