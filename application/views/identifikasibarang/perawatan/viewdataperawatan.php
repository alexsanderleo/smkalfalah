<h3 class="card-header">Data Perbaikan/perawatan</h3>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card card-primary card-outline">
<div class="card-header">
<h3 class="card-title">

</h3>
</div>
<section class="content">
       <div class="box">
       <div class="box-header">
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
              <!--=================================== NAMPILNE HASIL RESULT DATABASE  ----------------------------------------------------->
              <div class="card-body">
                
              <table class="table table-bordered" id="table1">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Barcode kerusakan</th>
                    <th>Nama barang</th>
                    <th>Keterangan rusak</th>
                    <th>Rusak tanggal</th>
                    <th>Keterangan diperbaiki</th>
                    <th>Diperbaiki tanggal</th>
                    <th>Opsi</th>
                    
                   
                    
                    
                  </tr>
                </thead>
                <tbody>
              
                <?php $no =1;
                  foreach($row as $key => $data){  ?>
                   <tr>
                    <td><?=$no++?>.</td>
                    <td><?=$data->barcodekerusakan?></td>
                    <td><?=$data->item_name?></td>
                    <td><?=$data->keteranganrusak?></td>
                    <td><?=indo_date($data->date)?></td>
                    <td><?=$data->detailperbaikan?></td>
                    <td><?=indo_date($data->diperbaikitanggal)?></td>
                    
                    
                       <td>
                     
                              
                              
                      <!--------------------------------------------MEMBUAT----------------------------------------BTN--EDIT--HAPUYS START--------------------------->
           
                      <a class="btn btn-danger btn-sm" href="<?=site_url('identifikasibarang/in/deldua/'.$data->stock_id.'/'.$data->item_id)?>"onclick="return confirm('Yakin hapus data?')">
                              </i>
                              Delete
                              </a>
                        </i>
           
                    

                      </div>     
                          
                                      
                                          <?php
                                          }?>
                 
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
           
              </ul>
            </div>
          </div>

                </tbody>
              </table>
 <!-------------------------END-------MEnambahkan buton-------------------->
 <section class="content">