

<section class="content">
      
      <div class="box">
       <div class="box-header">
              <h3 class="card-header"> Pemasok barange = customer</h3>
            </div>
            <!-------------------------MEnambahkan buton-------------------->
            <div class="btn pull-right">
              <a href="<?=site_url('customer/tambah')?>" class="btn btn-primary">
              Tambah
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
                    <th>Jenis kelamin</th>
                    <th>Phone</th>
                    <th>Alamat</th>
                    
                    <th>Aksi</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $no =1;
                  foreach($row->result() as $key => $tampilno){  ?>
                   <tr>
                    <td><?=$no++?>.</td>
                    <td><?=$tampilno->name?></td>
                    <td><?=$tampilno->gender?></td>
                    <td><?=$tampilno->phone?></td>
                    <td><?=$tampilno->address?></td>
                    
                       <td>

                      <!--------------------------------------------MEMBUAT----------------------------------------BTN--EDIT--HAPUYS START--------------------------->
                      <div class="card-btn">
              <a class="btn btn-info btn-sm" href="<?=site_url('customer/edit/'.$tampilno->customer_id)?>" onclick="return confirm('Yakin edit data?')">  <!--$tampilno kwi dari 1 form ini--------------------------->
                              
                              </i>
                              Edit
                              </a>
                      <a class="btn btn-danger btn-sm" href="<?=site_url('customer/hapus/'.$tampilno->customer_id)?>"onclick="return confirm('Yakin hapus data?')">
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