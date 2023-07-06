<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function produits_index()
    {
        $products = Product::all();
        return view('back.pages.products.create', compact('products'));
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

        // Création d'un nouveau produit
        $product = new Product;
        $product->nom = $validatedData['nom'];
        $product->description = $validatedData['description'];
        $product->stock = $validatedData['stock'];
        $product->prix = $validatedData['prix'];
        // Enregistrement de l'image si nécessaire
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $product->image = $imagePath;
        }
        $product->save();

        return redirect()->route('product.index')->with('success', 'Le produit a été ajouté avec succès.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'prix' => 'required|numeric',
        ]);

        // Mise à jour du produit
        $product = Product::findOrFail($id);
        $product->nom = $validatedData['nom'];
        $product->description = $validatedData['description'];
        $product->stock = $validatedData['stock'];
        $product->prix = $validatedData['prix'];
        // Mise à jour de l'image si nécessaire
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $product->image = $imagePath;
        }
        $product->save();

        return redirect()->route('product.index')->with('success', 'Le produit a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Le produit a été supprimé avec succès.');
    }
}
