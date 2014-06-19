<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
        <!--<h2>Aplikasi<small>  Kasir KSD</small></h2>-->
        <br>
          <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Stok Menu 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               
            </li>
          </ol>

   <div class="row">
      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading"> Transaksi KSD
              <div class="pull-right">
              <a href='<?php echo site_url('dashboardAdmin/tambah_popup/');?>'>
              <button type="button" class="btn btn-warning btn-xs" >
               Tambah
                  <span class="caret"></span>
              </button>
              </a>
            </div>
          </div>
            <div class="panel-body">
                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Pemesan</th>
                                            <th>Tanggal</th>
                                            <th>Total</th>
                                            <th>Tujuan</th>
                                            <th>Daerah Antar</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no=1;
                                      foreach($transaksi as $rowtransaksi){
                                      ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $rowtransaksi->pemesan_transaksi;?></td>
                                            <td><?php echo $rowtransaksi->date_transaksi;?></td>
                                            <td><?php echo $rowtransaksi->jumlah_transaksi;?></td>
                                            <td><?php echo $rowtransaksi->tujuan_transaksi;?></td>
                                            <td><?php echo $rowtransaksi->daerah_antar_transaksi;?></td>
                                            
                                            
                                            <td><a href="<?php echo site_url('dashboardAdmin/hapus_transaksi/'.$rowtransaksi->id."/".$rowtransaksi->id_transaksi);?>"> Hapus</td>
                                        </tr>
                                     <?php
                                     $no++;
                                      }
                                      ?>  
                                    </tbody>
                                </table>
                  </div>
            </div>
          </div>

        </div>
      </div>
        </div>
      </div>
    </div>
  </div>
</div>