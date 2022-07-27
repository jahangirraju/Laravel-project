@extends('layouts.master')

@section('content')
<div class="container margin-top">
    <div class="row">
        <div class="col-md-4">

            @include('partials.product-sidebar')

        </div>
        <div class="col-md-8">
            <div class="widghet">
                <h3>Searched Product</h3>
                @include('pages.product.partials.all_products')
            </div>
        </div>
    </div>
</div>

@endsection