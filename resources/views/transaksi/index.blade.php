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
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <a href="{{route('trk.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive nowrap"  id="datatables">
                        <thead class="table-dark">
                            <tr>
                                <th width="12%">No</th>
                                <th>Nama Master</th>
                                <th>Nama Aplikasi</th>
                                <th>Keterangan</th>
                                <th>Catatan</th>
                                <th>Langkah - langkah</th>
                                <th>Aksi</th>
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
                                    <a class="btn btn-warning" href="{{route('edit',$tamp->id_ts)}}" >
                                        <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit
                                    </a>
                                    <form action="#" class="d-inline delete" method="POST"
                                                onsubmit="return confirm('Yakin Anda Ingin menghapus Data?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete" id="delete" data-id="#">
                                            <i class="fa fa-trash fa-fw" aria-hidden="true"></i>&nbsp;Hapus
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