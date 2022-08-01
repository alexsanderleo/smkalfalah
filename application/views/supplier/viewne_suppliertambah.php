

<section class="content">
<div class="box">
         <div class="box-header">
                <h3 class="box-title"><?=ucfirst($page)?> data suppliere</h3>
              </div>
              <!-------------------------MEnambahkan buton-------------------->
              <div class="card-body">
        <div class="col-md-4 col-md-offset-4">
          <a href="<?=site_url('supplier')?>" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
            
      
 <!-------------------------END-------MEnambahkan buton-------------------->
            
                  
                    
                  <div class="box">
                  <div class="col-md-4 col-md-offset-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Silahkan isi semua form</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>


            <form action="<?=site_url('supplier/process')?>" method="post">    
            <div class="card-body">

            <div class="form-group">
                <label>Nama supplier * </label>
                <input type="hidden" name="id" value="<?=$row->supplier_id?>">
                <input type="text" name="jenenge" value="<?=$row->name?>" class="form-control" required> <!--type= adalah model form e , sedangkan name=nama yg akan dihubungkan ke database -->
               
              </div>

              <div class="form-group">
                <label>HP </label>
                <input type="text" name="tilpune" value="<?=$row->phone?>"class="form-control"required>
              
              </div>

              <div class="form-group">
                <label>Alamat </label>
                <input type="text" name="alamate" value="<?=$row->address?>"class="form-control"required>
              
              </div>

              
              <div class="form-group">
                <label>Deskripsi </label>
                <textarea name="descr" class="form-control"><?=$row->description?></textarea>
              
              </div>

              
             

                
                  <div class="box">
                    
                <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">Save</button>
                <button type="reset" class="btn btn-flat">reset</button>
              </div>

              </form>  
    </section>