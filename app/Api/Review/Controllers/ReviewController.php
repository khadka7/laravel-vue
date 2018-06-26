<?php

namespace App\Api\Review\Controllers;



use App\Http\Controllers\Controller;
use App\Http\Resources\Review\ReviewCollection;
use App\Http\Resources\Review\ReviewResource;
use App\Model\Product;
use App\Model\Review;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Product $product)
    {
      $review = $product->reviews;
      $response = ReviewCollection::collection($review);
      if($response->isEmpty()){
          return null;
      }
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
     * @SWG\Post(
     *     consumes={"multipart/form-data"},
     *     path="/products/{product}/reviews",
     *     produces={"application/json"},
     *     summary="Create Review",
     *     tags={"Products"},
     * @SWG\Parameter(name="customer",in="formData",description="Customer Name",type="string"),
     * @SWG\Parameter(name="star",in="formData",description="Rating Rating",type="string"),
     * @SWG\Parameter(name="review",in="formData",description="Reveiw",type="string"),
     * @SWG\Parameter(name="product",in="path",description="Product Id",type="integer"),
     * @SWG\Response(
     *     response=200,
     *     description="Review Create Create",
     * )
     * )
     */
    /**
     * @param Request $request
     * @param $product
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function store(Request $request,$product)
    {
        $data = $request->all();
        $review = new Review([
            'customer'=>$data['customer'],
            'star'=>$data['star'],
            'product_id'=>$product,
            'review'=>$data['review'],
        ]);
        $review->save();
        try{
            return response([
                'data' => "ok"
            ],Response::HTTP_CREATED);
        }catch (\Throwable $exception){
            return response([
                'data' => $exception->getMessage()
            ]);
        }
    }

    /**
     * @param Review $review
     * @return ReviewResource
     */
    public function show(Review $review)
    {
       return new ReviewResource($review);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
