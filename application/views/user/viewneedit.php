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
            <div class="card-body">
                
            
        <form action="" method="post">    
            <div class="form-group <?=form_error('jenenge') ? 'has-error' : null?>">
                <label>Name * </label>
                <input type="hidden" name="user_id" value="<?=$row->user_id?>">
                <input type="text" name="jenenge" value="<?=$this->input->post('jenenge') ?? $row->name?>" class="form-control"> <!--type= adalah model form e , sedangkan name=nama yg akan dihubungkan ke database -->
                <?=form_error('jenenge')?>
              </div>

              <div class="form-group<?=form_error('usernamee') ? 'has-error' : null?>">
                <label>Username </label>
                <input type="text" name="usernamee" value="<?=$this->input->post('usernamee') ?? $row->username?>"class="form-control">
                <?=form_error('usernamee')?>
              </div>

              <div class="form-group<?=form_error('password') ? 'has-error' : null?>">
                <label>Password </label>
                <input type="password" name="password" value="<?=$this->input->post('password') ?? $row->password?>" class="form-control">
                <?=form_error('password')?>
              </div>

             

              <div class="form-group<?=form_error('alamatnya') ? 'has-error' : null?>">
                <label>Alamat</label>
                <input type="text" name="alamatnya" value="<?=$this->input->post('alamatnya') ?? $row->address?>" class="form-control">
                
                <?=form_error('alamatnya')?>
              </div>
             
              <div class="form-group<?=form_error('levele') ? 'has-error' : null?>">
                <label>Level</label>
                <select name="levele" value="<?=$this->input->post('levele') ?? $row->level?>" class="form-control custom-select">
                <?php $level =$this->input->post('levele') ?$this->input->post('levele') :   $row->level?>
                  <option value="1"<?=$level == 1 ? 'selected' : null?>>Admin</option>
                  <option value="4"<?=$level == 4 ? 'selected' : null?>>Kaprog</option>
                  <option value="3"<?=$level == 3 ? 'selected' : null?>>Walikelas</option>
                  <option value="2" <?=$level == 2 ? 'selected' : null?>>kasir</option>
                </select>
                <?=form_error('levele')?>
              </div>
             
     
       
        
           
    
      
                
              <div class="box">
                    
                    <button type="submit" class="btn btn-success btn-flat">Save</button>
                    <button type="reset" class="btn btn-flat">reset</button>
                  </div>
    
                  </form>  
        </section>