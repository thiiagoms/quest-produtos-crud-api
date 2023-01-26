<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

final class ProductApiController extends Controller
{
    /**
     * Init api Controller with service
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
        return response()->json($this->productService->listProducts(null), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productImg = null;

        if ($request->hasFile('productImage')) {
            $productImg = $request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->move(public_path('products'), $productImg);
        }

        if (is_null($productImg)) {
            $productImg = 'no_image.png';
        }

        $productName  = strip_tags($request->name);
        $productPrice = filter_var($request->price, FILTER_VALIDATE_FLOAT);
        $productDescription = strip_tags($request->description);

        $result = $this->productService->createProduct([
            'name'        => $productName,
            'price'       => $productPrice,
            'description' => $productDescription,
            'img_path'    => $productImg
        ]);

        return response()->json($result, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->productService->findProduct($id);

        return !is_null($result)
            ? response()->json($result, 200)
            : response()->json(['message' => "Produto não encontrado"], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $productId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
        $productImg = null;

        if ($request->hasFile('productImage')) {
            $productImg = $request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->move(public_path('products'), $productImg);
        }

        if (is_null($productImg)) {
            $productImg = 'no_image.png';
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

        return response()->json($result, 200);
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
        return response()->json($result, 204);
    }
}
