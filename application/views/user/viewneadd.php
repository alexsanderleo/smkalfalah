

<section class="content">
<div class="box">
         <div class="box-header">
                <h3 class="box-title">Tambah data userlogin</h3>
              </div>
              <!-------------------------MEnambahkan buton-------------------->
              <div class="card-body">
        <div class="col-md-4 col-md-offset-4">
          <a href="<?=site_url('userdatane')?>" class="btn btn-secondary">Kembali</a>
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
            <form action="" method="post">    
            <div class="card-body">
                
            
        
            <div class="form-group <?=form_error('jenenge') ? 'has-error' : null?>">
                <label>Name * </label>
                <input type="text" name="jenenge" class="form-control"> <!--type= adalah model form e , sedangkan name=nama yg akan dihubungkan ke database -->
                <?=form_error('jenenge')?>
              </div>

              <div class="form-group<?=form_error('usernamee') ? 'has-error' : null?>">
                <label>Username </label>
                <input type="text" name="usernamee" class="form-control">
                <?=form_error('usernamee')?>
              </div>

              <div class="form-group<?=form_error('password') ? 'has-error' : null?>">
                <label>Password </label>
                <input type="password" name="password" class="form-control">
                <?=form_error('password')?>
              </div>

              <div class="form-group<?=form_error('passconf') ? 'has-error' : null?>">
                <label>Konfirmasi password * </label>
                <input type="password" name="passconf" class="form-control">
                <?=form_error('passconf')?>
              </div>

              <div class="form-group<?=form_error('alamatnya') ? 'has-error' : null?>">
                <label>Alamat</label>
                <textarea name="alamatnya" class="form-control" rows="1"></textarea>
                <?=form_error('alamatnya')?>
              </div>
             
              <div class="form-group<?=form_error('levele') ? 'has-error' : null?>">
                <label>Level</label>
                <select name="levele" class="form-control custom-select">
                  <option selected="" disabled="">Pilih levele sek</option>
                  <option value="1">Admin</option>
                  <option value="4">Kaprog</option>
                  <option value="3">Walikelas</option>
                  <option value="2">kasir</option>
                </select>
                <?=form_error('levele')?>
              </div>
             
     
       
        
       
    
                
                  <div class="box">
                    
                <button type="submit" class="btn btn-success btn-flat">Save</button>
                <button type="reset" class="btn btn-flat">reset</button>
              </div>

              </form>  
    </section>