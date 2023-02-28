<div class="p2">
    <div class="form-group">
        <ul id="update_data"></ul>
        <label for="id_master" style="font-size: 15px" style="color: black">KODE APLIKASI*</label>
        <input type="text" class="form-control col-11" value="{{$master->id_master}}" 
        id="id_master" name="id_master" placeholder="01"
        required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" 
        oninput="setCustomValidity('')">
    </div>
    <div class="form-group">
        <label for="nama_master" style="font-size: 15px" style="color: black">NAMA APLIKASI*</label>
        <input type="text" value="{{$master->nama_master}}" class="form-control col-11" id="nama_master"
         name="nama_master" placeholder="AA" 
         required oninvalid="this.setCustomValidity('Data tidak boleh kosong')"
          oninput="setCustomValidity('')">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning btn-sm" onclick="update({{$master->id}})"> Update</button>
    </div>
</div>