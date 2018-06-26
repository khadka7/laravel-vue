@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Products
                        <a href="{{route('vl_product_form')}}" class="pull-right btn btn-primary">
                            Add Products
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->stock}}</td>
                                <td>
                                    <img src="{{asset('storage/'.$product->image_path)}}" alt="" style="height: 60px; width: auto">
                                </td>
                                <td>
                                    <a href="{{route('vl_product_edit',$product->id)}}">Edit</a>
                                    <a href="{{route('vl_product_delete',$product->id)}}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
