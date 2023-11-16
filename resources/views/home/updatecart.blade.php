@extends('home.layouts.template')

@section('content')

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 text-center">
        <div class="breadcrumb-text">
          <p>Fresh and Organic</p>
          <h1>Update Value Cart</h1>
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
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <form action="{{ route('cart.update', $cart->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
              <div class="form-group">
                <label for="product_name">Name</label>
                <input type="text" class="form-control" style="width: 1080px;" value="{{ $cart->product_name }}" readonly>
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" style="width: 1080px;" id="price" value="{{ $cart->price }}" readonly>
              </div>
              <div class="form-group">
                <label for="qty">QTY</label>
                <input type="number" class="form-control" style="width: 1080px;" id="qty" name="qty" onchange="Hitung(this);" value="{{ $cart->qty }}">
              </div>
              <div class="form-group">
                <label for="total">Total</label>
                <input type="number" class="form-control" style="width: 1080px;" id="total" name="total" value="{{ $cart->total_price }}" readonly>
                <input type="hidden" id="total_price" name="total_price[]">
              </div>
            </div>
            <div class="modal-footer">
              <a href="{{ route('cart.index') }}" type="button" class="btn btn-secondary btn-round ml-2">kembali</a>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end cart -->

@endsection

@section('content_js')

<script>
  function Hitung(v) {
    var harga = $('#price').val();
    var jumlah = $("#qty").val();

    var total = harga * jumlah;

    $('#total').val(total);
    $('#total_price').val(total);
  }
</script>

@endsection