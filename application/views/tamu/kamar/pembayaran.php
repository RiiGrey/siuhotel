

<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="card">

                <h5 class="card-header success-color white-text text-center py-4">
                    <strong>Konfirmasi Pembayaran</strong>
                </h5>

                <div class="card-body px-lg-5 mt-4 pt-0">
                <?php 
                
                if(isset($data_user)){
                    $user = $data_user->row();
                ?>
                    <!-- Default form contact -->
                    <form class="text-center" method="post" action="<?=site_url()?>Tamu_kamar/pembayaran_save" enctype="multipart/form-data">
                        
                        <input type="hidden" class="form-control" id="idpesan" name="idpesan" placeholder="Id Kamar" value="<?=$this->uri->segment(3)?>">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?=$user->nama?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Pembayaran</label>
                            <div class="col-sm-8">
                            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Pembayaran" value="<?=$user->jumlah?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank" class="col-sm-4 col-form-label">Bank</label>
                            <div class="col-sm-8">
                            <select name="bank" id="bank" class="browser-default custom-select mb-4">
                                <option value="" disabled>Pilih Bank</option>
                                <option value="BCA" selected>BCA</option>
                                <option value="BNI">BNI</option>
                                <option value="BRI">BRI</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="norek" class="col-sm-4 col-form-label">No. Rekening</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="norek" name="norek" placeholder="No. Rekening" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namarek" class="col-sm-4 col-form-label">Nama Pemiliki Rekening</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="namarek" name="namarek" placeholder="Nama Pemiliki Rekening" value="">
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="bukti">Upload Bukti Transfer</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="bukti" id="bukti"
                                aria-describedby="bukti">
                                <label class="custom-file-label" for="bukti">Pilih Gambar</label>
                            </div>
                        </div>
                        <button class="btn btn-info btn-block" type="submit">Submit</button>
                    </form>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</main>