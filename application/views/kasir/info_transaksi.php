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
<script type="text/javascript">
$(function(){
  //$.cookie("modalshow1", "true", { path: '/', expires: expiryDate });
    // If the cookie does not exist
    function load(){
    if ($.cookie('modalshow') == null) 
    {
       // Show the modal
       $('#pop-up').modal('show');
       var expiryDate = new Date();
       var second = 1;  
       expiryDate.setTime(expiryDate.getTime() + (second * 60 * 1000));
       //date.setTime(date.getTime() + (minutes * 60 * 1000));

       // Create cookie to expire in 168 hours (1 week)
       $.cookie("modalshow", "true", { path: '/', expires: expiryDate });
     }
   }
     load();
     setInterval(load,10000);
     
});
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
     $('#pop-up').modal('hide');
}
</script>
<div class="modal" id="pop-up" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" id="pop-up2">
          <div class="modal-content" id="printableArea">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Siap Print</h4>
              </div>
            <div class="modal-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr >
                    <?php
                      error_reporting('0');
                      if(isset($daerah_pemesan) && $daerah_pemesan) { foreach($daerah_pemesan as $rowdaerah){ 
                    ?>
                      <th># <?php echo $rowdaerah['nama_alamat']?></th>
                      <th>Item</th>
                  </tr>
                    <?php 
                      $query2 = $this->transaksiModel->transaksi_sementara($rowdaerah['id_alamat']);
                      foreach($query2 as $s) { ?>
                  <tr class="info">
                    <td><b><?php echo $s['pemesan_transaksi']; ?></b><br><?php echo $s['date_transaksi']; ?></td>
                  <th style="text-align:left;" colspan="2" >
                    <?php $query3 = $this->transaksiModel->transaksi_sementara_tampilmenu($s['id_transaksi']);
                      foreach($query3 as $j){?>   
                  <li><?php echo $j['menu_transaksi'];?>  [  <?php echo $j['jumlah_menu'];?>  buah]  </li>
                    <?php }?>
                      </td> 
                    </td>
                  </tr>
                  <tr class="warning">
                    <td><?php echo $s['tujuan_transaksi']; ?></td>
                    <th colspan="2" style="text-align:left;">Total :
                        Rp. <?php echo $s['jumlah_transaksi'] ?></th></tr>  
            <?php }}} ?>
              
              <input type="hidden" name="kondisi" value='6'>
                </thead>
              </table>
            </div>
            <div class="footer"><center><input type="submit" class="btn btn-success" onClick="printDiv('printableArea')" value="print " /></center></div>
            
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

      </div>
    </div>
   <div class="row">
      <div class="col-lg-4">
<div class="chat-panel panel panel-default">
<div class="panel-heading"> Transaksi Sementara 
          <div class="pull-right">
              <?php echo form_open('dashboard/status_transaksi_dibuat');?>
              <input type="hidden" value="6" name="status_transaksi"/>
              <button type="submit" class="btn btn-success btn-xs" >
               Siap Dibuat
                  <span class="caret"></span>
              </button>
              <?php echo form_close();?> 
            </div>
          </div>
<div class="panel-body">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<?php
error_reporting('0');
if(isset($daerah_pemesan) && $daerah_pemesan) { foreach($daerah_pemesan as $rowdaerah){ 
  ?>
<th style="width:30px;">No</th>
<th  class="danger" ><?php echo $rowdaerah['nama_alamat']?></th>
<th  class="danger" >Item</th>
</tr>
<?php $no=1;
      $query2 = $this->transaksiModel->transaksi_sementara($rowdaerah['id_alamat']);
      foreach($query2 as $s) { ?>
    <tr class="info">
    <td><?php echo $no;?></td>
    <td><b><?php echo $s['pemesan_transaksi']; ?></b><br><?php echo $s['date_transaksi']; $no++;?></td>
    <th style="text-align:left;" colspan="2">
        <?php $query3 = $this->transaksiModel->transaksi_sementara_tampilmenu($s['id_transaksi']);
        foreach($query3 as $j){?>   
        <li><?php echo $j['menu_transaksi'];?>  [  <?php echo $j['jumlah_menu'];?>  buah]  </li>
        <?php }?>
    </td> 
  </td>
    </tr>
    <tr class="warning">
    <td colspan="2"><?php echo $s['tujuan_transaksi']; ?></td>
    <th colspan="2" style="text-align:left;">Total :
    Rp. <?php echo $s['jumlah_transaksi'] ?></th></tr>

    <?php }}} ?> 
</thead>
</table>
</div>
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading"> Transaksi Sedang Diantar </div>
<div class="panel-body">
<div class="table-responsive">
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
  <?php echo form_open('dashboard/status_transaksi_sukses');?>
  <input type="hidden" value="5" name="status_transaksi"/>
  <input type="hidden" value="<?php echo $rowdaerah['id_alamat'];?>" name="id_alamat"/>
  <input type="submit" class="btn btn-success" name="ke" value="selesai" onclick="return cek()"/></th>
  <?php echo form_close(); ?>
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
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading"> Transaksi Ditempat </div>
<div class="panel-body">
<div class="table-responsive">
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
</div>
</div>
</div>
</div>