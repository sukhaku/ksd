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
          <div class="panel-heading"> Tambah Menu Ksd</div>
            <div class="panel-body">
              <form role="form" action="<?php echo base_url('dashboardAdmin/proses_tambah_stok');?>" method="post">
                <div class="form-group">
                  <label>Nama Menu</label>
                  <input class="form-control" placeholder="Isikan nama menu" name='nama_menu' style="width:300px;" required>
                </div>

                <div class="form-group">
                  <label>Harga</label>
                  <input class="form-control" placeholder="Isikan harga"  name='harga_menu' style="width:200px;" type='number' required>
                </div>

                <div class="form-group">
                  <label>Jenis</label>
                  <select class="form-control" style="width:150px;" name='jenis_menu'>
                    <option>Jenis Menu</option>
                    <?php
                     foreach($jenis_menu as $rowmenu){
                    ?>  
                     
                        <option value="<?php echo $rowmenu->kode_jenis;?>"><?php echo $rowmenu->nama_jenis;?></option>
                    <?php     
                        
                      }
                    ?>
                   
                  </select>
                </div>
                <div class="form-group">
                  <label>Stok</label>
                  <input class="form-control" placeholder="Isikan stok"  name='stok' style="width:200px;" type='number' required>
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