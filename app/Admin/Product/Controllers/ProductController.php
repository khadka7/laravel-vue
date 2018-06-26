<?php
/**
 * Created by PhpStorm.
 * User: khadka
 * Date: 6/25/18
 * Time: 1:08 PM
 */

namespace App\Admin\Product\Controllers;


use App\Admin\Product\Requests\CreateProductRequest;
use App\Admin\Product\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Model\Product;

class ProductController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $data['products'] = Product::all();
        return view('contents.products.index',$data);
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form($id = null){
        $data['product'] = null;
        if($id){
            $data['product'] = Product::findOrFail($id);
        }
        return view('contents.products.form',$data);
    }

    /**
     * @param CreateProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CreateProductRequest $request){
        $data = $request->all();
        $image = $request->file('image');
        if($image){
            $fileName = time() . "_" . str_random(5) . "_" . $image->hashName();
            $image->storeAs('public/product/',$fileName);
            $data['image'] = $fileName;
            $data['image_path'] = 'product/'.$fileName;
        }
        try{
            Product::create($data);
            return redirect()->route('vl_products')->with('success','Product Created');
        }catch (\Throwable $exception){
            return redirect()->route('vl_products')->with('error',$exception->getMessage());
        }

    }

    /**
     * @param UpdateProductRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductRequest $request,$id){
        $product = Product::findOrFail($id);
        $data = $request->all();
        $image = $request->file('image');
        if($image){
            $fileName = time() . "_" . str_random(5) . "_" . $image->hashName();
            $image->storeAs('public/product/',$fileName);
            $data['image'] = $fileName;
            $data['image_path'] = 'product/'.$fileName;
        }
        try{
            $product->update($data);
            return redirect()->route('vl_products')->with('success','Product Updated');
        }catch (\Throwable $exception){
            return redirect()->route('vl_products')->with('error',$exception->getMessage());
        }
    }

    public function delete($id){
        $product = Product::findOrFail($id);
        try{
            $product->delete();
            return redirect()->route('vl_products')->with('success','Product Deleted');
        }catch (\Throwable $exception){
            return redirect()->route('vl_products')->with('error',$exception->getMessage());
        }
    }
}