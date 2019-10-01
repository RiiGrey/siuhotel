
<div class="container">
  <div class="row">
    <div class="col-sm">
        <!-- Default form login -->
        <form class="text-center border border-light p-5" method="post" action="<?=site_url()?>login/registrasi_save" enctype="multipart/form-data">

            <p class="h4 mb-4">Registasi di SIHOTUMP</p>

            <!-- Email -->
            <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label">Username</label>
                <div class="col-sm-8">
                    <input type="text" name="username" id="username" class="form-control mb-4" placeholder="Username" required>
                </div>
            </div>

            <!-- Password -->
            <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" name="password" id="password" class="form-control mb-4" placeholder="Password" required>
                </div>
            </div>

            <!-- Password validasi -->
            <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label">Password Validasi</label>
                <div class="col-sm-8">
                    <input type="password" name="password_validasi" id="password_validasi" class="form-control mb-4" placeholder="Password Validasi" required>
                </div>
            </div>

            <!-- Email -->
            <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" name="email" id="email" class="form-control mb-4" placeholder="Email" required>
                </div>
            </div>

            <!-- Nama Asli -->
            <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label">Nama Lengkap</label>
                <div class="col-sm-8">
                    <input type="text" name="nama" id="nama" class="form-control mb-4" placeholder="Nama Lengkap" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                <div class="col-sm-8">
                    <textarea class="form-control rounded-0" id="alamat" name="alamat" rows="3" placeholder="Alamat"></textarea>
                </div>
            </div>

            <!-- Nama Asli -->
            <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label">No. Telefon/HP</label>
                <div class="col-sm-8">
                    <input type="text" name="notelp" id="notelp" class="form-control mb-4" placeholder="No. Telefon/HP" required>
                </div>
            </div>
            
            <!-- Gambar -->
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="bukti">Gambar</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="bukti" id="bukti"
                    aria-describedby="bukti">
                    <label class="custom-file-label" for="bukti">Pilih Gambar</label>
                </div>
            </div>
            <!-- Sign in button -->
            <button class="btn btn-info btn-block my-4" type="submit">Registrasi</button>
        </form>
        <!-- Default form login -->
    </div>
  </div>
</div>