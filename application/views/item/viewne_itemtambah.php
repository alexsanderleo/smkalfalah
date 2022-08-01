


<div class="box">
         <div class="box-header">
                <h3 class="box-title"><?=ucfirst($page)?> data iteme</h3>
              </div>
              <!-------------------------MEnambahkan buton-------------------->
              <div class="card-body">
        <div class="col-md-4 col-md-offset-4">
          <a href="<?=site_url('item')?>" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
            
      
 <!-------------------------END-------MEnambahkan buton-------------------->
 
 <section class="content">


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


            <?php echo form_open_multipart('item/process')?>
            <?php $this->view('messages')?>  
            <div class="card-body">

            <div class="form-group">
                <label>Barcode * </label>
                <input type="hidden" name="id" value="<?=$row->item_id?>">
                <input type="text" name="barcodete" value="<?=$row->barcode?>" class="form-control" required> <!--type= adalah model form e , sedangkan name=nama yg akan dihubungkan ke database -->
               
              </div>

              <div class="form-group">
                <label>Kategori  </label>
               <select name="category" class= "form-control"> <!--<select name="category" adalah harus disamakan dengan name database --> 
                <option value="">- Pilih -</option>
                <?php foreach($category->result() as $key => $data) { ?>
                  <option value="<?=$data->category_id?>" <?=$data->category_id == $row->category_id ? "selected" : null?>><?=$data->name?></option>
                <?php } ?>
               </select>
              </div>
              <div class="form-group">
                <label>Unit  </label>
                <select name="unit" class= "form-control"> <!--<select name="unit" adalah harus disamakan dengan name database --> 
                <option value="">- Pilih -</option>
                <?php foreach($unit->result() as $key => $data) { ?>
                  <option value="<?=$data->unit_id?>"<?=$data->unit_id == $row->unit_id ? "selected" : null?>><?=$data->name?></option>
                <?php } ?>
               </select>
              </div>
              <div class="form-group">
                <label>Nama  </label>
                <input type="text" name="jenenge" value="<?=$row->name?>" class="form-control" required> <!--type= adalah model form e , sedangkan name=nama yg akan dihubungkan ke database --> 
              </div>
             
              <div class="form-group">
                <label>Harga </label>
                <input type="number" name="rego" value="<?=$row->price?>" class="form-control" required> <!--type= adalah model form e , sedangkan name=nama yg akan dihubungkan ke database -->
               
              </div>
              
              <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="lokasine" value="<?=$row->lokasi?>" class="form-control" required> <!--type= adalah model form e , sedangkan name=nama yg akan dihubungkan ke database --> 
              </div>
             
             
              <div class="form-group">
                <label>Gambar </label>
                <?php if($page == 'edit') {
                  if($row->image != null) { ?>
                  <div>
                    <img src="<?=base_url('uploads/product/'.$row->image)?>" style="width:60%">
                  </div>
                    <?php
                  }
                }?>
                <input type="file" name="image"  class="form-control" > <!--type= adalah model form e , sedangkan name=nama yg akan dihubungkan ke database -->
               
              </div>
                
                  <div class="box">
                    
                <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">Save</button>
                <?php $this->view('messages')?>  
                <button type="reset" class="btn btn-flat">reset</button>
              </div>

              <?php  echo form_close()?>
    </section>