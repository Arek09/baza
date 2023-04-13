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
        return view('add_item', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'quantity' => 'required|integer',
            'category_id' => 'nullable|integer',
            'new_category' => 'nullable|string|max:255',
        ]);
    
        if ($validatedData['category_id']) {
            // wybrano istniejącą kategorię z listy
            $category_id = $validatedData['category_id'];
        } else {
            // dodajemy nową kategorię do bazy danych
            $new_category = new Category;
            $new_category->name = $validatedData['new_category'];
            $new_category->save();
            $category_id = $new_category->id;
        }
    
        // tworzymy nowy przedmiot i przypisujemy mu kategorię
        $item = new Item;
        $item->name = $validatedData['name'];
        $item->quantity = $validatedData['quantity'];
        $item->category_id = $category_id;
        $item->save();

        return redirect()->route('start')
            ->with('success', 'Item created successfully.');
    }
    public function show() {
        $data = Item::with('category')->get();
        // $categories = $data[0]->category;
        $categories = Category::all();
        return view('home',compact('data','categories'));
    }
    public function delete($id) {
        
        $record = Item::findOrFail($id);
        $record->delete();

        return redirect()->back()->with('success', 'Rekord został usunięty.');
    }
    public function update(Request $request, $id) {
          // Pobierz przedmiot do edycji
    $item = Item::findOrFail($id);

    // Walidacja danych wejściowych
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'quantity' => 'required|integer|min:1',
        'category_id' => 'nullable|exists:categories,id',
        'new_category' => 'nullable|string|max:255',
    ]);

    // Aktualizacja przedmiotu
    $item->name = $validatedData['name'];
    $item->quantity = $validatedData['quantity'];

    // Dodaj nową kategorię, jeśli została wprowadzona w polu "Nowa kategoria"
    if (!empty($validatedData['new_category'])) {
        $category = new Category();
        $category->name = $validatedData['new_category'];
        $category->save();

        $item->category_id = $category->id;
    } else {
        // Aktualizuj kategorię przedmiotu, jeśli została wybrana z listy rozwijanej
        $item->category_id = $validatedData['category_id'];
    }

    $item->save();

    // Przekieruj na stronę z listą przedmiotów z komunikatem o sukcesie
    return redirect()->route('start')->with('success', 'Przedmiot został zaktualizowany.');

    }
}