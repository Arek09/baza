<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
      
        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
        ]);

        $item = new Item();
        $item->name = $validatedData['name'];
        $item->quantity = $validatedData['quantity'];

        if ($request->filled('new_category')) {
            $category = new Category();
            $category->name = $request->input('new_category');
            $category->save();
            $item->category_id = $category->id;
        } elseif ($request->filled('category')) {
            $item->category_id = $request->input('category');
        }

        $item->save();

        return redirect()->route('items.index')
            ->with('success', 'Item created successfully.');
    }
}