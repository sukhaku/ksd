<div class="modal" id="pop-up" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" id="pop-up2">
          <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Balas Sms ke : 00000</h4>
              </div>
            <div class="modal-body">
              <label>Teks Pesan</label>
              <div class="alert alert-info">
                <a class="alert-link" href="#">
                  coba pop up
                </a>
              </div>
            </div>
          </div>
      </div>
</div>

<div id="page-wrapper">
    <div class="row">
    <div class="col-lg-12">
        <!--<h2>Aplikasi<small>  Kasir KSD</small></h2>-->
        <br>
          <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Stok Menu 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php
                foreach($dataHabis as $rowmenu){?>
                  <span class="label label-danger">
                    <?php echo $rowmenu->nama_menu;?> @
                    <?php echo $rowmenu->harga_menu; ?> /
                    <?php echo $rowmenu->stok_menu; ?>
                  </span>
                  &nbsp;
                 <?php } ?>
                <?php 
                foreach($dataMasih as $rowmenu){?>
                  <span class="label label-default">
                    <?php echo $rowmenu->nama_menu;?> @
                    <?php echo $rowmenu->harga_menu; ?> /
                    <?php echo $rowmenu->stok_menu; ?>
                  </span>
                  &nbsp;
                 <?php } ?>
              
            </li>
          </ol>

   <div class="row">
      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading"> Laporan KSD Per Hari
          </div>
            <div class="panel-body">
              <form role="form" class="form-inline" action="<?php echo base_url('dashboardLaporan/cari_laporan_harian');?>" method="post">
                <div class="form-group">
                  <?php 
                   $waktu = $date;
                   $explode = explode('-', $waktu);
                  ?>
                  <select name='tanggal' class='form-control'>
                      <?php
                        echo"<option>Tanggal</option>";
                        $date = $explode[2];
                        for($a=1; $a<=31; $a++){
                          if($a==$date){
                          echo"<option value=$a selected>$a</option>";
                          }else{
                            echo"<option value=$a>$a</option>";  
                          }
                        }
                      ?>
                  </select>
                </div>  
                <div class="form-group">
                    <select name='bulan' class='form-control'>

                      <?php
                        $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                         echo"<option>Bulan</option>";
                          $month = $explode[1];
                        for($b=1; $b<=12; $b++){
                          if($b==$month){
                              echo"<option value=$b selected>$bulan[$b]</option>";
                          }else{
                            echo"<option value=$b>$bulan[$b]</option>";
                          }
                        }
                      ?>
                  </select>
                </div>  
                <div class="form-group">
                      <select name='tahun' class='form-control'>
                      <?php
                         echo"<option>Tahun</option>";
                          $tahun = date("Y");
                          $year = $explode[0];
                        for($t=2010; $t<=$tahun; $t++){
                          if($t==$year){
                          echo"<option value=$t selected>$t</option>";
                          }else{
                          echo"<option value=$t>$t</option>";  
                          }
                        }
                      ?>
                  </select>
                
                </div>  
                
                
                 <button type="submit" class="btn btn-primary">Cari</button>
              </form><br>
              <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Menu</th>
                                            <th>Jumlah Dijual</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no=1;
                                      foreach($cariharian as $rowharian){
                                      ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $rowharian->menu_transaksi;?></td>
                                            <td><?php echo $rowharian->jumlah;?></td>
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

  