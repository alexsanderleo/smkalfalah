
 <section class="content-header">

 

<div class="box">
         <div class="box-header">
                <h3 class="box-title">Pinjamin Barang akan dikembalikan</h3>
              </div>
              <!-------------------------MEnambahkan buton-------------------->
              <div class="card-body">
        <div class="col-md-4 col-md-offset-4">
          <a href="<?=site_url('pinjam/in')?>" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
</section>      
      
 <!-------------------------END-------MEnambahkan buton-------------------->
 <section class="content">



                  <div class="box">
                  <div class="col-lg-6" style="float:none;margin:auto;">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Cari barang</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>


            <form action="<?=site_url('pinjam/processtiga')?>" method="post">    
            <div class="card-body">

           
             <div>
             <label for="barcode">Barcode * </label>

             </div>

           <div class="form-group input-group">
         
             <input type="hidden" name="item_id" id="item_id">
             <input type="hidden" name="peminjam_id" id="peminjam_id">
             <input type="text" name="barcode" id="barcode" class="form-control" readonly autofocus>
             <span class="input-group-btn">
                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                    <i class="fa fa-search"></i>
             </span>
             </div>

             <div class="form-group">
                <label>Nama Barang item * </label>
                <input type="text" name="iteme_name" id="iteme_name" class="form-control" readonly>
              </div>


           
              <div class="form-group">
                <label>Nama peminjam * </label>
                <input type="text" name="namapeminjamcbb" id="namapeminjamcbb" class="form-control" readonly>
              </div>
      
              <div class="form-group" required>
                <label>Statuse</label>
                <select name="statusecbb" class="form-control custom-select">
                 
                 
                  <option value="diKembalikan">Di Kembalikan</option>
               
                </select>
    
              
           
              <div class="form-group">
                <label>Total BRG.YG.DIKEMBALIKAN (WAJIB MENGEMBALIKAN SEMUANYA)</label>
                <input type="text" name="qty" id="qty" class="form-control" readonly>
              </div>

              

              <div class="form-group">
                <label>Kondisi barang saat dipinjamkan*</label>
                <input type="text" name="kondisibarangecbb" id="kondisibarangecbb" class="form-control" required>
              </div>
             
              <div class="form-group">
                <label>Tanggal dikembalikan * </label><span>kosongkan jika tidak tentu tgl dikembalikan</span>
                <input type="date" name="tanggaldikembalikanecbb" value="<?=date('Y-m-d')?>" class="form-control" > <!--type= adalah model form e , sedangkan name=nama yg akan dihubungkan ke database -->
              </div>

                
                  <div class="form-group">
                    
                <button type="submit" name="in_out" class="btn btn-success btn-flat">Save</button>
            
                <button type="reset" class="btn btn-flat">reset</button>
              </div>


          
             


              </form>  
 </section>                
 <div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-xl">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Select</h4>
</div>
    <div class="modal-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Barcode</th>
                    <th>Product Item</th>
                    <th>Nama peminjam</th>
                    <th>Quantyty</th>
                    <th>Kondisi barang</th>
                    <th>TGL.PINJAM</th>
                    <th>TGL.KEMBALI</th>
                    <th>Status barang di</th>
                    <th>Opsi</th>
                    </tr>
             </thead>
             <tbody>
              
             <?php $no =1; foreach($row as $i => $data) { ?>
                <tr>
                <td><?=$no++?>.</td>
                        <td> <?=$data->barcode?> </td>
                        <td><?=$data->item_name?></td>
                    <td><?=$data->namapeminjam?></td>
                    <td><?=$data->qty?></td>
                    <td><?=$data->kondisibarang?></td>
                    <td><?=indo_date($data->tanggalpinjam)?></td>
                    <td><?=indo_date($data->tanggaldikembalikan)?></td>
                    <td><?=$data->status?></td>
                        <td class="text-right">
                            <button class="btn btn-xs btn-info" id="select"
                                data-id="<?=$data->peminjam_id?>"
                                data-item_id="<?=$data->item_id?>"
                                data-barcode="<?=$data->barcode?>"
                                data-nameney="<?=$data->item_name?>"
                                data-qtyney="<?=$data->qty?>"
                                data-namapeminjamey="<?=$data->namapeminjam?>"
                                data-kondisibarangey="<?=$data->kondisibarang?>">
                               
                                <i class="fa fa-check"></i> Select
                                
                            </button>
                        </td>
                </tr>
                <?php } ?>
             </tbody>
       </table>
    </div>
</div>
</div>
</div>
   



    

<!-- DataTables  & Plugins -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>

    <script>
 $(document).ready(function(){
    $(document).on('click', '#select', function() {
      
        var peminjam_id =$(this).data('id');
        var item_id =$(this).data('item_id');
        var barcode =$(this).data('barcode');
        var name =$(this).data('nameney');
       
        var namapeminjam = $(this).data('namapeminjamey');
        var kondisibarang = $(this).data('kondisibarangey');
        var qty = $(this).data('qtyney');
        
        $('#peminjam_id').val(peminjam_id);
        $('#item_id').val(item_id);
        $('#barcode').val(barcode);
        $('#iteme_name').val(name);
       
        $('#namapeminjamcbb').val(namapeminjam);
        $('#qty').val(qty);

        $('#kondisibarangecbb').val(kondisibarang);

        $('#modal-item').modal('hide');
        $('#modal-backdrop').modal('hide');
    })
})
    </script>


    