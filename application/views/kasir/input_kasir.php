  
        <!-- /.row Untuk tampil New mention, Complete Task, Fix Issues,-->
        <!-- /.row untuk Traffic Statistics -->
    <!--<div class="row">-->
 <script type="text/javascript">
  function cek(){
    var status = confirm('Yakin ?');
    if(status == false){
      return false;
    }else{
      return true;
    }
  }
</script>
      <div class="col-lg-4">
        <div class="chat panel panel-primary">
          <div class="panel-heading">
            <i class="fa fa-comments fa-fw"></i>Input Kasir
          </div>
          <div class="panel-body">

          <?php
              $css='id="input_kasir" '; 
              echo form_open('dashboard/input_kasir',$css);?>
          <table id="table" class="table table-bordered" style="width: auto;" align="left">
              <div class="control-group">
                <tr>
                  <td colspan="2">
                    <div class="form-group">
                       <input type="radio" value="4" name="status" onclick="document.getElementById('pemesan').disabled=true;document.getElementById('alamat_kirim').disabled=true;document.getElementById('alamat_kirim_gang').disabled=true;" >    Pemesanan Ditempat
                       &nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="radio" value="1" name="status" onclick="document.getElementById('pemesan').disabled=false;document.getElementById('alamat_kirim').disabled=false;document.getElementById('alamat_kirim_gang').disabled=false;" checked>    Pemesanan Delivery
                  </td>
              </tr>
              <tr>
                <div class="control-group">
                <td>
                  <label class="control-label" for="pemesan">ID Pemesan</label>
                </td>
                <td>
                  <b>
                  <div class="controls">
                  <?php $css='class="form-control" name="pemesan" id="pemesan" ';
                      echo form_input("pemesan",$pemesan,$css);
                      ?>
                  </b>
                  </div>
                  
                </td>
              </tr>
              <tr>
                <td><label>Alamat Pemesan</label></td>
                <td>
                  <!--form drop down alamat-->
                      <?php $css='class="form-control" name="alamat_kirim" id="alamat_kirim" ';
                      echo form_dropdown("alamat_kirim",$alamat_kirim,'1',$css);
                      ?>
                </td>
              </tr>
              <tr>
                <td><label class="control-label" for="detailAlamat">Detail Alamat Pemesan</label></td>
                <td><div class="controls">
                  <input class="form-control" type="text" placeholder="Ex:Gang 1 no.2" name="alamat_kirim_gang" id="alamat_kirim_gang">
                    </div>
                </td>
              </tr>
              <tr>
                <th colspan="2" style="background-color:#ffc;"><center><input type="button" class="btn btn-primary" name="ke" value="Tambah Jenis Menu"  id="cloneTableRows"/></center>
                
                </div>
                </th>
              </tr>
            <tr>
                <td class="span2"><a href="#" alt="" class="delRow" style="visibility: hidden;">Hapus</a></td>
              <td>    
                <div class="col-lg-7">
                  <div class="form-group">
                    <label>Menu</label>

                    <!--form drop down menu masakana-->

                      <?php $css='class="form-control" ';
                      echo form_dropdown("select_menu[]",$menu_ksd_options,1,$css);
                      ?>

                  </div>
                </div>
                <div class="col-lg-5">
                    <label>Jumlah</label>
                    <div class="controls">
                      <input class="form-control" name="jumlah[]" id="jumlah" type='number' required  >
                    </div>
                      <input class="form-control" name="total[]" id="total[]" type="hidden" >
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </script>  
        </div>
        <div class="panel-footer" style="text-align:right;">
                        <div class="form-group">
                          <input type="submit" class="btn btn-success" value="Submit Pesanan" onclick="return cek()">
                        </div>
                      <?php
                        echo form_close();
                      ?>

                  </div>
      </div>
    </div>
    