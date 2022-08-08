<h3 class="card-header">Data Barang hilang/keluar</h3>
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
              <a href="<?=site_url('stock/in/addout')?>" class="btn btn-primary">
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
              <!--=================================== NAMPILNE HASIL RESULT DATABASE  ----------------------------------------------------->
              <div class="card-body">
              
              <table class="table table-bordered" id="table1">
              
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Barcode</th>
                    <th>Nama Item</th>
                    <th>Jumlah barang hilang/Qty</th>
                    <th>keterangan/catatan</th>
                    <th>Tanggal</th>
                    <th>Opsi</th>
                   
                    
                    
                  </tr>
                </thead>
                <tbody>
              
                <?php $no =1;
                  foreach($row as $key => $data){  ?>
                   <tr>
                    <td><?=$no++?>.</td>
                    <td><?=$data->barcode?></td>
                    <td><?=$data->item_name?></td>
                    <td><?=$data->qty?></td>
                    <td><?=$data->detail?></td>
                    <td><?=indo_date($data->date)?></td>
                    
                       <td>

                      <!--------------------------------------------MEMBUAT----------------------------------------BTN--EDIT--HAPUYS START--------------------------->
           
                      <a class="btn btn-danger btn-sm" href="<?=site_url('stock/in/deldua/'.$data->stock_id.'/'.$data->item_id)?>"onclick="return confirm('Yakin hapus data?')">
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