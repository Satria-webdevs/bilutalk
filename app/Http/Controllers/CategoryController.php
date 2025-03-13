<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:50',
        ]);

        Category::create([
            'description'   => $request->description,
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('categories.index')->with(['success' => 'Data berhasil di simpan']);
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // Validate form input
        $request->validate([
            'category_name' => 'required|string|max:50',
        ]);

        // Get category data by ID
        $category = Category::findOrFail($id);

        // Update category data
        $category->update([
            'category_name' => $request->category_name,
            'description'   => $request->description, // You can also update the description
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy(string $id): RedirectResponse
    {
        // Find the category by ID
        $category = Category::findOrFail($id);

        // Delete the category
        $category->delete();

        // Redirect to index page with a success message
        return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
