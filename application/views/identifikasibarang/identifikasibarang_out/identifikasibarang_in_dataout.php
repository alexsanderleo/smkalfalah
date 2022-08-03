
 <section class="content-header">
 <div class="box-header">
                <h3 class="box-title">identifikasi kerusakan barang</h3>
              </div>
              <!-------------------------MEnambahkan buton-------------------->
              <div class="card-body">
        <div class="col-md-4 col-md-offset-4">
          <a href="<?=site_url('identifikasibarang/out')?>" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
 

<div class="box">
<div class="btn pull-right">
              <a href="<?=base_url('identifikasibarang/in/addout')?>" class="btn btn-primary">  <!--controler e -->
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
                    <th>Nama barang</th>
                    <th>Quantyty</th>
                    <th>keterangan</th>
                    <th>Tanggal rusak</th>
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
                    
                    <td><?=$data->detail?></td>
                    <td><?=indo_date($data->date)?></td>
                    
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