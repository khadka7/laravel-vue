<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Model\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ProductController extends Controller
{

    public function __construct(){
        $this->middleware('auth:api')->except('index','show');
    }

    /**
     * @SWG\Get(
     *   path="/products",
     *   summary="List Products",
     *   tags={"Products"},
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error")
     * )
     *
     */
    public function index()
    {
        $products = Product::latest()->paginate(9);
        $response = ProductCollection::collection($products);
        return $response;

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
     * @param ProductRequest $request
     * @return JsonResponse
     * @SWG\Post(
     *     consumes={"multipart/form-data"},
     *     path="/products",
     *     produces={"application/json"},
     *     tags={"Products"},
     * @SWG\Parameter(name="Authorization", in="header", required=true, type="string", default="Bearer TOKEN", description="Authorization" ),
     * @SWG\Parameter(name="name",in="formData",description="Name",type="string"),
     * @SWG\Parameter(name="details",in="formData",description="Details",type="string"),
     * @SWG\Parameter(name="price",in="formData",description="Price",type="integer"),
     * @SWG\Parameter(name="stock",in="formData",description="Stock",type="integer"),
     * @SWG\Parameter(name="discount",in="formData",description="Discount",type="integer"),
     * @SWG\Response(
     *     response=200,
     *     description="Product Create",
     * )
     * )
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $product = new Product([
            'name'=>$data['name'],
            'details'=>$data['details'],
            'price'=>$data['price'],
            'stock'=>$data['stock'],
            'discount'=>$data['discount']
        ]);
        $product->save();
        if($product){
            return response([
                'data' => new ProductResource($product)
            ],Response::HTTP_CREATED);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return JsonResponse
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        $update = $product->update($data);

        if($update){
            return new JsonResponse([
                'data' => new ProductResource($product)
            ]);
        }

    }

    /**
     * @param Product $product
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $delete = $product->delete();
        if($delete){
            return new JsonResponse([
                'data'=>'Data Deleted',
            ]);
        }
    }
}
