
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
    
        <?php 
        if(isset($fetch_single) && isset($data_user)){
            //inisialisasi kamar
            $kamar = $fetch_single->row();
            $kamar_harga = "Rp. " . $kamar->harga;

            //inisialisasi user
            $user = $data_user->row();
        ?>
        <div class="card">

            <h5 class="card-header success-color white-text text-center py-4">
                <strong>Pesan Kamar</strong>
            </h5>

            <!-- Card image -->
            <img class="img-fluid mx-auto d-block mt-1" src="<?=site_url()?>uploads/admin/kamar/<?=$kamar->gambar?>" alt="Card image cap" width="50%" height="300">
            <div class="text-center border-bottom border-light">
                <h4 class="card-title text-info"><?=$kamar->tipe?></h4>
                <h5><?=$kamar_harga?></h5>
            </div>
            <!--Card content-->
            <div class="card-body px-lg-5 mt-4 pt-0">
                <!-- Default form contact -->
                <form class="text-center" method="post" action="<?=site_url()?>Tamu_kamar/pesan_save">

                    <input type="hidden" class="form-control" id="idkamar" name="idkamar" value="<?=$kamar->idkamar?>">
                    <input type="hidden" class="form-control" id="tipe" name="tipe" value="<?=$kamar->tipe?>">
                    <input type="hidden" class="form-control" id="harga" name="harga" value="<?=$kamar->harga?>">

                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?=$user->nama?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea class="form-control rounded-0" id="alamat" name="alamat" rows="3" placeholder="Alamat"><?=$user->alamat?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="notelp" class="col-sm-4 col-form-label">No. Telfon/hp</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="notelp" name="notelp" placeholder="No. Telfon/hp" value="<?=$user->telepon?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tglmasuk" class="col-sm-4 col-form-label">Tanggal Check-In</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control datepicker" id="tglmasuk" name="tglmasuk" placeholder="Tanggal Check-In">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tglkeluar" class="col-sm-4 col-form-label">Tanggal Check-Out</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tglkeluar" name="tglkeluar" placeholder="Tanggal Check-Out">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Kamar</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Kamar" value="1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lama_menginap" class="col-sm-4 col-form-label">Lama Menginap</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lama_menginap" name="lama_menginap" placeholder="Lama Menginap" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="total_biaya" class="col-sm-4 col-form-label">Total Biaya</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="total_biaya" name="total_biaya" placeholder="Total Biaya" readonly>
                        </div>
                    </div>
                    <!-- Send button -->
                    <button class="btn btn-info btn-block" type="submit">Submit</button>

                </form>
                <!-- Default form contact -->
            </div>
        </div>
        <?php 
        }
        ?>
    </div>
</main>
<script>
Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});

$(document).ready( function() {

    $('#tglmasuk').val(new Date().toDateInputValue());
    $('#tglkeluar').val(new Date().toDateInputValue());

    $("#tglmasuk").change(function(){
        if(Date.parse($('#tglkeluar').val()) > Date.parse($('#tglmasuk').val())){

            //menghitung lama menginap
            const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
            $('#lama_menginap').val(Math.round(Math.abs((Date.parse($('#tglkeluar').val()) - Date.parse($('#tglmasuk').val()))/oneDay)));

            //menghitung total biaya
            $('#total_biaya').val($('#harga').val() * $('#jumlah').val() * $('#lama_menginap').val());
        }else{
            $('#lama_menginap').val(0);
            $('#total_biaya').val(0);
        }
    });
    
    $("#tglkeluar").change(function(){
        if(Date.parse($('#tglkeluar').val()) > Date.parse($('#tglmasuk').val())){

            //menghitung lama menginap
            const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
            $('#lama_menginap').val(Math.round(Math.abs((Date.parse($('#tglkeluar').val()) - Date.parse($('#tglmasuk').val()))/oneDay)));

            //menghitung total biaya
            $('#total_biaya').val($('#harga').val() * $('#jumlah').val() * $('#lama_menginap').val());
        }else{
            $('#lama_menginap').val(0);
            $('#total_biaya').val(0);
        }
    });
});

</script>