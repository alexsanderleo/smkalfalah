
 <section class="content-header">
 <div class="box-header">
                <h3 class="box-title">Barang di pinjamkan</h3>
              </div>
              <!-------------------------MEnambahkan buton-------------------->
              <div class="card-body">
        <div class="col-md-4 col-md-offset-4">
          <a href="<?=site_url('')?>" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
 

<div class="box">
<div class="btn pull-right">
              <a href="<?=base_url('pinjam/in/add')?>" class="btn btn-primary">
              Tambah Pinjaman baru
                </a>     
              </div>
      
</div>

<div class="box">
<div class="btn pull-right">
              <a href="<?=base_url('pinjam/edit/')?>" class="btn btn-primary">
              Kembalikan pinjaman
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
                    <th>Nama peminjam</th>
                    <th>Quantyty</th>
                    <th>Kondisi barang</th>
                    <th>TGL.PINJAM</th>
                    <th>TGL.KEMBALI</th>
                    <th>Status barang di</th>
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
                    <td><?=$data->namapeminjam?></td>
                    <td><?=$data->qty?></td>
                    <td><?=$data->kondisibarang?></td>
                    <td><?=indo_date($data->tanggalpinjam)?></td>
                    <td><?=indo_date($data->tanggaldikembalikan)?></td>
                    <td><?=$data->status?></td>
                       <td>

                      <!--------------------------------------------MEMBUAT----------------------------------------BTN--EDIT--HAPUYS START--------------------------->
                      <div class="card-btn">
              <a class="btn btn-primary btn-sm" href="<?=site_url('pinjam/edit/'.$data->peminjam_id)?>" onclick="return confirm('Yakin edit data?')" >  <!--$tampilno kwi dari 1 form ini--------------------------->
                              
                              </i>
                              Kembalikan barang pinjam
                              </a>
                      <a class="btn btn-danger btn-sm" href="<?=site_url('pinjam/in/del/'.$data->peminjam_id.'/'.$data->item_id)?>"onclick="return confirm('Yakin akan mengembalikan pinjaman?')">
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