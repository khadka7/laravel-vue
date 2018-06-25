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