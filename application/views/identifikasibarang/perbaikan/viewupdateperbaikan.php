
 <section class="content-header">

 

<div class="box">
         <div class="box-header">
                <h3 class="box-title">Perawatan / Perbaikan barang</h3>
              </div>
              <!-------------------------MEnambahkan buton-------------------->
              <div class="card-body">
        <div class="col-md-4 col-md-offset-4">
          <a href="<?=site_url('identifikasibarang/out')?>" class="btn btn-secondary">Kembali</a>
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

           
            

           <div class="form-group input-group">
         
          
             <input type="hidden" name="stock_id"  value="<?=$row->stock_id?>" >  <!-----get relasi dua tabel dan disimpen-------------------->
             <input type="hidden" name="item_id" value="<?=$row->item_id?>" >
             <input type="hidden" name="barcodekerusakancbb" value="<?=$row->barcodekerusakan?>" class="form-control" required>
             <input type="hidden" name="barcodete" value="<?=$row->barcode?>" class="form-control" required>
             </div>

              <div class="form-group">
                <label>Nama Barang item * </label>
                <input type="text" name="iteme_name" value="<?=$row->item_name?>" id="iteme_name" class="form-control" readonly>
              </div>

              <div class="form-group">
                <label>tanggal kerusakan* </label>
                <input type="text" name="date" value="<?=$row->date?>" class="form-control" readonly>
              </div>


           
              <div class="form-group">
                <label>Detail kerusakan</label>
                <input type="text" name="detailkerusakancbb" value="<?=$row->keteranganrusak?>" class="form-control" readonly>
              </div>
      
              <div class="form-group" readonly>
                <label>Status</label>
                <input type="perbaikicbb" value="perawatan" class="form-control" readonly>
              </div>
              
           
              

              

              <div class="form-group">
                <label>Detail perbaikan/Perawatan*</label>
                <input type="text" name="detailperbaikancbb" value="<?=$row->detailperbaikan?>"class="form-control" required>
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
              
</div>
</div>
</div>
</div>
</section>  
   



    

    