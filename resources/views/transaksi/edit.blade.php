@extends('layout.template')
@section('title')
    Transaksi Edit
@endsection
@section('judul')
    <!-- <h1 class="fas fa-bell"> </h1>  -->
    <h1 style="color:black">
        <font size="5" face="Century Gothic"><i class="fa fa-handshake" style='font-size:25px;'></i>&nbsp;TRANSAKSI </font>
    </h1>
@endsection


@section('content')
    <div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5><b> EDIT TRANSAKSI</b></h5>
                </div>
                <div class="card-body">
                        <form action="{{route('update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_ts" id="id_ts" value="{{$trk[0]->id_ts}}">
                            <div class="form-group">
                                <label >NAMA APLIKASI</label>
                                <select name="id_master" id="id_master" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option disabled selected>-- Pilih master --</option>
                                        @foreach ($master as $MaSter)
                                            <option value="{{$MaSter->id}}" {{ $MaSter->id == $trk[0]->id_master ? 'selected' : null}}>
                                                {{$MaSter->nama_master}}
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >JENIS</label>
                                <select name="id_nama" id="id_nama" class="form-control select2 select2-hidden-accessible"
                                  style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                  <option disabled selected>-- Pilih Jenis --</option>
                                  @foreach ($jenis as $Jenis)
                                  <option value="{{$Jenis->id}}" {{ $Jenis->id == $trk[0]->id_nama ? 'selected' : null}}>
                                    {{$Jenis->nama}}
                                </option>
                                  @endforeach
                                </select>
                              </div>
                            <div class="form-group">
                                <label for="tgl">TANGGAL</label>
                                <input type="date" class="form-control"  id="tgl" value="{{$trk[0]->tgl}}" name="tgl" placeholder="Masukkan Tanggal">
                            </div>
                            <div class="form-group">
                                <label for="Lk">KETERANGAN</label>
                               <textarea class="form-control editor" name="Lk" id="Lk" placeholder="Masukkan Content" rows="4">
                                    {!!  $trk[0]->Lk !!}
                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-success btn-sm">SIMPAN</button>
                            <a href="{{route('trk.index')}}" class="btn btn-warning btn-sm">BATAL</a>
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