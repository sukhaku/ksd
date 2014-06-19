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
          <div class="panel-heading"> Ubah Menu Ksd</div>
            <div class="panel-body">
              <form role="form" action="<?php echo base_url('dashboardAdmin/proses_ubah_menu');?>" method="post">
                <input class="form-control" value='<?php echo $menu->kode_menu;?>' name='kode_menu' style="width:300px;" type='hidden'>
                <div class="form-group">
                  <label>Nama Menu</label>
                  <input class="form-control" value='<?php echo $menu->nama_menu;?>' name='nama_menu' style="width:300px;">
                </div>

                <div class="form-group">
                  <label>Harga</label>
                  <input class="form-control" placeholder="Isikan harga" value='<?php echo $menu->harga_menu;?>' name='harga_menu' style="width:200px;" type='number'>
                </div>

                <div class="form-group">
                  <label>Jenis</label>
                  <select class="form-control" style="width:150px;" name='jenis_menu'>
                    <?php
                    $id_kategori = $menu->kode_jenis;
                      foreach($jenis_menu as $rowmenu){
                        $idne = $rowmenu->kode_jenis;
                        if($idne==$id_kategori){
                    ?>  
                        <option value="<?php echo $idne;?>" selected><?php echo $rowmenu->nama_jenis;?></option>
                    <?php
                        }else{
                    ?>
                        <option value="<?php echo $idne;?>"><?php echo $rowmenu->nama_jenis;?></option>
                    <?php     
                        }
                      }
                    ?>
                   
                  </select>
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