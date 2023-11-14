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

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="d-flex align-items-center">
        <h4 class="card-title">Data Produk</h4>
        <div class="ml-auto">
        </div>
        <a href="{{ route('product.create') }}" type="button" class="btn btn-primary btn-round ml-2"><i class="fa fa-plus"></i> Tambah Data</a>
      </div>
      <div class="table-responsive">
        <table id="add-row" class="table table-striped">
          <thead>
            <tr>
              <th style="width: 20px; text-align: center;">No</th>
              <th style="text-align: center;">Nama Produk</th>
              <th style="text-align: center;">Foto</th>
              <th style="text-align: center;">Harga</th>
              <th style="text-align: center;">Stok</th>
              <th style="text-align: center;">Status</th>
              <th style="width: 155px; text-align: center;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($product as $pr)
            <tr>
              <td style="text-align: center;">{{ $no++ }}</td>
              <td style="text-align: center;">{{ $pr->product_name }}</td>
              <td style="text-align: center;"><img src="{{ $pr->img }}" class="product" style="height: 140px; width: 140px;"></td>
              <td style="text-align: center;">{{ $pr->price }}</td>
              <td style="text-align: center;">{{ $pr->stok }}</td>
              <td style="text-align: center;">
                <?php
                if ($pr->status == 'aktif') {
                  echo '<button type="button" class="btn btn-success btn-rounded btn-fw" disabled>Aktif</button>';
                } else {
                  echo '<button type="button" class="btn btn-warning btn-rounded btn-fw" disabled>Non-Aktif</button>';
                }
                ?>
              </td>
              <td style="text-align: center;">
                <form action="{{ route('product.destroy',$pr->id) }}" method="POST">
                  <a href="{{ route('product.show',$pr->id) }}"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Detail">
                      <i class="mdi mdi-eye"></i>
                    </button></a>
                  <a href="{{ route('product.edit',$pr->id) }}"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Ubah">
                      <i class="mdi mdi-grease-pencil"></i>
                    </button></a>

                  @csrf
                  @method('DELETE')

                  <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
                    <i class="mdi mdi-delete"></i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection