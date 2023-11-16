@extends('home.layouts.template')

@section('content')

<!-- home page slider -->
<div class="homepage-slider">
  <!-- single home slider -->
  <div class="single-homepage-slider homepage-bg-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
          <div class="hero-text">
            <div class="hero-text-tablecell">
              <p class="subtitle">Fresh & Organic</p>
              <h1>Delicious Seasonal Fruits</h1>
              <div class="hero-btns">
                <a href="{{ route('shop') }}" class="boxed-btn">Fruit Collection</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- single home slider -->
  <div class="single-homepage-slider homepage-bg-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1 text-center">
          <div class="hero-text">
            <div class="hero-text-tablecell">
              <p class="subtitle">Fresh Everyday</p>
              <h1>100% Organic Collection</h1>
              <div class="hero-btns">
                <a href="{{ route('shop') }}" class="boxed-btn">Visit Shop</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- single home slider -->
  <div class="single-homepage-slider homepage-bg-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1 text-right">
          <div class="hero-text">
            <div class="hero-text-tablecell">
              <p class="subtitle">Mega Sale Going On!</p>
              <h1>Get December Discount</h1>
              <div class="hero-btns">
                <a href="{{ route('shop') }}" class="boxed-btn">Visit Shop</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end home page slider -->

<!-- product section -->
<div class="product-section mt-150 mb-150">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 text-center">
        <div class="section-title">
          <h3><span class="orange-text">Our</span> Products</h3>
        </div>
      </div>
    </div>

    <div class="row">
      @foreach($product as $pr)
      <div class="col-lg-4 col-md-6 text-center">
        <div class="single-product-item">
          <div class="product-image">
            <a href="single-product.html"><img src="{{ $pr->img }}" alt=""></a>
          </div>
          <h3>{{ $pr->product_name }}</h3>
          <p class="product-price"><span>Per Kg</span> Rp. {{ $pr->price }} ,- </p>
          <a href="{{ route('addcart.edit',$pr->id) }}"><button type="button" class="btn btn btn-outline-success" <?php if ($pr->stok == 0) {
            echo 'disabled';
          } ?>><i class="fas fa-shopping-cart"></i> Add to Cart</button></a>
          
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- end product section -->

@endsection