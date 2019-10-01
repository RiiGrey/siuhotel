<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
      <h1>Data Pemesanan</h1>
      
      <div class="row">

    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Aksi</th>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Alamat</th>
          <th scope="col">No. Telp</th>
          <th scope="col">Tipe Kamar</th>
          <th scopre="col">Tanggal Pemesanan</th>
          <th scope="col">Tanggal check-in</th>
          <th scope="col">Tanggal Check-out</th>
          <th scope="col">Total Bayar</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        if($pemesanans->num_rows() > 0){
          foreach($pemesanans->result() as $row){
          $tanggal_pemesanan =  date('d-m-Y', strtotime($row->tglpesan));
          $tanggal_masuk = date('d-m-Y', strtotime($row->tglmasuk));
          $tanggal_keluar = date('d-m-Y', strtotime($row->tglkeluar));
          
      ?>
        <tr>
          <th scope="row">
          <?php
          if($row->status== 'Konfirmasi'){
          ?>

          <a class="open-modal text-info" href="<?=site_url()?>admin/konfirmasi_pembayaran_form/<?=$row->idpesan?>"  data-toggle="modal" data-target="#modalView" data-id="<?=$row->idpesan?>" data-nama="<?=$row->nama?>" data-jumlahbayaran="<?=$row->jumlah_bayaran?>" data-bank="<?=$row->bank?>" data-norek="<?=$row->norek?>" data-namarek="<?=$row->namarek?>" data-gambar="<?=site_url()?>uploads/tamu/bukti_pembayaran/<?=$row->bukti_pembayaran?>"><i class="fas fa-edit"></i>Konfirmasi</a>

          <?php

          }
          ?>
          <th scope="row">1</th>
          <td><?=$row->nama?></td>
          <td><?=$row->alamat?></td>
          <td><?=$row->telepon?></td>
          <td><?=$row->tipe?></td>
          <td><?=$tanggal_pemesanan?></td>
          <td><?=$tanggal_masuk?></td>
          <td><?=$tanggal_keluar?></td>
          <td><?=$row->totalbayar?></td>
          <td><?=$row->status?></td>
        </tr>

      <?php
          }
        }
      ?>
      </tbody>
    </table>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Lihat Data Kamar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <p class="col-sm-4">Atas Nama</p>
              <p id="mnama" class="col-sm-8 text-info">test</p>
            </div>
            <div class="row">
              <p class="col-sm-4">Jumlah Bayaran</p>
              <p id="mjumlah_bayaran" class="col-sm-8 text-info">test</p>
            </div>
            <div class="row">
              <p class="col-sm-4">Bank</p>
              <p id="mbank" class="col-sm-8 text-info">test</p>
            </div>
            <div class="row">
              <p class="col-sm-4">norek</p>
              <p id="mnorek" class="col-sm-8 text-info">test</p>
            </div>
            <div class="row">
              <p class="col-sm-4">namarek</p>
              <p id="mnamarek" class="col-sm-8 text-info">test</p>
            </div>
            <div class="row">
              <p class="col-sm-4">gambar</p>
              <img width="100%" height="100%" id="mgambar" class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
              
            </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form action="<?=site_url()?>admin/konfirmasi_pembayaran" method="post">
            <input type="hidden" name="mid" id="mid">
            <button type="submit" class="btn btn-success">Validasi Pembayaran</button>
          </form>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->
  </div>
</main>

<script>
$(document).ready(function(){
  $('.open-modal').click( function(){
		$('.modal-footer #mid').val($(this).data('id'));
		$('.modal-body #mnama').text($(this).data('nama'));
		$('.modal-body #mjumlah_bayaran').text($(this).data('jumlahbayaran'));
		$('.modal-body #mbank').text($(this).data('bank'));
		$('.modal-body #mnorek').text($(this).data('norek'));
		$('.modal-body #mnamarek').text($(this).data('mnamarek'));
		$('.modal-body #mgambar').attr("src", $(this).data('gambar'));
  });
  
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
});

</script>