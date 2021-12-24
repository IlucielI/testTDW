<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.add', ['title' => 'Add Product']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:products|min:3',
            'price' => ['required', 'min:4'],
            'image' => ['image','file' ,'max:6250'],
        ]);

        if($request->file('image')){
            $filename = bin2hex(random_bytes(5)).'-'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img'), $filename);
            $validatedData['image'] = $filename;
        }

        Product::create($validatedData);
        return redirect('/admin/products')->with('message', 'Add Product Success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('backend.products.detail', ['title' => 'Detail Product', 'product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $product = Product::where('id', $id)->first();
         return view('backend.products.edit', ['title' => 'Edit Product', 'product' => $product]);
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
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'price' => ['required', 'min:4'],
            'image' => ['image','file' ,'max:6250'],
        ]);
        if($request->file('image')){
            $product = Product::where('id', $request->id)->first();
            if($product->image != null){
                unlink(public_path('img/'. $product->image));
            }
            $filename = bin2hex(random_bytes(5)).'-'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img'), $filename);
            $validatedData['image'] = $filename;
        }
        Product::where('id', $id)->update($validatedData);
        return redirect('/admin/products')->with('message', 'Product has been Update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        if($product->image != null){
            unlink(public_path('img/'. $product->image));
        }
        Product::destroy($request->id);
        return redirect('/admin/products')->with('message', 'Product has been Delete.');
    }
}
