@extends('cms.layouts.template')

@section('content')

@if ($message = Session::get('berhasil'))
<div class="alert alert-success" role="alert">
  <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('gagal'))
<div class="alert alert-danger" role="alert">
  <p>{{ $message }}</p>
</div>
@endif
@if (count($errors) > 0)
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Tambah Data Produk</h4>
        <div class="ml-auto">
        </div>
        <a href="{{ route('product.index') }}" type="button" class="btn btn-primary btn-round ml-2">kembali</a>
      </div>
      <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" class="forms-sample mt-4">
        @csrf
        <div class="form-group">
          <label for="product_name">Nama Produk</label>
          <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nama Produk" value="{{ old('product_name') }}" autofocus>
        </div>
        <div class="form-group">
          <label for="price">Harga</label>
          <input type="number" class="form-control" id="price" name="price" placeholder="Harga" value="{{ old('price') }}">
        </div>
        <div class="form-group">
          <label for="stok">Stok</label>
          <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" value="{{ old('stok') }}">
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <div class="form-check" style="margin-top: -3px;">
            <label class="form-check-label">
              <input type="radio" class="status" name="status" id="status" value="aktif" {{ old('status') == 'aktif' ? 'checked' : '' }}>Aktif</label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="status" name="status" id="status" value="non-aktif" {{ old('status') == 'non-aktif' ? 'checked' : '' }}>Non-Aktif</label>
          </div>
        </div>
        <div class="form-group">
          <label>File upload</label>
          <input class="form-control" type="file" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-outline-success float-right">Tambah</button>
      </form>
    </div>
  </div>
</div>
@endsection