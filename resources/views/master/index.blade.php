@extends('layout.template')
@section('title')
    Aplikasi
@endsection
@section('judul')
    <!-- <h1 class="fas fa-bell"> </h1>  -->
    <h1 style="color:black">
        <font size="5" face="Century Gothic"><i class="fa fa-laptop" style='font-size:25px;'></i>&nbsp;APLIKASI </font>
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
    <div class="container">
        {{-- <div class="row-mt-5">
            <div class="col-lg-50">
                <div class="form-grup d-flex flex-row-reverse">
                    <input type="text" class="form-control col-lg-50" 
                      id="input" name="input" placeholder="Cari Berdasarkan Nama Aplikasi...">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <br> --}}
       
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="#" class="btn btn-success btn-sm" onclick="create()"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        {{-- <div id="success_message"></div> --}}
                        
                            <table class="table table-striped table-bordered dt-responsive nowrap" style="text-align: center; width: 100%; height: 100%;"  id="Datatables">
                                <thead class="table-dark">
                                    <tr width=100%>
                                        {{-- <th width="12%">No</th> --}}
                                        <th >KODE APLIKASI</th>
                                        <th>NAMA APLIKASI</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- tbody --}}
                                </tbody>
                            </table>
                        {{-- {!! $master->links() !!} --}}
                        <div id="Example2"></div>
                    </div>
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
   {{-- <div class="modal fade" id="exampleModalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="modal_del">
                <Span>Apakah anda yakin ingin menghapus</Span>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-warning del_ya btn-sm" id="del_ya">Ya</button>
            </div>
        </div>
    </div>
</div> --}}



    
  
@endsection

@push('awal')    
    {{-- modal --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@endpush
@push('akhir')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#Datatables').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: 'pencarian/json',
                    "order": [[ '0', "desc" ]],
                    columns: [
                        { data: 'id_master', name: 'id_master' },
                        { data: 'nama_master', name: 'nama_master' },
                        { data: 'action'},
                    ],
                });
        });

        // untuk melihat Form edit
            function show(id){
                $.get("{{ url('/show') }}/" + id, {}, function(data, status){
                    $("#page").html(data);
                    $("#exampleModalLabel").html('Edit Aplikasi');
                    $("#exampleModal").modal("show");
                });
            }
        // end

        // untuk menyambungkan ke Form modal TAMBAH
            function create(){
                $.get("{{ url('/tambah') }}", {}, function(data, status){
                    $("#page").html(data);
                    $("#exampleModalLabel").html('Create Aplikasi');
                    $("#exampleModal").modal("show");
                });
            }
        // end

        // untuk input Store data
            function store(){
                let id_master = $('#id_master').val();
                let nama_master = $('#nama_master').val();
                $.ajax({
                    url : "{{ url('store') }}",
                    method: "get",
                    
                    data : {
                        _token: "{{ csrf_token() }}",
                        "id_master": id_master,
                        "nama_master": nama_master,
                    },
                    success : function(response) {
                        console.log(response)
                        if (response.status == 400 )
                        {
                            $('#save_data').html("");    
                            $('#save_data').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#save_data').append('<li>' + err_value + '</li>');
                            });   
                        }else{
                            $(".btn-close").click();
                            location.reload();
                            // alertSuccess('Data tersimpan')
                        }
                    }
                });
            }
        // end

        // untuk input update data
            function update(id){
                
                let update_master = $('#update_master').val();
                let id_master = $('#id_master').val();
                let nama_master = $('#nama_master').val();
                $.ajax({
                    url : "{{ url('update') }}/ " + id,
                    method: "get",
                    data : {
                        _token: "{{ csrf_token() }}",
                        "id_master": id_master,
                        "nama_master": nama_master,
                    },
                    success : function(response) {
                        console.log(response)
                        if (response.status == 400) {
                            $("#update_data").html("");
                            $("#update_data").addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                 $('#update_data').append('<li>' + err_value +
                                    '</li>');
                            });
                        }else{
                            $(".btn-close").click();
                            location.reload();
                        }
                    }
                });
            }
        // end

        // Tampilan modal hapus
            $(document).on('click', '.show_confirm',function(){
                var id_ts = $(this).val();
                $('#modal_del').val(id_ts);
                $('#exampleModalHapus').modal('show');
            });
        // end
        
          // Delete data
            $('#Datatables').on('click','.show_confirm',function(){
                    var id = $(this).data('id');

                    var deleteConfirm = confirm("Apakah Anda yakin ingin menghapus data?");
                    if (deleteConfirm == true) {
                        // AJAX request
                        $.ajax({
                            url: "{{ url('delete/master') }}/" + id,
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id
                            },
                            success: function(response){
                                if(response.success == 1){
                                    alert("Apakah anda yakin?");
                                    location.reload();
                                }else{
                                        alert("Invalid ID.");
                                }
                            }
                        });
                    }

            });
         //end


         //-----------------------------Comment--------------------------//
            //pencarian
                // $(document).on('keyup', '#input', function(){
                //     $value= $(this).val();
                //     let id_master = $('#id').val();
                //     $('tbody').html('');
                //     $.ajax({
                //         type : 'get',
                //         url : "{{ url('search') }}/"+ id_master,
                //         data:{'search':$value},
                //         dataType: 'json',
                //         success: (masters) => {
                //             masters.Masters.forEach((master) => {
                //                             var row = `<tr>
                //                                             <input name="_method" type="hidden" value="${master.id}">
                //                                             <td style="font-size: 14px">${master.id_master}</td>
                //                                             <td style="font-size: 14px">${master.nama_master}</td>
                //                                             <td style="font-size: 14px">${master.keterangan}</td> 
                //                                             <td>
                //                                                 <button type="button"  class="btn btn-primary btn-sm" onclick="show(${master.id})">
                //                                                     Edit
                //                                                 </button>     
                //                                                 <button type="submit" class="btn btn-danger btn-sm delete show_confirm" value="${master.id}" id="show_confirm" >
                //                                                     Hapus
                //                                                 </button>
                //                                             </td>     
                //                                         </tr>`
                //                                         $('tbody').append(row);
                //             });       
                //         }
                //     });
                // });
            //end
           // lihat data
            // function lihat(){
            //     let id_master = $('#id').val();
            //     $('tbody').html('');
            //         $.ajax({
            //             type: 'get',
            //             url: "{{ url('read') }}/"+id_master,
            //             dataType: 'json',
            //             success: (masters) => {
            //                 masters.Masters.forEach((master) => {
            //                     var row = `<tr>
            //                                 <input name="_method" type="hidden" value="${master.id}">
            //                                 <td style="font-size: 14px">${master.id_master}</td>
            //                                 <td style="font-size: 14px">${master.nama_master}</td>
            //                                 <td style="font-size: 14px">${master.keterangan}</td> 
            //                                 <td>
            //                                     <button type="button"  class="btn btn-primary btn-sm" onclick="show(${master.id})">
            //                                         Edit
            //                                     </button>     
            //                                     <button type="submit" class="btn btn-danger btn-sm delete show_confirm" value="${master.id}" id="show_confirm" >
            //                                         Hapus
            //                                     </button>
            //                                 </td>     
            //                             </tr>`
            //                             $('tbody').append(row);
            //                 });    
            //             }
            //         });
            // }
        // end lihat data
    </script>
@endpush
