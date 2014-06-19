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
<div class="panel-heading"> Transaksi Sementara </div>
<div class="panel-body">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<?php
error_reporting('0');

if(isset($daerah_pemesan) && $daerah_pemesan) { foreach($daerah_pemesan as $rowdaerah){ 
  ?>
<td colspan="2">
  <?php echo form_open('dashboard/status_transaksi_dibuat');?>
  <?php $css='class="form-control" name="pegawai_ksd_options" id="pegawai_ksd_options" ';
    echo form_dropdown("pegawai_ksd_options",$pegawai_ksd_options,'1',$css);
  ?>
  <?php echo form_close();?>
</td>
<td>
  <input type="button" class="btn btn-primary" name="ke" value="Submit Pengantar"  id="cloneTableRows" onclick="return cek()"/>
</td>
</tr>
<tr>
  <th style="width:30px;">No</th>
<th>Daerah: <?php echo $rowdaerah['nama_alamat']?></th>
<th>Item</th>
</tr>
<?php $no=1;
      $query2 = $this->transaksiModel->transaksi_dibuat($rowdaerah['id_alamat']);
      foreach($query2 as $s) {?>
    <tr class="info">
      <td><?php echo $no;?></td>
    <td><b><?php echo $s['pemesan_transaksi']; ?></b><br><?php echo $s['date_transaksi']; $no++;?></td>
    <th style="text-align:left;" colspan="2">
        <?php $query3 = $this->transaksiModel->transaksi_dibuat_tampilmenu($s['id_transaksi']);
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
</table>

</div>
</div>
<br>
</div>
</div>

<div class="col-lg-4">
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
<th><!--<input type="button" class="btn btn-success" name="ke" value="selesai"  id="cloneTableRows"/></th>-->
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
</div>

<div class="col-lg-4">
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
</tr>
<?php $query2 = $this->transaksiModel->transaksi_ditempat($rowtransaksi['id_transaksi']);
    foreach($query2 as $s) { ?>
  <tr class="info">
    <td><b><?php echo $s['menu_transaksi']; ?></b><br><?php echo $s['date_transaksi']; ?></td>
    <td colspan="2" style="text-align:right;" ><?php echo $s['jumlah_menu']; ?>  buah</td>
              <?php echo form_open('dashboard/status_transaksi');?>
              <input type="hidden" name="status_transaksi" value='0'>
              <input type="hidden" name="id_transaksi" value="<?php echo $s['id_transaksi'];?>">
    <!--<td><input type="submit" class="btn btn-success"  value="selesai" /></td>-->

    <?php echo form_close();?>
  </tr>
<?php }?>
<tr><td colspan="3" style="text-align:right;">
Total : Rp. <?php echo $rowtransaksi['jumlah_transaksi'] ?></td></tr>
<?php }}?> 
</thead>
</table>
</div>
</div>
</div>
</div>
</div>
</div>