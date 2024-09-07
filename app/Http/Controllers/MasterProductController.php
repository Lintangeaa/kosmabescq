<?php

namespace App\Http\Controllers;

use App\Models\MasterProduct;
use App\Models\MasterProductImage;
use Illuminate\Http\Request;

class MasterProductController extends Controller
{
    public function create()
    {
        return view('master-product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'room' => 'required|numeric',
            'location' => 'required',
            'category' => 'required',
            'facilities' => 'nullable',
            'terms_conditions' => 'nullable',
            'surrounding_places' => 'nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $slug = strtolower(str_replace(' ', '-', $request->input('name'))); // Slug transformation

        $product = MasterProduct::create([
            'name' => $request->name,
            'slug' => $slug,
            'price' => $request->price,
            'room' => $request->room,
            'location' => $request->location,
            'category' => $request->category,
            'facilities' => $request->facilities,
            'terms_conditions' => $request->terms_conditions,
            'surrounding_places' => $request->surrounding_places,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('public/images');
                $product->images()->create(['image_path' => $imagePath]);
            }
        }

        return redirect()->route('master-product.index')->with('success', 'Product created successfully');
    }

    public function index()
    {
        $products = MasterProduct::with('images')->get();
        return view('master-product.index', compact('products'));
    }

    public function show($id)
    {
        $product = MasterProduct::with('images')->findOrFail($id);
        return view('master-product.show', compact('product'));
    }
}
