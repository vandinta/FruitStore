@extends('home.layouts.template')

@section('content')

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 text-center">
        <div class="breadcrumb-text">
          <p>Fresh and Organic</p>
          <h1>Cart</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-12">
        <div class="cart-table-wrap">
          <table id="add-row" class="table table-striped">
            <thead>
              <tr>
                <th style="width: 20px; text-align: center;">No</th>
                <th style="text-align: center;">Image</th>
                <th style="text-align: center;">Name</th>
                <th style="text-align: center;">Price</th>
                <th style="text-align: center;">Qty</th>
                <th style="text-align: center;">Total</th>
                <th style="width: 155px; text-align: center;">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($cart as $cr)
              <tr>
                <td style="text-align: center;">{{ $no++ }}</td>
                <td style="text-align: center;"><img src="{{ $cr->img }}" class="product" style="height: 80px; width: 80px;"></td>
                <td style="text-align: center;">{{ $cr->product_name }}</td>
                <td style="text-align: center;">Rp. {{ $cr->price }} ,-</td>
                <td style="text-align: center;">{{ $cr->qty }}</td>
                <td style="text-align: center;">Rp. {{ $cr->total_price }} ,-</td>
                <td style="text-align: center;">
                  <form action="{{ route('cart.destroy',$cr->id) }}" method="POST">
                    <a href="{{ route('cart.edit',$cr->id) }}"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Ubah">
                        <i class="fa-solid fa-pencil" style="color: white;"></i>
                      </button></a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
                      <i class="fa-solid fa-trash" style="color: white;"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="total-section">
          <table class="total-table">
            <thead class="total-table-head">
              <tr class="table-total-row">
                <th>Total</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
              <tr class="total-data">
                <td><strong>Subtotal: </strong></td>
                <td>Rp. {{ $subtotal }} ,-</td>
              </tr>
              <tr class="total-data">
                <td><strong>Administrative Costs: </strong></td>
                <td>Rp. {{ $adm }} ,-</td>
              </tr>
              <tr class="total-data">
                <td><strong>Total: </strong></td>
                <td>Rp. {{ $total }} ,-</td>
              </tr>
            </tbody>
          </table>
          <div class="cart-buttons">
            <a href="checkout.html" class="boxed-btn black">Check Out</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- end cart -->

@endsection

@section('content_js')

@endsection

