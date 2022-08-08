<h3 class="card-header">Data Kategori</h3>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card card-primary card-outline">
<div class="card-header">
<h3 class="card-title">

Actions
</h3>
</div>
<section class="content">
      
      <div class="box">
       <div class="box-header">
            
            </div>
            <!-------------------------MEnambahkan buton-------------------->
            <div class="btn btn-sm">
              <a href="<?=site_url('category/tambah')?>" class="btn btn-primary">
              <i class="fas fa-plus"></i> Tambah
          
                </a>     
              </div>


         


</div>
</section>

<div class="container">

    </div>

</div>
              
         
</h3>
</div>


<div class="container">

    </div>

</div>


 <!-- Content Page -->

<!-------------------------END-------MEnambahkan buton-------------------->

<!-- ----------------------------------------------------------------------START IMPORT---------------------------------------------------------------------------- -->


<!-------------------------END-------MEnambahkan buton-------------------->
            
            <div class="card table-responsive">
              <!--=================================== NAMPILNE HASIL RESULT DATABASE <?php print_r($row->result()) ?> ----------------------------------------------------->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
              
                
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $no =1;
                  foreach($row->result() as $key => $tampilno){  ?>
                   <tr>
                    <td><?=$no++?>.</td>
                    <td><?=$tampilno->name?></td>
                    
                       <td>

                      <!--------------------------------------------MEMBUAT----------------------------------------BTN--EDIT--HAPUYS START--------------------------->
                      <div class="card-btn">
              <a class="btn btn-info btn-sm" href="<?=site_url('category/edit/'.$tampilno->category_id)?>" onclick="return confirm('Yakin edit data?')">  <!--$tampilno kwi dari 1 form ini--------------------------->
                              
                              </i>
                              Edit
                              </a>
                      <a class="btn btn-danger btn-sm" href="<?=site_url('category/hapus/'.$tampilno->category_id)?>" id="btn-hapus">
                              </i>
                              Delete
                              </a>
                        </i>
           
                    

                      </div>     
                          
                                      
                                          <?php
                                          }?>

                 <!--------------------------------------------ENDDDD------------------------------------MEMBUAT--BTN--EDIT--HAPUYS START--------------------------->
                 
                 </tbody>
              </table>
            </div>         
          </div>
           
         
  </section>

