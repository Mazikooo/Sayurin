

        <!-- page content -->

          <!-- page content -->
          <div class="right_col" role="main">
            <div class="">
              <div class="page-title">
                <div class="title_left">
                 
                </div>
  
               <!-- page content  <div class="title_right">
                  <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                      </span>
                    </div>
                  </div>
                </div>-->

              </div>
  
  
  
                
                
                
                <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Menu Kategori</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                
                
                <div class="x_content">
                <?php echo $this->session->flashdata('not'); ?>
                                              <a href="<?php echo site_url('Dashboard_penjual/addKat');?>" class="btn btn-mat waves-effect waves-light btn-primary mb-3">Tambah Kategori</a>


<div class="table-responsive">
  <table class="table table-striped jambo_table bulk_action">
    <thead>
      <tr class="headings">
        <tr>
    <th style="width: 5%;">#</th>
    <th style="width: 15%;">Jenis Kategori</th>
   
    <th style="width: 10%;">Aksi</th>
                          </tr>
        
    </thead>

    <tbody>
    <?php 
                         $no=1;
                          foreach($kategori as $val){ ?>

                           <tr>
                             <th><?php echo $no;?></th>
                             <th><?php echo $val->NamaKategori;?></th>
                            
                           
                             
                                                            
                            <th>
                    <a href="<?php echo site_url('admin/get_by_id/'.$val->ID_Kategori);?>" type="button" class="btn btn-mat waves-effect waves-light btn-success">Ubah</a>
                    <a href="#" onclick="showSweetAlert('<?php echo $val->ID_Kategori; ?>');" type="button" class="btn btn-mat waves-effect waves-light btn-danger">Hapus</a>
                    
                       </div>                          
                        </th>
                        </tr>
                        <?php $no++ ; }?>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function showSweetAlert(ID_Kategori) {
            Swal.fire({
                title: 'Yakin hapus data ini?',
                text: "Anda tidak dapat mengembalikan data yang telah dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengklik "Ya", maka hapus data
                    window.location.href = "<?php echo site_url('Dashboard_penjual/deleteKat/');?>" + ID_Kategori;
                }
            });
        }
    </script>
      
    </tbody>
  </table>
</div>
        
    
</div>
             
              </div>
            </div>
          </div>
          <!-- /page content -->

    
      </div>
    </div>
