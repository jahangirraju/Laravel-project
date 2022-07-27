@extends('admin.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Add Product
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @include('admin.partials.messages')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="" cols="20" rows="20" class="form-control" id="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" id="price">
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="quantity">
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

                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- main-panel ends -->
@endsection
