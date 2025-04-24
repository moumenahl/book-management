<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.list' , compact('categories'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

     return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::with('books')->findOrFail($id);
            return view('categories.show', compact('category'));  
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category =Category::FindorFail($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
    public function trash(){
        $categories = Category::onlyTrashed()->get();
        return view('categories.trash', compact('categories'));
    }
    public function restore($id){
        $categories = Category::withTrashed()->findOrFail($id);
        $categories->restore();

        return redirect()->route('categories.trash')->with('success', 'Category restored successfully.');
    }
    public function forceDelete($id){
        $category = Category::withTrashed()->findOrFail($id);
        $category->forceDelete();

        return redirect()->route('categories.trash')->with('success', 'category deleted permanently.');
    }
}
