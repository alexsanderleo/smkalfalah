<section class="content">


<div class="box">
         <div class="box-header">
              <h3> Tambah barang hilang/keluar</h3>
              </div>
              <!-------------------------MEnambahkan buton-------------------->
              <div class="card-body">
        <div class="col-md-4 col-md-offset-4">
        
          <a href="<?=site_url('category')?>" class="btn btn-default"><span class="fa fa-chevron-left"></span>Kembali</button></a>
          
        </div>
      </div>



                  <div class="box">
                  <div class="col-lg-6" style="float:none;margin:auto;">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Silahkan isi semua form</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>


            <form action="<?=site_url('stock/processdua')?>" method="post">    
            <div class="card-body">

            <div class="form-group">
                <label>Date * </label>
                <input type="date" name="tanggale" value="<?=date('Y-m-d')?>" class="form-control" required> <!--type= adalah model form e , sedangkan name=nama yg akan dihubungkan ke database -->
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
                <label>Item Name * </label>
                <input type="text" name="iteme_name" id="iteme_name" class="form-control" readonly>
              </div>


             <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <label for="unit_name">Unit name</label>
                        <input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
                    </div>
                    <div class="col-md-8">
                        <label for="stock">Initial stockawal</label>
                        <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                    </div>
                </div>
              </div>

      

              <div class="form-group">
                <label>Details/Catatan * </label>
                <input type="text" name="detail"  class="form-control" placeholder="rusak / dibuang / guwak" >
              </div>
    
             
           
              <div class="form-group">
                <label>Jumlah barang hilang/Qty *</label>
                <input type="text" name="qty"  class="form-control" required>
              </div>
             

                
                  <div class="form-group">
                    
                <button type="submit" name="out_add" class="btn btn-success btn-flat">Save</button>
            
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


    