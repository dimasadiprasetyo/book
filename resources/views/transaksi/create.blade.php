@extends('layout.template')

@section('title')
    transaksi
@endsection

@section('judul')
    <!-- <h1 class="fas fa-bell"> </h1>  -->
    <h1 style="color:black">
        <font size="5" face="Century Gothic"><i class="fa fa-laptop" style='font-size:25px;'></i>&nbsp;TRANSAKSI </font>
    </h1>
@endsection

@section('home')
     <a href="">Home</a>
@endsection
@section('nama')
     <a href="">Dasboard</a>
@endsection

@section('content')
<div class="container" style="margin-top: 20px">
  <div class="row">
      <div class="col-md-8 offset-md-2">
          <div class="card">
              <div class="card-header">
                  <h5><b> TAMBAH POST</b></h5>
              </div>
              <div class="card-body">
                  <form action="{{route('store')}}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label >NAMA MASTER</label>
                        <select name="id_master" id="id_master" class="form-control select2 select2-hidden-accessible"
                          style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                          <option disabled selected>-- Pilih master --</option>
                          @foreach ($master as $MaSter)
                            <option value="{{$MaSter->id}}">{{$MaSter->nama_master}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                          <label for="nama_apk">NAMA APLIKASI</label>
                          <input type="text" name="nama_apk" id="nama_apk" placeholder="Masukkan Title" class="form-control">
                      </div>

                      <div class="form-group">
                          <label for="keterangan">KETERANGAN</label>
                          <textarea class="form-control" id="keterangan" name="keterangan" placeholder="keterangan"></textarea>
                      </div>

                      <div class="form-group">
                          <label for="catatan">CATATAN</label>
                          <textarea class="form-control" id="catatan" name="catatan" placeholder="keterangan"></textarea>
                      </div>

                      <div class="form-group">
                          <label for="Lk">LANGKAH - LANGKAH</label>
                          <textarea class="form-control editor" name="Lk" id="Lk" placeholder="Masukkan Content" rows="4"></textarea>
                      </div>

                      <button type="submit" class="btn btn-success">SIMPAN</button>
                      <button type="submit" class="btn btn-warning">BATAL</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

@push('awal')
@endpush
@push('akhir') 
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
  $(window).load(function () {
  CKEDITOR.replace('Lk');
  });
  </script>
@endpush

