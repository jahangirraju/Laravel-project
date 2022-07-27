@extends('layouts.master')

@section('title')
    {{ $product->title }} | Laravel Ecommerce site
@endsection

@section('content')
    <div class="container margin-top">
        <div class="row">
            <div class="col-md-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($product->images as $image)
                            <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                                <img class="d-block w-100" src="{!! asset('images/products/' . $image->image) !!}" alt="First slide">
                            </div>
                            @php $i++; @endphp
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


            </div>
            <div class="col-md-8">
                <div class="widget">
                    <h3>{{ $product->title }}</h3>
                    <h3>{{ $product->price }} Taka 
                      <span class="btn btn-success">
                            {{ $product->quantity < 1 ? 'No iteam is available' : $product->quantity . ' iteam in stock'}}
                      </span>
                    </h3>
                    <hr>
                    <div>
                        <h3>{!! $product->description !!}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
