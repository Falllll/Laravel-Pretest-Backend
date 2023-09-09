<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return response()->json([
            'data' => ProductResource::collection($products),
            'message' => 'Fetch all product$products',
            'success' => true
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:155',
            'user_id' => 'required',
            'toko_id' => 'required',
            'description' => 'required',
            'qty' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'message' => $validator->errors(),
                'success' => false
            ]);
        }

        $product = Product::create([
            'nama' => $request->get('nama'),
            'user_id' => $request->get('user_id'),
            'toko_id' => $request->get('toko_id'),
            'description' => $request->get('description'),
            'qty' => $request->get('qty'),
            'price' => $request->get('price'),
        ]);

        return response()->json([
            'data' => new ProductResource($product),
            'message' => 'Product created successfully.',
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json([
            'data' => new ProductResource($product),
            'message' => 'Data product$product found',
            'success' => true
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:155',
            'description' => 'required',
            'qty' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'message' => $validator->errors(),
                'success' => false
            ]);
        }

        $product->update([
            'nama' => $request->get('nama'),
            'description' => $request->get('description'),
            'qty' => $request->get('qty'),
            'price' => $request->get('price'),
        ]);

        return response()->json([
            'data' => new ProductResource($product),
            'message' => 'Product updated successfully',
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'data' => [],
            'message' => 'Product deleted successfully',
            'success' => true
        ]);
    }
}
