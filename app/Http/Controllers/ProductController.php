<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\ProductService;

/**
 * Product Controller
 *
 * @package App\Http\Controllers
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
final class ProductController extends Controller
{
    /**
     * Init controller with service
     *
     * @param ProductService $productService
     */
    public function __construct(private ProductService $productService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', ['products' => $this->productService->listProducts()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $productImg = null;

        if ($request->hasFile('productImage')) {
            $productImg = $request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->move(public_path('products'), $productImg);
        }

        $productName  = strip_tags($request->productName);
        $productPrice = filter_var($request->productPrice, FILTER_VALIDATE_FLOAT);
        $productDescription = strip_tags($request->productDescription);

        $result = $this->productService->createProduct([
            'name'        => $productName,
            'price'       => $productPrice,
            'description' => $productDescription,
            'img_path'    => $productImg
        ]);

        return to_route('product.index')->with(array_key_first($result), array_values($result)[0]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('products.show', ['product' => $this->productService->findProduct($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit', ['product' => $this->productService->findProduct($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $productId)
    {
        $productImg = null;

        if ($request->hasFile('productImage')) {
            $productImg = $request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->move(public_path('products'), $productImg);
        }

        $productName  = strip_tags($request->productName);
        $productPrice = filter_var($request->productPrice, FILTER_VALIDATE_FLOAT);
        $productDescription = strip_tags($request->productDescription);

        $result = $this->productService->updateProduct($productId, [
            'name'        => $productName,
            'price'       => $productPrice,
            'description' => $productDescription,
            'img_path'    => $productImg
        ]);

        return to_route('product.index')->with(array_key_first($result), array_values($result)[0]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->productService->deleteProduct($id);
        return to_route('product.index')->with(array_key_first($result), array_values($result)[0]);
    }
}
