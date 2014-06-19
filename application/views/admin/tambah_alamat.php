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
          <div class="panel-heading"> Tambah Alamat Pemesan Ksd</div>
            <div class="panel-body">
              <form role="form" action="<?php echo base_url('dashboardAdmin/proses_tambah_alamat');?>" method="post">
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3" name='nama_alamat' required placeholder="Isikan alamat"></textarea>
                </div>

                <div class="form-group">
                  <label>Jarak</label>
                  <input required placeholder="Isikan jarak" class="form-control" value='<?php echo $alamat->jarak_alamat;?>' name='jarak_alamat' style="width:200px;" type='number'>
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