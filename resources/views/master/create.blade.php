<div class="p2">
    <ul id="save_data"></ul>
    <input type="hidden" id="id" name="id">
    <div class="form-group">
        <label for="id_master" style="font-size: 15px" style="color: black">KODE APLIKASI*</label>
        <input type="text" class="form-control col-11" id="id_master" value="{{$kodeBaru}}" name="id_master" placeholder="Masukkan Kode Aplikasi" required autofocus>
        <span class="help-block with-errors"></span>
    </div>
    <div class="form-group">
        <label for="nama_master" style="font-size: 15px" style="color: black">NAMA APLIKASI*</label>
        <input type="text" class="form-control col-11" id="nama_master" name="nama_master" placeholder="Masukkan Nama Aplikasi" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
    </div>
    <div class="form-group ">
        <label for="keterangan" style="font-size: 15px" style="color: black">KETERANGAN*</label>
        <textarea class="form-control col-11" id="keterangan" name="keterangan" placeholder="Masukkan keterangan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-sm" onclick="store()"><i class="fas fa-save" aria-hidden="true"></i> Save</button>
    </div>
</div>
