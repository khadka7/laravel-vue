<?php
/**
 * Created by PhpStorm.
 * User: khadka
 * Date: 6/25/18
 * Time: 1:08 PM
 */

namespace App\Admin\Product\Controllers;


use App\Http\Controllers\Controller;
use App\Model\Product;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{

    public function index(){
        $data['products'] = Product::all();
        return view('contents.products.index',$data);
    }

    public function form(){
        return view('contents.products.form');
    }

    public function create(Request $request){
        $data = $request->all();
//        $product = new Product();
//        $product->name = $data['name'];
//        $product->details = $data['details'];
//        $product->sta
        try{
            Product::create($data);
            return redirect()->route('vl_products')->with('success','Product Created');
        }catch (\Throwable $exception){
            return redirect()->route('vl_products')->with('error',$exception->getMessage());
        }

    }

}