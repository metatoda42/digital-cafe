<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = \App\Models\Product::paginate(3);

        return view('viewproducts', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'count' => 'required|integer',
            'price' => 'required|integer',
            'media' => 'required|mimes:jpg,jpeg,png|max:5048',
        ]);
        $newImageName = time() . '-' . $request->name . '.' . $request->media->extension();

        $request->media->move(public_path('images'), $newImageName);

        $product=\App\Models\Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'count' => $request->input('count'),
            'price' => $request->input('price'),
            'media' => $newImageName,
        ]);
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = \App\Models\Product::find($id);
        return view('productdetail')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = \App\Models\Product::find($id)->first();

        return view('editproduct')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = \App\Models\Product::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'count' => $request->input('count'),
                'price' => $request->input('price'),
            ]);

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Models\Product $product)
    {
        $product->delete();

        return redirect('/products');
    }
}
