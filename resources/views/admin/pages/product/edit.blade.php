@extends('admin.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Edit Product
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.products.update' , $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @include('admin.partials.messages')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $product->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="" cols="20" rows="20" class="form-control" id="description">{{ $product->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}">
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" value="{{ $product->quantity }}">
                        </div>


                        <div class="form-group">
                            <label for="product_image">Product Image</label>

                            <div class="row">
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]">
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- main-panel ends -->
@endsection
