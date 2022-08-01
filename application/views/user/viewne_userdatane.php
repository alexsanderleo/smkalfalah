

<section class="content">
      
        <div class="box">
         <div class="box-header">
                <h3 class="card-header">Data user login</h3>
              </div>
              <!-------------------------MEnambahkan buton-------------------->
              
              <div class="btn pull-left">
              <a href="<?=site_url('userdatane/add')?>" class="btn btn-primary">
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
                      <th>username</th>
                      <th>password</th>
                      <th>nama panggilan</th>
                      <th>alamat</th>
                      <th>level</th>
                      <th>Aksi</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no =1;
                    foreach($row->result() as $key => $tampilne){  ?>
                     <tr>
                      <td><?=$no++?>.</td>
                      <td><?=$tampilne->username?></td>
                      <td><?=$tampilne->password?></td>
                      <td><?=$tampilne->name?></td>
                      <td><?=$tampilne->address?></td>
                      <td><?=$tampilne->level== 1 ? "Admin": "" ?><?=$tampilne->level== 2 ? "Kasir": "" ?><?=$tampilne->level== 3 ? "Walikelas": ""  ?><?=$tampilne->level== 4 ? "Kaproge": ""  ?>  </td>
                        <td>

                        <!--------------------------------------------MEMBUAT----------------------------------------BTN--EDIT--HAPUYS START--------------------------->
                        <form action="<?=site_url('userdatane/del')?>" method="post">  <!------BTN--EDIT--HAPUYS START--------------------------->
                        <div class="card-btn">
              <a class="btn btn-info btn-sm" href="<?=site_url('userdatane/edit/'.$tampilne->user_id)?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                              </a>
                        <input type="hidden" name="user_id" value="<?=$tampilne->user_id?>">
                        <button onclick="return confirm('Apakah Anda Yakin ?')"class="btn btn-danger btn-sm">
                        
                        <i class="fas fa-trash">
                        </i>
                        Hapus
                        </button>
                        
                        </a>    
                        </form>            

                        </div>     
                    </td>
                                        
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