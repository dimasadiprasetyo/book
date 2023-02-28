<div class="p2">
    <div class="form-group">
        <label for="name" style="font-size: 15px" style="color: black">Nama User</label>
        <input type="text" class="form-control col-11" id="name" name="name" placeholder="Masukkan User" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
    </div>
    <div class="form-group">
        <label for="username" style="font-size: 15px" style="color: black">Username</label>
        <input type="text" class="form-control col-11" id="username" name="username" placeholder="Masukkan Username" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
    </div>
    <div class="form-group">
        <label for="username" style="font-size: 15px" style="color: black">Password</label>
        <input type="password" class="form-control col-11" id="password" name="password" placeholder="Masukkan Password Aman" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Level/Role</label>
        <select class="form-control col-11"  name="level" id="level" > 
            <option disabled selected>-- Pilih Level/Role --</option>
          <option>User</option>
          <option>Clien</option>
        </select>
      </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><b> X </b> Close</button>
        <button type="button" class="btn btn-primary btn-sm" onclick="store()"><i class="fas fa-save" aria-hidden="true"></i> Save</button>
    </div>
</div>