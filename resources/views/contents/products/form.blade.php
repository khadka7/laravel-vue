@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Product</div>
                    <div class="card-body">
                        <form action="{{route('vl_product_add')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price">
                            </div>

                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock">
                            </div>


                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input type="number" class="form-control" id="discount" name="discount">
                            </div>

                            <div class="form-group">
                                <label for="details">Details</label>
                                <textarea name="details" id="" cols="30" rows="10" class="form-control"></textarea>
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
