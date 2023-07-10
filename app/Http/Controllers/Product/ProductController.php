<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function products_index()
    {
        $products = Product::all();
        return view('back.pages.products.index', compact('products'));
    }

    public function create()
    {
        return view('back.pages.products.create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'prix' => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {
            //$imageName = $request->image->store('posts');
            $imageName = $request->image->store('produits');
            $image = Image::make(public_path("storage/{$imageName}"))->fit(1200, 853);
            $image->save();
        }

        Product::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'stock' => $request->stock,
            'prix' => $request->prix,
            'image' => $imageName
        ]);

        return redirect()->route('products.index')->with('success', 'Le produit a été ajouté avec succès.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('back.pages.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->firstOrFail();

        $arrayUpdate = [
            'nom' => $request->nom,
            'description' => $request->description,
            'stock' => $request->stock,
            'prix' => $request->prix

        ];

        if ($request->hasFile('image')) {

            if ($product->image != null) {
                Storage::delete($product->image);
            }

            //$imageName = $request->image->store('posts');
            $imageName = $request->image->store('produits');
            $image = Image::make(public_path("storage/{$imageName}"))->fit(1200, 853);
            $image->save();

            $arrayUpdate = array_merge($arrayUpdate, [
                'image' => $imageName
            ]);
        }

        $product->update($arrayUpdate);

        return redirect()->route('products.index')->with('success', 'Le produit a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        
        $product = Product::findOrFail($id);

        if ($product->image != null) {
            Storage::delete($product->image);
        }
        
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Le produit a été supprimé avec succès.');
    }
}
