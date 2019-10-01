<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
        <div class="card">

            <h5 class="card-header success-color white-text text-center py-4">
                <strong>Tambah Data Kamar</strong>
            </h5>
            <div class="card-body px-lg-5 mt-4 pt-0">
                <!-- Default form contact -->
                <form class="text-center" method="post" action="<?=site_url()?>admin/tambah_kamar_save" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="tipe" class="col-sm-4 col-form-label">Tipe</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Tipe" value="" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" value="" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" value="" required>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="bukti">Upload Gambar Kamar</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="gambar" id="gambar"
                        aria-describedby="gambar">
                        <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                    </div>
                </div>
                <button class="btn btn-info btn-block" type="submit">Submit</button>

                </form>
            </div>
        </div>
    </div>
</main>