@extends('layout.template')
@section('title')
    master
@endsection
@section('judul')
    <!-- <h1 class="fas fa-bell"> </h1>  -->
    <h1 style="color:black">
        <font size="5" face="Century Gothic"><i class="fa fa-laptop" style='font-size:25px;'></i>&nbsp;USER </font>
    </h1>
@endsection
@section('home')
     <a href="">Home</a>
@endsection
@section('nama')
     <a href="">Dasboard</a>
@endsection

@section('content')

    {{-- body --}}
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-success" onclick="create()"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive nowrap"  id="datatables">
                        <thead class="table-dark">
                            <tr>
                                <th width="12%">No</th>
                                <th >Nama user</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- tbody --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="page" class="p-2"></div>
                    </div>
                </div>
            </div>
    </div>
  
    <!-- Modal -->
    <div class="modal fade" id="exampleModalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="modal_del">
                        <Span>Apakah anda yakin ingin menghapus</Span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-warning del_ya" onclick="hapus()">Ya</button>
                    </div>
                </div>
            </div>
    </div>
    
  
@endsection

@push('awal')    
    {{-- modal --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@endpush
@push('akhir')
    {{-- modal --}}
    <script type="text/javascript">
    // kosoong
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            lihat()
        });

        // lihat data
        function lihat(){
            let id_user = $('#id').val();
            $('tbody').html('');
            let no = 1;
                $.ajax({
                    url: "{{ url('user/read') }}/"+id_user,
                    type: 'get',
                    dataType: 'json',
                    success: (users) => {
                        users.Usr.forEach((User) => {
                            var row = `<tr>
                                        <input name="_method" type="hidden" value="${User.id}">
                                        <td style="font-size: 14px">${no}</td>
                                        <td style="font-size: 14px">${User.name}</td>
                                        <td style="font-size: 14px">${User.username}</td>
                                        <td style="font-size: 14px">${User.level}</td> 
                                        <td>     
                                            <button type="submit" class="btn btn-danger btn-sm delete show_confirm" value="${User.id}" id="show_confirm" >
                                                <i class="fa fa-trash fa-fw" aria-hidden="true"></i>&nbsp;Hapus
                                            </button>
                                </td>     
                                    </tr>`
                                $('tbody').append(row);
                                no++;
                        });    
                    }
                });
        }

         // untuk melihat edit
         function show(id){
            $.get("{{ url('/show') }}/" + id, {}, function(data, status){
                $("#page").html(data);
                $("#exampleModalLabel").html('Edit Master');
                $("#exampleModal").modal("show");
            });
        }

        // untuk menyambungkan ke modal
        function create(){
            $.get("{{ url('/user/create') }}", {}, function(data, status){
                $("#page").html(data);
                $("#exampleModalLabel").html('Create User');
                $("#exampleModal").modal("show");
            });
        }

        // untuk input data
        function store(){
            let name = $('#name').val();
            let username = $('#username').val();
            let level = $('#level').val();
            let password = $('#password').val();
            $.ajax({
                url : "{{ url('user/store') }}",
                method: "get",
                data : {
                    _token: "{{ csrf_token() }}",
                    "name": name,
                    "username": username,
                    "level": level,
                    "password": password,
                },
                success : function(data) {
                    console.log("berhasil")
                    $(".btn-close").click();
                    lihat()
                }
            });
        }
        
        // show hapus
      $(document).on('click', '.show_confirm',function(e){
        e.preventDefault();
        var del_id = $(this).val();
        $('#modal_del').val(del_id);
        $('#exampleModalHapus').modal('show');
      });

    //   hapus
      function hapus(){
          var del_id = $('#modal_del').val();
          var id = $('id');
          $.ajax({
            type: "DELETE",
            url: "{{url('delete/user')}}/" + del_id,
            data: {
                _token: "{{ csrf_token() }}",
            },
            success:function(response){
                // console.log(response);
                console.log('berhasil hapus');
                $('#succes_message').addClass('alert alert-success');
                $('#succes_message').text(response.message);
                $('#exampleModalHapus').modal('hide')
                lihat();
            }

        });
      }
        
    </script>
@endpush
