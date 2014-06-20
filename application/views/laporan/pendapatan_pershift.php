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
          <div class="panel-heading">Transaksi KSD Ditempat</div>
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
                                      
                                    </tbody>
                                </table>
                </div>
            </div> 
      </div>
    </div>

    <div class="row">
      <div class="col-lg-7">
        <div class="panel panel-default">
          <div class="panel-heading">Transaksi KSD Delivery</div>
            <div class="panel-body">

            </div> 
      </div>
    </div>         

          
  </div>

  