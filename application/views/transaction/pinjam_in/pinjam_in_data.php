<h3 class="card-header">Data Stock/Item</h3>
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
              <a href="<?=site_url('pinjam/in/add')?>" class="btn btn-primary">
              <i class="fas fa-plus"></i> Tambah pinjam
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
              <a class="btn btn-primary btn-sm" href="<?=site_url('pinjam/edit/'.$data->peminjam_id)?>" onclick="return confirm('Yakin akan mengembalikan pinjaman?')" >  <!--$tampilno kwi dari 1 form ini--------------------------->
                              
                              </i>
                              Kembalikan barang pinjam
                              </a>
                      <a class="btn btn-danger btn-sm" href="<?=site_url('pinjam/in/del/'.$data->peminjam_id.'/'.$data->item_id)?>"onclick="return confirm('Yakin akan menghapus pinjaman?')">
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