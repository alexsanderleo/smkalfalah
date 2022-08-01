
 <section class="content-header">

 

<div class="box">
         <div class="box-header">
                <h3 class="box-title">Tambah pinjaman baru</h3>
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
              <h3 class="card-title">Silahkan isi semua foram</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>


            <form action="<?=site_url('pinjam/process')?>" method="post">    
            <div class="card-body">

            <div class="form-group">
                <label>Tanggal pinjam * </label>
                <input type="date" name="tanggaldipinjam" value="<?=date('Y-m-d')?>" class="form-control" required> <!--type= adalah model form e , sedangkan name=nama yg akan dihubungkan ke database -->
              </div>

             <div>
             <label for="barcode">Barcode * </label>

             </div>

           <div class="form-group input-group">
             <input type="hidden" name="item_id" id="item_id">
             <input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
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
                <div class="row">
                    <div class="col-md-8">
                        <label for="unit_name">Unit name</label>
                        <input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
                    </div>
                    <div class="col-md-8">
                        <label for="stock">Sisa Stock</label>
                        <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label>Nama peminjam * </label>
                <input type="text" name="namapeminjame" id="namapeminjame" class="form-control" required>
              </div>
      
              <div class="form-group" required>
                <label>Statuse</label>
                <select name="statuse" class="form-control custom-select">
                 
                  <option value="P">Di Pinjamkan</option>
                 
               
                </select>
    
              
           
              <div class="form-group">
                <label>Qty *</label>
                <input type="text" name="qty"  class="form-control" required>
              </div>

              <div class="form-group">
                <label>NIK *</label>
                <input type="text" name="nike"  class="form-control" required>
              </div>

              <div class="form-group">
                <label>Kondisi barang saat dipinjamkan*</label>
                <input type="text" name="kondisibarange"  class="form-control" required>
              </div>
             
              <div class="form-group">
                <label>Tanggal dikembalikan * </label><span>kosongkan jika tidak tentu tgl dikembalikan</span>
                <input type="text" name="tanggaldikembalikan"  class="form-control" > <!--type= adalah model form e , sedangkan name=nama yg akan dihubungkan ke database -->
              </div>

                
                  <div class="form-group">
                    
                <button type="submit" name="in_add" class="btn btn-success btn-flat">Save</button>
            
                <button type="reset" class="btn btn-flat">reset</button>
              </div>

              </form>  
 </section>                
              <div class="modal fade" id="modal-item">
    <div class="modal-dialog">
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
                       <th> Barcode</th>
                       <th> Name</th>
                       <th> Unit</th>
                       <th> Price</th>
                       <th> Stock</th>
                       <th> Actions</th>
                    </tr>
             </thead>
             <tbody>
             <?php foreach($item as $i => $data) { ?>
                <tr>
                        <td> <?=$data->barcode?> </td>
                        <td> <?=$data->name?> </td>
                        <td> <?=$data->unite_name?> </td>
                        <td class="text-right"> <?=indo_currency($data->price)?> </td>
                        <td class="text-right"> <?=$data->stock?> </td>
                        <td class="text-right">
                            <button class="btn btn-xs btn-info" id="select"
                                data-id="<?=$data->item_id?>"
                                data-barcode="<?=$data->barcode?>"
                                data-name="<?=$data->name?>"
                                data-unit="<?=$data->unite_name?>"
                                data-stock="<?=$data->stock?>">
                               
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
        var item_id =$(this).data('id');
        var barcode =$(this).data('barcode');
        var name =$(this).data('name');
        var unite_name = $(this).data('unit');
        var stock = $(this).data('stock');
        
        $('#item_id').val(item_id);
        $('#barcode').val(barcode);
        $('#iteme_name').val(name);
        $('#unit_name').val(unite_name);
        $('#stock').val(stock);
        $('#modal-item').modal('hide');
        $('#modal-backdrop').modal('hide');
    })
})
    </script>


    