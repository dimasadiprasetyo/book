<div class="p2">
    <div class="form-group">
        <label for="id_master" style="font-size: 15px" style="color: black">Kode Master</label>
        <input type="text" class="form-control col-11" id="id_master" name="id_master" placeholder="01" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
    </div>
    <div class="form-group">
        <label for="nama_master" style="font-size: 15px" style="color: black">Nama Master</label>
        <input type="text" class="form-control col-11" id="nama_master" name="nama_master" placeholder="AA" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
    </div>
    <div class="form-group ">
        <label for="keterangan" style="font-size: 15px" style="color: black">Keterangan</label>
        <textarea class="form-control col-11" id="keterangan" name="keterangan" placeholder="keterangan"></textarea>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><b> X </b> Close</button>
        <button type="button" class="btn btn-primary" onclick="store()"><i class="fas fa-save" aria-hidden="true"></i> Save</button>
    </div>
</div>