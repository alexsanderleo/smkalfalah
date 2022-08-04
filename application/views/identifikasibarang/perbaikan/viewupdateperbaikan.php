
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


            <form action="<?=site_url('identifikasibarang/processsimpanupdate')?>" method="post">    
            <div class="card-body">

           
             <div>
             <label for="barcodekerusakan">Barcode * </label>

             </div>

           <div class="form-group input-group">
         
             <input type="hidden" name="item_id" id="item_id">
             <input type="hidden" name="stock_id" id="stock_id">
             <input type="text" name="barcodekerusakancbb" id="barcodekerusakaney" class="form-control" readonly autofocus>
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
                <label>Detail kerusakan</label>
                <input type="text" name="detailkerusakancbb" id="keteranganrusak" class="form-control" readonly>
              </div>
      
              <div class="form-group" required>
                <label>Status</label>
                <select name="perbaikicbb" class="form-control custom-select">
                 
                 
                  <option value="rskperbaikan">Di Perbaiki</option>
               
                </select>
    
              
           
              

              

              <div class="form-group">
                <label>Detail perbaikan/Perawatan*</label>
                <input type="text" name="detailperbaikancbb" class="form-control" required>
              </div>
             
              <div class="form-group">
                <label>Tanggal diperbaiki * </label>
                <input type="date" name="tanggaldiperbaikicbb" value="<?=date('Y-m-d')?>" class="form-control" > <!--type= adalah model form e , sedangkan name=nama yg akan dihubungkan ke database -->
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
                    <th style="width: 5px">#</th>
                    <th>Barcode kerusakan</th>                    
                    <th>Product Item</th>                    
                    <th>detail kerusakan</th>
                    <th>TGL.RUSAK</th>
                    
                    <th>Pilih</th>
                    
                    </tr>
             </thead>
             <tbody>
              
             <?php $no =1; foreach($row as $i => $data) { ?>
                <tr>
                <td><?=$no++?></td>
                <td><?=$data->barcodekerusakan?></td>
                        <td><?=$data->item_name?></td>                    
                    <td><?=$data->keteranganrusak?></td>
                    <td><?=indo_date($data->date)?></td>
                    
                        <td class="text-right">
                            <button class="btn btn-xs btn-info" id="select"
                                data-id="<?=$data->stock_id?>"
                                data-item_id="<?=$data->item_id?>"
                                data-barcodekerusakaney="<?=$data->barcodekerusakan?>"
                                data-keteranganrusakey="<?=$data->keteranganrusak?>"
                                data-nameney="<?=$data->item_name?>"
                                data-qtyney="<?=$data->qty?>"
                                
                                >
                               
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
        var barcodekerusakan =$(this).data('barcodekerusakaney');
        var name =$(this).data('nameney');
        var keteranganrusak =$(this).data('keteranganrusakey');
        var namapeminjam = $(this).data('namapeminjamey');
        var kondisibarang = $(this).data('kondisibarangey');
        
        
        $('#peminjam_id').val(peminjam_id);
        $('#item_id').val(item_id);
        $('#barcodekerusakaney').val(barcodekerusakan); //ey kunci menampilkan ke comboboc, sedangkan combobox akan menampilkan ke query
        $('#iteme_name').val(name);
        $('#keteranganrusak').val(keteranganrusak);
        $('#namapeminjamcbb').val(namapeminjam);
        

        $('#kondisibarangecbb').val(kondisibarang);

        $('#modal-item').modal('hide');
        $('#modal-backdrop').modal('hide');
    })
})
    </script>


    