@extends('home.layouts.template')

@section('content')

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 text-center">
        <div class="breadcrumb-text">
          <p>Fresh and Organic</p>
          <h1>Check Out Product</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="checkout-accordion-wrap">
          <div class="card" style="width: 1100px;">
            <form action="{{ route('order') }}" method="post">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" style="width: 1069px;" id="name" name="name" value="{{ $data->username }}" readonly>
                </div>
                <div class="form-group">
                  <label for="sub_price">Sub Price</label>
                  <input type="text" class="form-control" style="width: 1069px;" id="sub_price" name="sub_price" value="{{ $subtotal }}" readonly>
                </div>
                <div class="form-group">
                  <label for="admin_price">Administrative Costs</label>
                  <input type="text" class="form-control" style="width: 1069px;" id="admin_price" name="admin_price" value="{{ $adm }}" readonly>
                </div>
                <div class="form-group">
                  <label for="total_price">Total Price</label>
                  <input type="text" class="form-control" style="width: 1069px;" id="total_price" name="total_price" value="{{ $total }}" readonly>
                </div>
              </div>
              <div class="modal-footer">
                <a href="{{ route('cart.index') }}" type="button" class="btn btn-secondary btn-round ml-2">kembali</a>
                <button type="submit" class="btn btn-primary">Order</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end check out section -->

@endsection

@section('content_js')

@endsection