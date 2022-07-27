<div class="row">
    @foreach ($products as $product)

    <div class="col-md-4">
        <div class="card">
            {{-- <!-- <img src="{{ asset('images/products/' . 'samsung.jpg')}}" class="card-img-top product-image" alt="..."> --> --}}

           @php $i = 1;@endphp
            @foreach ($product->images as $image)

                @if ($i > 0)
                <a href="{!!route('show', $product->slug ) !!}">
                    <img src="{{ asset('images/products/' . $image->image)}}" class="card-img-top product-image" alt="{{ $product->title }}">
                </a>
                    @endif
                
                @php $i--; @endphp

            @endforeach
            <div class="card-body">
                <h5 class="card-title">
                   <a href="{!!route('show', $product->slug ) !!}">{{ $product->title }}</a>
                </h5>
                <p class="card-text">
                    Taka - {{$product->price}}
                </p>
                <a href="#" class="btn btn-outline-warning">Add To Cart</a>
            </div>
        </div>
    </div>


    @endforeach
</div>

<div class="mt-4 pagination">
    {{ $products->links() }}
</div>