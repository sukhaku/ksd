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
          <div class="panel-heading"> Tambah Balasan Pesan Ksd</div>
            <div class="panel-body">
              <form role="form" action="<?php echo base_url('dashboardAdmin/proses_tambah_balasan');?>" method="post">
                <div class="form-group">
                  <label>Isi</label>
                  <textarea class="form-control" rows="3" name='isi_balasan' placeholder="Isikan Pesan"></textarea>
                </div>

                <div class="form-group">
                  <label>Jenis Balasan</label>
                  <input class="form-control" name='jenis_balasan' style="width:200px;" type='text' placeholder="Isikan jenis balasan">
                </div>

                
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-success">Reset</button>  
                <a href='<?php echo base_url('dashboardAdmin/');?>'><button type="button" class="btn btn-warning">Kembali</button></a>  
                    
            
              </form>

            </div>
          </div>

        </div>
      </div>
        </div>
      </div>
    </div>
  </div>
</div>