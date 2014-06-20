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
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"> Laporan KSD Per Bulan</div>
            <div class="panel-body">

              <form role="form" class="form-inline" action="<?php echo base_url('dashboardLaporan/cari_laporan_bulanan');?>" method="post">  
                <div class="form-group">
                    <select name='bulan' class='form-control'>

                      <?php
                        $bul = date("m");
                        $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                        $bulan_angka = array("","01","02","03","04","05","06","07","08","09","10","11","12");
                        echo"<option>Bulan</option>";
                        for($b=1; $b<=12; $b++){
                          if($b==$bul){
                              echo"<option value=$bulan_angka[$b] selected>$bulan[$b]</option>";
                          }else{
                            echo"<option value=$bulan_angka[$b]>$bulan[$b]</option>";
                          }
                        }
                      ?>
                  </select>
                </div>  
                <div class="form-group">
                      <select name='tahun' class='form-control'>
                      <?php
                        $tahun = date("Y");
                         echo"<option>Tahun</option>";
                        for($t=2010; $t<=$tahun; $t++){
                          if($t==$tahune){
                          echo"<option value=$t selected>$t</option>";
                          }else{
                          echo"<option value=$t>$t</option>";  
                          }
                        }
                      ?>
                  </select>
                
                </div>  
                <div class="form-group">
                  <select name='shift' class='form-control'>
                     <?php
                    if($shiftnya=='shift1'){
                    ?>
                    <option value="semua">Semua Shift</option>
                    <option value="shift1" selected>Shift 1 (09.00 - 13.00)</option>
                    <option value="shift2">Shift 2 (13.00 - 21.00)</option>           
                    <?php
                    }else if($shiftnya=='shift2'){
                    ?>
                    <option value="semua">Semua Shift</option>
                    <option value="shift1">Shift 1 (09.00 - 13.00)</option>
                    <option value="shift2" selected>Shift 2 (13.00 - 21.00)</option>
                    <?php
                    }else{
                    ?>
                    <option value="semua" selected>Semua Shift</option>
                    <option value="shift1">Shift 1 (09.00 - 13.00)</option>
                    <option value="shift2">Shift 2 (13.00 - 21.00)</option>
                    <?php
                    }
                    ?>          
                  </select>
                </div> 
                
                
                 <button type="submit" class="btn btn-primary">Lihat</button>
              </form><br>
              <div class="row">
                <div class="col-lg-4">
                  <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr><th colspan='4'><center>TRANSAKSI DITEMPAT</center></th>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Datetime</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no=1;
                                      foreach($ditempat as $rowtempat){
                                      ?>  
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo "<a href=".site_url('dashboardLaporan/laporan_bulanan').">".$rowtempat->id_transaksi."</a>";?></td>
                                            <td><?php echo $rowtempat->date_transaksi;?></td>
                                            <td><?php echo "Rp. ".$rowtempat->jumlah_transaksi;?></td>   
                                        </tr>
                                      <?php
                                      $no++;
                                      }

                                      ?>
                                        <tr>
                                            <th colspan='4'><?php  echo "Jumlah : Rp. ".$totaltempat->total; ?></th>
                                        </tr>      
                                    </tbody>
                                </table>

                                
                  </div>
                </div>

                <div class="col-lg-8">
                  <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr><th colspan='5'><center>TRANSAKSI DELIVERY</center></th>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Daerah Pemesanan</th>
                                            <th>Jumlah Transaksi</th>
                                            <th>Datetime</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php

                                      $no=1;
                                      foreach($delivery as $rowdelivery){
                                      ?>  
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo "<a href=".site_url('dashboardLaporan/laporan_bulanan').">".$rowdelivery->id_transaksi."</a>";?></td>
                                            <td><?php echo $rowdelivery->tujuan_transaksi;?></td>
                                            <td><?php echo "Rp. ".$rowdelivery->jumlah_transaksi;?></td> 
                                            <td><?php echo $rowdelivery->date_transaksi;?></td>  
                                      <?php
                                      $no++;
                                      }
                                      ?>
                                      <tr>
                                          <th colspan='5'><p class='text-left'><?php  echo "Jumlah : Rp. ".$totaldelivery->total; ?></p></th>
                                      </tr>      
                                                        
                                    </tbody>
                                </table>
                  </div>
                </div>

              </div>  
              <div class="row">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-8">
                  <?php
              $a = $totaldelivery->total;
              $b = $totaltempat->total;
              $hasil = $a+$b;
              echo"<p class='text-left'><h4>Total: Rp. $hasil</h4></p>"; 
              ?>
                </div>
                  
              </div>

            <!-- end panel body-->                
            </div>
        </div>
      </div>

    </div>  

  