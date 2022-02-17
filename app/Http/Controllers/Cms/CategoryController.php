<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use Session;

class CategoryController extends Controller
{
	public function index()
    {
    	$categories = Category::all();
    	return view('backend.category.index', compact('categories'));
    }

    public function create()
    {
    	return view('backend.category.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $category = Category::create([
            'name' => $request->name,
        ]);

        Session::flash('success', 'Category Created Successfully !');
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
    	$category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        Session::flash('info', 'Category updated successfully.');
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Session::flash('error', 'Category Deleted Successfully !');
        return redirect()->route('category.index');
    }
}
