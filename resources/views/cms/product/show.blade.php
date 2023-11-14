@extends('cms.layouts.template')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Detail Data Produk</h4>
        <div class="ml-auto">
        </div>
        <a href="{{ route('product.index') }}" type="button" class="btn btn-primary btn-round ml-2">Kembali</a>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Nama Produk :</strong>
              {{ $product->product_name }}
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Foto Produk :</strong>
              <img src="{{ $product->img }}" style="height: 140px; width: 140px;">
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Harga :</strong>
              {{ $product->price }}
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Stok :</strong>
              {{ $product->stok }}
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Status :</strong>
              <?php
              if ($product->status == 'aktif') {
                echo '<button type="button" class="btn btn-success btn-rounded btn-fw" disabled>Aktif</button>';
              } else {
                echo '<button type="button" class="btn btn-warning btn-rounded btn-fw" disabled>Non-Aktif</button>';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection