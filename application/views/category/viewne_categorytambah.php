<section class="content">


<div class="box">
         <div class="box-header">
                <h3 class="box-title"><?=ucfirst($page)?> kategori</h3>
              </div>
              <!-------------------------MEnambahkan buton-------------------->
              <div class="card-body">
        <div class="col-md-4 col-md-offset-4">
        
          <a href="<?=site_url('category')?>" class="btn btn-default"><span class="fa fa-chevron-left"></span>Kembali</button></a>
          
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


            <form action="<?=site_url('category/process')?>" method="post">    
            <div class="card-body">

            <div class="form-group">
                <label>Nama Kategori * </label>
                <input type="hidden" name="id" value="<?=$row->category_id?>">
                <input type="text" name="jenenge" value="<?=$row->name?>" class="form-control" required> <!--type= adalah model form e , sedangkan name=nama yg akan dihubungkan ke database -->
               
              </div>

             
           
              
             

                
                  <div class="box">
                    
                <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">Save</button>
                     
                <button type="reset" class="btn btn-flat">reset</button>
              </div>

              </form>  
    </section>