

<section class="content">

      <div class="box">
       <div class="box-header">
              <h3 class="card-header"> Pemasok barange = item</h3>
            </div>
            <!-------------------------MEnambahkan buton-------------------->
            <div class="btn pull-right">
              <a href="<?=site_url('item/tambah')?>" class="btn btn-primary">
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
                    <th>Barcode</th>
                    <th>Nama</th>
                    <th>kategori</th>
                    <th>Unit</th>
                    <th>harga</th>
                    <th>Stock</th>
                    <th>Gambar</th>
                    <th>Lokasi</th>
                    
                    <th>Aksi</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $no =1;
                  foreach($row->result() as $key => $tampilno){  ?>
                   <tr>
                    <td><?=$no++?>.</td>
                    <td><?=$tampilno->barcode?></td>
                    <td><?=$tampilno->name?></td>
                    <td><?=$tampilno->kategori_name?></td>
                    <td><?=$tampilno->unite_name?></td>
                    <td class="text-right"> <?=indo_currency($tampilno->price)?> </td>
                    <td><?=$tampilno->stock?></td>
                    
                    <td>
                      <?php if($tampilno->image != null) { ?>
                        <img src="<?=base_url('uploads/product/'.$tampilno->image)?>" style="width:100px">
                      <?php } ?>
                      <td><?=$tampilno->lokasi?></td>
                    </td>
                       <td>

                      <!--------------------------------------------MEMBUAT----------------------------------------BTN--EDIT--HAPUYS START--------------------------->
                      <div class="card-btn">
              <a class="btn btn-info btn-sm" href="<?=site_url('item/edit/'.$tampilno->item_id)?>" >  <!--$tampilno kwi dari 1 form ini--------------------------->
                              
                              </i>
                              Edit
                              </a>
                      <a class="btn btn-danger btn-sm" href="<?=site_url('item/hapus/'.$tampilno->item_id)?>"onclick="return confirm('Yakin hapus data?')">
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
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
              </ul>
            </div>
          </div>

                </tbody>
              </table>
         
  </section>