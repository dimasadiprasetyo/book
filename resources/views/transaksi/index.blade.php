@extends('layout.template')
@section('title')
    Transaksi
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
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{route('trk.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-striped table-bordered dt-responsive nowrap" width="auto" style="text-align: center; width: 100%; height: 100%;"  id="example1">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Master</th>
                                    <th >Nama Aplikasi</th>
                                    <th >Keterangan</th>
                                    <th >Catatan</th>
                                    <th >Langkah - langkah</th>
                                    <th >Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tmp as $tamp)
                                    <tr style="font-size: 15px">
                                        <td >{{$loop->iteration}}</td>
                                        <td >{{$tamp->master->nama_master}}</td>
                                        <td >{{$tamp->nama_apk}}</td>
                                        <td >{{$tamp->keterangan}}</td>
                                        <td >{{$tamp->catatan}}</td>
                                        <td >{!!$tamp->Lk!!}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{route('edit',$tamp->id_ts)}}" >
                                                <i class="fas fa-pencil" aria-hidden="true"></i>&nbsp;Edit
                                            </a>
                                        
                                            
                                            <button type="button" data-toggle="modal"
                                                data-target="#modalHapus_{{$tamp->id_ts}}"
                                                class="btn btn-sm btn-danger" id="btn-hapus"><i class="fa fa-trash"></i>
                                            </button>
                                            <!-- Akhir Tombol Hapus -->

                                        <!-- Modal Hapus Data -->
                                        <form action="{{route('delete.trx', $tamp->id_ts)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="_method" value="DELETE">
                                            <div class="modal fade" id="modalHapus_{{$tamp->id_ts}}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        Apakah Anda Yakin ingin menghapus data?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="data_" class="Data_">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tidak</button>
                                                            <button type="submit" class="btn btn-primary">Ya</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- Akhir Modal Data -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('awal')
@endpush
@push('akhir')
@endpush

