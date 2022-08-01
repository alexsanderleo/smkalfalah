

<section class="content">
      
      <div class="box">
       <div class="box-header">
              <h3 class="card-header"> Pemasok barange = supplier</h3>
            </div>
            <!-------------------------MEnambahkan buton-------------------->
            <div class="btn pull-right">
              <a href="<?=site_url('supplier/tambah')?>" class="btn btn-primary">
              Tambah
                </a>     
              </div>

              <div class="btn pull-right">
              <a href="<?=site_url('homeimport')?>" class="btn btn-primary">
              Tambah form insert
                </a>     
              </div>

              
       
  
<!-------------------------END-------MEnambahkan buton-------------------->
            
            <div class="card table-responsive">
              <!--=================================== NAMPILNE HASIL RESULT DATABASE <?php print_r($row->result()) ?> ----------------------------------------------------->
              <table class="table table-bordered" id="table1">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
                    <th>HP</th>
                    <th>alamat</th>
                    <th>deskripsi</th>
                    
                    <th>Aksi</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $no =1;
                  foreach($row->result() as $key => $tampilno){  ?>
                   <tr>
                    <td><?=$no++?>.</td>
                    <td><?=$tampilno->name?></td>
                    <td><?=$tampilno->phone?></td>
                    <td><?=$tampilno->address?></td>
                    <td><?=$tampilno->description?></td>
                    
                       <td>

                      <!--------------------------------------------MEMBUAT----------------------------------------BTN--EDIT--HAPUYS START--------------------------->
                      <div class="card-btn">
              <a class="btn btn-info btn-sm" href="<?=site_url('supplier/edit/'.$tampilno->supplier_id)?>" onclick="return confirm('Yakin edit data?')">  <!--$tampilno kwi dari 1 form ini--------------------------->
                              
                              </i>
                              Edit
                              </a>
                      <a class="btn btn-danger btn-sm" href="<?=site_url('supplier/hapus/'.$tampilno->supplier_id)?>"onclick="return confirm('Yakin hapus data?')">
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