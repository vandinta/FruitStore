@extends('home.layouts.template')

@section('content_head')

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-qsGN92Rh94gid13G"></script>

@endsection


@section('content')

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 text-center">
        <div class="breadcrumb-text">
          <p>Fresh and Organic</p>
          <h1>Detail Order</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
  <div class="container">
    <div class="col-lg-12">
      <div class="checkout-accordion-wrap">
        <div class="accordion" id="accordionExample">
          <div class="card single-accordion">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  User Information
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <div class="billing-address-form">
                  <form>
                    <p><input type="text" value="{{ auth()->user()->username }}" readonly></p>
                    <p><input type="text" value="{{ auth()->user()->email }}" readonly></p>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="card single-accordion">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Item List
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <div class="shipping-address-form">
                  <table id="add-row" class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 20px; text-align: center;">No</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Price</th>
                        <th style="text-align: center;">Qty</th>
                        <th style="text-align: center;">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($listitems as $oi)
                      <tr>
                        <td style="text-align: center;">{{ $no++ }}</td>
                        <td style="text-align: center;">{{ $oi->product_name }}</td>
                        <td style="text-align: center;">Rp. {{ $oi->price }} ,-</td>
                        <td style="text-align: center;">{{ $oi->qty }}</td>
                        <td style="text-align: center;">Rp. {{ $oi->subtotal_price }} ,-</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="card single-accordion">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Price Details
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <div class="shipping-address-form">
                  <table class="total-table">
                    <thead class="total-table-head">
                      <tr class="table-total-row">
                        <th>Total</th>
                        <th>Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="total-data">
                        <td><strong>Sub Total: </strong></td>
                        <td>Rp. {{ $order->sub_price }} ,-</td>
                      </tr>
                      <tr class="total-data">
                        <td><strong>Administrative Costs: </strong></td>
                        <td>Rp. {{ $order->admin_price }} ,-</td>
                      </tr>
                      <tr class="total-data">
                        <td><strong>Total: </strong></td>
                        <td>Rp. {{ $order->total_price }} ,-</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="btn btn-outline-primary float-right" id="pay-button" style="margin-top: 20px; font-size: 26px; width: 85px;">Pay!</button>
    </div>
  </div>
</div>
<!-- end check out section -->

@endsection


@section('content_js')

<script type="text/javascript">
  // For example trigger on button clicked, or any time you need
  var payButton = document.getElementById('pay-button');
  payButton.addEventListener('click', function() {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{ $snapToken }}', {
      onSuccess: function(result) {
        /* You may add your own implementation here */
        alert("payment success!");
        console.log(result);
      },
      onPending: function(result) {
        /* You may add your own implementation here */
        alert("wating your payment!");
        console.log(result);
      },
      onError: function(result) {
        /* You may add your own implementation here */
        alert("payment failed!");
        console.log(result);
      },
      onClose: function() {
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
        window.location.replace('http://127.0.0.1:8000/shop');
      }
    })
  });
</script>

@endsection