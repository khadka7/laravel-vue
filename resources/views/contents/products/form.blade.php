@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$product ? 'Edit' : 'Add' }} Product</div>
                    <div class="card-body">
                        <form action="{{$product ? route('vl_product_update',$product->id) : route('vl_product_add')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{$product ? $product->name : old('name')}}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                            </div>


                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="image">Image</label>
                                @if($product)
                                    <br>
                                    <img src="{{asset('storage/'.$product->image_path)}}" alt="" style="height: 40px; width: auto">
                                @endif
                                <input type="file" class="form-control" id="image" name="image"
                                       value="{{ old('image') }}">
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price"
                                       value="{{$product ? $product->price : old('price')}}">
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                         </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock"
                                       value="{{$product ? $product->stock : old('stock')}}">

                            @if ($errors->has('stock'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('stock') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                                <label for="discount">Discount</label>
                                <input type="number" class="form-control" id="discount" name="discount"
                                       value="{{$product ? $product->discount : old('discount')}}">

                            @if ($errors->has('discount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('discount') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                <label for="details">Details</label>
                                <textarea name="details" id="" cols="30" rows="10" class="form-control">{{$product ? $product->details : old('details')}}</textarea>
                                    @if ($errors->has('details'))
                                        <span class="help-block">
                                             <strong>{{ $errors->first('details') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
