<h3 class="card-header"> Pemasok barange = supplier</h3>
<i class="fa-thin fa-person-circle-plus"></i>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card card-primary card-outline">
<div class="card-header">
<h3 class="card-title">
<i class="fas fa-edit"></i>
Actions
</h3>
</div>
<section class="content">
      
      <div class="box">
       <div class="box-header">
            
            </div>
            <!-------------------------MEnambahkan buton-------------------->
            <div class="btn pull-right">
              <a href="<?=site_url('supplier/tambah')?>" class="btn btn-primary">
              <i class="fas fa-plus"></i> Tambah
          
                </a>     
              </div>

              <div class="btn pull-right">
              <a href="<?=site_url('homeimport')?>" class="btn btn-primary">
              <i class="fas fa-file-import"></i> Import
              Tambah form insert
                </a>     
              </div>

              
        <!-- Import Button -->
        <a data-toggle="modal" data-target="#modalImport" class="btn btn-sm btn-success">
            <i class="fas fa-file-import"></i> Import
        </a>

        <!-- Export Button -->
        <a data-toggle="modal" data-target="#modalExport" class="btn btn-sm btn-primary">
            <i class="fas fa-download"></i> Export
        </a>


</div>
</section>




              
       
  <!-- Content Page -->
<div class="container">
<!-------------------------END-------MEnambahkan buton-------------------->

<!-- ----------------------------------------------------------------------START IMPORT---------------------------------------------------------------------------- -->
<!-- Modal Import Excel ---------------------------------------------->
<div id="modalImport" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= site_url('homeimport/import_excel') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mb-3">

                    <!-- Upload File -->
                    <input name="uploadFile" class="form-control mb-1" type="file" accept=".xls,.xlsx,.csv" required>

                    <!-- Download Template -->
                    <a href="<?= base_url('assets/sekosc/excel/formatsupplier.xlsx') ?>" class="float-right" download>Download Template</a>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Export Excel ------------------------------------------------------------------------------>
<div id="modalExport" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="<?= site_url('homeimport/export_excel') ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Export to Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- Filter -->
                    <select id="filter" name="filter" class="form-control">
                        <option value="0">All Data</option>
                        <option value="1">Specific Date</option>
                    </select>

                    <!-- Date -->
                    <input id="filter-date" name="date" value="<?= date('Y-m-d') ?>" class="form-control mt-3 d-none" type="date">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>





   

            </tbody>

        </table>
    </div>

</div>

<!-- ----------------------------------------------------------------------END IMPORT---------------------------------------------------------------------------- -->

            
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
<!-- Filter tanggal -->
<script>
    $(document).on('change', '#filter', function(e){  
        var optionSelected = $(this).find("option:selected");
        var valueSelected  = optionSelected.val();
        var textSelected   = optionSelected.text();

        if(valueSelected == 1) {
            $('#filter-date').removeClass('d-none');
        } else {
            $('#filter-date').addClass('d-none');
        }
    });
</script>
  
