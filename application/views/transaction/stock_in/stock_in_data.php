
 <section class="content-header">
 <div class="box-header">
                <h3 class="box-title">Stock in Barang masuk / pembelian</h3>
              </div>
              <!-------------------------MEnambahkan buton-------------------->
              <div class="card-body">
        <div class="col-md-4 col-md-offset-4">
          <a href="<?=site_url('')?>" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
 

<div class="box">
<div class="btn pull-right">
              <a href="<?=base_url('stock/in/add')?>" class="btn btn-primary">
              Tambah
                </a>     
              </div>
      
</div>
       

  
<div class="card table-responsive">
              <!--=================================== NAMPILNE HASIL RESULT DATABASE  ----------------------------------------------------->
              <table class="table table-bordered" id="table1">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Barcode</th>
                    <th>Product Item</th>
                    <th>Quantyty</th>
                    <th>keterangan</th>
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
                      <div class="card-btn">
              <a class="btn btn-primary btn-sm">  <!--$tampilno kwi dari 1 form ini--------------------------->
                              
                              </i>
                              Details
                              </a>
                      <a class="btn btn-danger btn-sm" href="<?=site_url('stock/in/del/'.$data->stock_id.'/'.$data->item_id)?>"onclick="return confirm('Yakin hapus data?')">
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