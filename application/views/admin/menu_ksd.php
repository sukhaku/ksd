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
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading"> Menu Ksd
            <div class="pull-right">
              <a href='<?php echo site_url('dashboardAdmin/tambah_menu/');?>'>
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
                                            <th>Menu</th>
                                            <th>Harga</th>
                                            <th>Jenis</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no=1;
                                      foreach($semuaMenu as $rowsemua){
                                      ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $rowsemua->nama_menu;?></td>
                                            <td><?php echo $rowsemua->harga_menu;?></td>
                                            <td><?php echo $rowsemua->nama_jenis;?></td>
                                            <td><a href="<?php echo site_url('dashboardAdmin/ubah_menu/'.$rowsemua->kode_menu);?>">Ubah</a> |<a href="<?php echo site_url('dashboardAdmin/hapus_menu/'.$rowsemua->kode_menu);?>"> Hapus</td>
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

  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading"> Stok Menu 
        <div class="pull-right">
               <a href='<?php echo site_url('dashboardAdmin/tambah_stok/');?>'>
              <button type="button" class="btn btn-warning btn-xs">
                Tambah
                  <span class="caret"></span>
              </button>
              </a>
            </div>
      </div>
        <div class="panel-body">
          <div class="table-responsive">
          <table class='table'>
            
            <thead>
              <tr>
                <th>#</th>
                <th>Menu</th>
                <th>Stok</th>
                <th>Aksi</th>
              </tr>  
            </thead>
            
            <tbody>
              <?php
              $no=1;
                foreach($semuaMenu as $rowsemua){
                                      ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $rowsemua->nama_menu;?></td>
                                            
                                            <td><?php echo $rowsemua->stok_menu;?></td>
                                            <td><a href="<?php echo site_url('dashboardAdmin/ubah_stok/'.$rowsemua->kode_menu);?>">Ubah</a> |<a href="<?php echo site_url('dashboardAdmin/hapus_menu/'.$rowsemua->kode_menu);?>"> Hapus</td>
                                        </tr>
                                     <?php
                                     $no++;
                                      }
                                      ?>                          
            </tbody>

          </table>
          <!--
            <table class="table">
          <thead>
              <tr>
                <?php
                  error_reporting('0');
                  if(isset($daerah_pemesan) && $daerah_pemesan) { foreach($daerah_pemesan as $rowdaerah){ 
                ?>
                <th># <?php echo $rowdaerah['nama_alamat'] ?></th>
                <th>Alamat</th>
                <th style="text-align:right;">
                  <input type="button" class="btn btn-success" name="ke" value="selesai"  id="cloneTableRows"/></th>
              </tr>
                <?php 
                  $query2 = $this->transaksiModel->transaksi_sedang($rowdaerah['id_alamat']);
                  foreach($query2 as $s) { ?>
              <tr class="danger">
                <td><b><?php echo $s['pemesan_transaksi']; ?></b><br><?php echo $s['date_transaksi']; ?></td>
                <td colspan="2"><?php echo $s['tujuan_transaksi']; ?></td>
              </tr>
                <?php }}} ?> 
          </thead>
            </table>
          -->

          </div>
        </div>
      </div>
    </div>

  <div class="col-lg-4">
    <div class="panel panel-default">
      <div class="panel-heading"> Alamat Pemesan KSD 
        <div class="pull-right">
              <a href="<?php echo site_url('dashboardAdmin/tambah_alamat_pemesan');?>">
              <button type="button" class="btn btn-warning btn-xs" >
                Tambah
                  <span class="caret"></span>
              </button>
            </a>
            </div>
      </div>
        <div class="panel-body">
          <div class="table-responsive">
            
            <!--
            <table class="table">
              <thead>
              <tr>
                <?php
                  error_reporting('0');
                  if(isset($transaksi_ditempat) && $transaksi_ditempat) { foreach($transaksi_ditempat as $rowtransaksi){ 
                ?>
                <th colspan="2"># <?php echo $rowtransaksi['id_transaksi'] ?>
                  <?php echo form_open('dashboard/status_transaksi');?>
                  <input type="hidden" name="status_transaksi" value='0'>
                  <input type="hidden" name="id_transaksi" value="<?php echo $rowtransaksi['id_transaksi'];?>">
                  <th colspan="3" style="text-align:right;"><input type="submit" class="btn btn-success"  value="selesai" /></td>
                <?php echo form_close();?>
              </tr>
                  <?php $query2 = $this->transaksiModel->transaksi_ditempat($rowtransaksi['id_transaksi']);
                    foreach($query2 as $s) { ?>
              <tr class="info">
                <td><b><?php echo $s['menu_transaksi']; ?></b><br><?php echo $s['date_transaksi']; ?></td>
                  <td colspan="3" ><?php echo $s['jumlah_menu']; ?>  buah</td>        
              </tr>
                  <?php }?>
              <tr class="warning"><td colspan="3">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Total : Rp. <?php echo $rowtransaksi['jumlah_transaksi'] ?></td></tr>
                  <?php }}?> 
            </thead>
            </table>
          -->
          <table class='table'>
            
            <thead>
              <tr>
                <th>#</th>
                <th>Alamat</th>
                <th>Jarak</th>
                <th>Aksi</th>
              </tr>  
            </thead>
            
            <tbody>
              <?php
              $no = 1;
              foreach($alamatPemesan as $rowalamat){
              ?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $rowalamat->nama_alamat ;?></td>
                <td><?php echo $rowalamat->jarak_alamat ;?></td>
                <td><a href="<?php echo site_url('dashboardAdmin/ubah_alamat_pemesan/'.$rowalamat->id_alamat);?>">Ubah</a> |<a href="<?php echo site_url('dashboardAdmin/hapus_alamat_pemesan/'.$rowalamat->id_alamat);?>"> Hapus</td>                        
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







  <div classs='row'>
      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading">Jenis Balasan Ksd
            <div class="pull-right">
              <a href='<?php echo site_url('dashboardAdmin/tambah_balasan/');?>'>
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
                                            <th>Isi Balasan</th>
                                            <th>Jenis Balasan</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no=1;
                                      foreach($balasan as $rowbalasan){
                                      ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $rowbalasan->isi_balasan_ksd;?></td>
                                            <td><?php echo $rowbalasan->jenis_balasan_ksd;?></td>
                                            <td><a href="<?php echo site_url('dashboardAdmin/ubah_balasan/'.$rowbalasan->id_jenis);?>">Ubah</a> |<a href="<?php echo site_url('dashboardAdmin/hapus_balasan/'.$rowbalasan->id_jenis);?>"> Hapus</td>
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
      <div class="col-lg-4">
          <div class="panel panel-default">
            <div class="panel-heading">Popup Set
              <div class="pull-right">
                <a href="<?php echo site_url('dashboardAdmin/tambah_popup');?>">
                  <button type="button" class="btn btn-warning btn-xs" >
                    Tambah
                      <span class="caret"></span>
                  </button>
                </a>
            </div>
          </div>
          <div class="panel-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                       <th>#</th>
                        <th>Waktu</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>                                                     
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no=1;
                        foreach($popup as $rowpopup){
                      ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $rowpopup->waktu;?></td>
                          <td><?php echo $rowpopup->keterangan;?></td>
                          <td><a href="<?php echo site_url('dashboardAdmin/ubah_popup/'.$rowpopup->id);?>">Ubah</a> |<a href="<?php echo site_url('dashboardAdmin/hapus_popup/'.$rowpopup->id);?>"> Hapus</td>
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

   

<div classs='row'>
      <div class="col-lg-9">
        <div class="panel panel-default">
          <div class="panel-heading">User Ksd
            <div class="pull-right">
              <a href='<?php echo site_url('dashboardAdmin/tambah_user/');?>'>
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
                          <th>Username</th>
                          <th>Password</th>
                          <th>Nama</th>
                          <th>Level</th>
                          <th>Aksi</th>                                                     
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $no=1;
                          foreach($user as $rowuser){
                        ?>
                          <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $rowuser->username;?></td>
                            <td><?php echo $rowuser->password;?></td>
                            <td><?php echo $rowuser->nama;?></td>
                            <td><?php echo $rowuser->nama_level;?></td>
                            
                            <td><a href="<?php echo site_url('dashboardAdmin/ubah_user/'.$rowuser->id);?>">Ubah</a> |<a href="<?php echo site_url('dashboardAdmin/hapus_user/'.$rowuser->id);?>"> Hapus</td>
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

















