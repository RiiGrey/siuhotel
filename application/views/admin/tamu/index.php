<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
        <h1>Data Kamar</h1>
        
        <div class="row">
            <table class="table" id="myTable">
                <caption style="caption-side: top; padding:0;">
                
                    <!-- Material input -->
                    <div class="md-form col-sm-4">
                        <input type="text" id="myInput" class="form-control">
                        <label for="form1">Cari Tamu</label>
                    </div>
                </caption>
                <thead>
                    <tr>
                        <th scope="col">Aksi</th>
                        <th scope="col">No.</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama Asli</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telepon</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                
                if($tamus->num_rows() > 0){
                    $no = 1;
                    foreach($tamus->result() as $tamu){
                ?>
                    <tr>
                        <td><a class="open-modal text-info" data-toggle="modal" data-target="#modalView" href="#"><i class="fas fa-eye"></i>Lihat</a>
                        </td>
                        <td><?=$no?></td>
                        <td><?=$tamu->username?></td>
                        <td><?=$tamu->email?></td>
                        <td><?=$tamu->nama?></td>
                        <td><?=$tamu->alamat?></td>
                        <td><?=$tamu->telepon?></td>
                    </tr>
                <?php
                    $no++;
                    }
                }
                ?>

                </tbody>
            </table>
            
            <div class="row">
                <div class="col">
                    <?=$pagination?>
                </div>
            </div>
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
                
                <img width="30%" height="200" id="mgambar" class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
                <div class="row">
                <h4 class="col-sm-2">Tipe</h4>
                <h4 class="col-sm-2">:</h4>
                <h4 id="mtipe" class="col-sm-8 text-info">test</h4>
                </div>
                <div class="row">
                <h4 class="col-sm-2">Jumlah</h4>
                <h4 class="col-sm-2">:</h4>
                <h4 id="mjumlah" class="col-sm-8 text-info">test</h4>
                </div>
                <div class="row">
                <h4 class="col-sm-2">Harga</h4>
                <h4 class="col-sm-2">:</h4>
                <h4 id="mharga" class="col-sm-8 text-info">test</h4>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
		$('.modal-body #mgambar').attr("src", $(this).data('gambar'));
		$('.modal-body #mtipe').text($(this).data('tipe'));
		$('.modal-body #mjumlah').text($(this).data('jumlah'));
		$('.modal-body #mharga').text($(this).data('harga'));
  });
  
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
});

</script>