<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('product.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $productRequest)
    {
        $data = $productRequest->validated();
        if ($productRequest->hasFile('Image')){
            $image = $productRequest->file('Image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('images', $imageName, 'public');
            $data['Image'] = $imageName;
        }
        Product::create($data);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $updatedProducts = $request->products;
        foreach ($updatedProducts as $updatedProduct) {
            $product = Product::find($updatedProduct['id']);
            if ($product) {
                $product->Number = $updatedProduct['number'];
                $product->save();
            }
        }
        return response()->json(['message' => 'تعدادها با موفقیت به‌روزرسانی شدند.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }



}
