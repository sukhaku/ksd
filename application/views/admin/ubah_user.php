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
          <div class="panel-heading"> Tambah User Ksd</div>
            <div class="panel-body">
              <form role="form" action="<?php echo base_url('dashboardAdmin/proses_ubah_user');?>" method="post">
                <input type='hidden' value='<?php echo $user->id;?>' name='id'>
                <div class="form-group">
                  <label>Username</label>
                  <input class="form-control" name='username' style="width:300px;" value='<?php echo $user->username;?>' placeholder="Isikan username" required>
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" placeholder="Isikan password"  value='<?php echo $user->password;?>' name='password' style="width:200px;" type='text' required>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input class="form-control" placeholder="Isikan nama" value='<?php echo $user->nama;?>' name='nama' style="width:400px;" type='text' required>
                </div>
                
                <div class="form-group">
                  <label>Level</label>
                  <select class="form-control" style="width:150px;" name='level'>
                    <?php
                    $id = $user->level;
                      foreach($levele as $rowlevele){
                        $idne = $rowlevele->kode_level;
                        if($id==$idne){
                    ?>  
                        <option value="<?php echo $rowlevele->kode_level;?>" selected><?php echo $rowlevele->nama_level;?></option>
                    <?php
                        }else{
                    ?>
                        <option value="<?php echo $rowlevele->kode_level;?>"><?php echo $rowlevele->nama_level;?></option>
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