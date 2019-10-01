<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
        <div class="card">

            <h5 class="card-header success-color white-text text-center py-4">
                <strong>Ubah Data Kamar</strong>
            </h5>
            <div class="card-body px-lg-5 mt-4 pt-0">
            <?php 
            
            if(isset($kamar)){
                $kamar = $kamar->row();
            ?>
            <!-- Default form contact -->
            <form class="text-center" method="post" action="<?=site_url()?>admin/ubah_kamar_save" enctype="multipart/form-data">

                <input type="hidden" class="form-control" id="idkamar" name="idkamar" value="<?=$kamar->idkamar?>">
                <div class="form-group row">
                    <label for="tipe" class="col-sm-4 col-form-label">Tipe</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Tipe" value="<?=$kamar->tipe?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" value="<?=$kamar->jumlah?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" value="<?=$kamar->harga?>" required>
                    </div>
                </div>

                <!-- Default unchecked -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkgambar" name="checkgambar" value="1">
                    <label class="custom-control-label" for="checkgambar">Centang bila upload gambar</label>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="bukti">Upload Gambar Kamar</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="gambar" id="gambar"
                        aria-describedby="gambar" disabled>
                        <label class="custom-file-label" for="gambar">Pilih Gambar</label>
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
</main>

<script>


$(document).ready( function() {
    $("#checkgambar").change(function(){
        if ($('#checkgambar').is(':checked')) {
            $("#gambar").prop('disabled', false);
        }else{
            $("#gambar").prop('disabled', true);
        }
    });
});

</script>