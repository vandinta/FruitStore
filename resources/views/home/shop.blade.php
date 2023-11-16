@extends('home.layouts.template')

@section('content')

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 text-center">
        <div class="breadcrumb-text">
          <p>Fresh and Organic</p>
          <h1>Shop</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
  <div class="container">
    <div class="row product-lists">
      @foreach($product as $pr)
      <div class="col-lg-4 col-md-6 text-center">
        <div class="single-product-item">
          <div class="product-image">
            <a href="single-product.html"><img src="{{ $pr->img }}" alt=""></a>
          </div>
          <h3>{{ $pr->product_name }}</h3>
          <p class="product-price"><span>Per Kg</span> Rp. {{ $pr->price }} ,-</p>
          <a href="{{ route('addcart.edit',$pr->id) }}"><button type="button" class="btn btn btn-outline-success" <?php if ($pr->stok == 0) {
                                                                                                                echo 'disabled';
                                                                                                              } ?>><i class="fas fa-shopping-cart"> Add to Cart</button></i></a>

        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- end products -->

@endsection