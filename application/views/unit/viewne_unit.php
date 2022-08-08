<h3 class="card-header">Data Satuan Unit</h3>
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
                  <div class="btn btn-sm">
              <a href="<?=site_url('unit/tambah')?>" class="btn btn-primary">
              <i class="fas fa-plus"></i> Tambah
                </a>     
              </div>
</div>
</section>
<div class="container">
    </div>
</div>
 </div>
<div class="container">
    </div>
</div>







            
            <div class="card table-responsive">
              <!--=================================== NAMPILNE HASIL RESULT DATABASE <?php print_r($row->result()) ?> ----------------------------------------------------->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
<!-- ----------------------------------------------------------------------ENDING LAYOUT RAPI ALX---------------------------------------------------------------------------- -->
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
              <a class="btn btn-info btn-sm" href="<?=site_url('unit/edit/'.$tampilno->unit_id)?>" onclick="return confirm('Yakin edit data?')">  <!--$tampilno kwi dari 1 form ini--------------------------->
                              
                              </i>
                              Edit
                              </a>
                      <a class="btn btn-danger btn-sm" href="<?=site_url('unit/hapus/'.$tampilno->unit_id)?>"onclick="return confirm('Yakin hapus data?')">
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
            <!-- /.card-body -->
            
          </div>

                </tbody>
              </table>
         
  </section>