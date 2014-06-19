 <div class="col-lg-4">
  <div class="chat-panel panel panel-primary" style="height:522px;">
      <div class="panel-heading">
        <i class="fa fa-comments fa-fw"></i>
          Sms Pemesanan
          <div class="btn-group pull-right">
              
          </div>
      </div>
      <!-- /.panel-heading -->
    <div class="panel-body" style="height:396px;">
      <ul class="chat">
          <script type="text/javascript">
            setInterval("my_function();",5000);
            function my_function(){
              $('#tampilSms').load(location.href + ' #tampil');}  
          </script>
        <div id="tampilSms">
          <div id="tampil" >
                        <!--Konten tampil sms nya-->        
            <?php
                    //kalo data tidak ada didatabase
            if(empty($query))
            {
              echo "<tr><td colspan=\"6\">Tidak ada inbox masuk</td></tr>";
            }else{
              $no = 1;
              foreach($query as $row)
            {
            ?>
              <li class='list-group-item list-group-item-info right clearfix'>
                <span class='chat-img pull-right'>
                  <div class='btn-group pull-right'>
                      <a role="button"  data-toggle="modal"  href="#registerModal<?php echo $no; ?>"><button id="modal_popup" data-id="<?php echo $no; ?>" class='btn btn-default btn-xs dropdown-toggle' style='valign:center;'><span class='glyphicon glyphicon-envelope'></span>Balas &nbsp;</i></button></a>
                  </div>
                  
                </span>
              <div class='chat-body clearfix'>
                <div class='header'>
                  <strong></strong><class='primary-font'>
                  <?php echo $row->SenderNumber;?></strong>
                    <p>
                      <small>
                        <i class='fa fa-clock-o fa-fw'></i>
                        <?php echo $row->ReceivingDateTime;?>
                      </small>
                    </p>
                </div> 
                  <?php echo $row->TextDecoded;?>
                    </p>
                                       <!-- <td><a href="<?= base_url() ?>sms/editData/ <?= $row->SenderNumber ?>"> Balas</a></td>-->
              </li>
                <?php
                  $no++;
                  }}
                ?>
                <?php echo date('H:i:s');?>
                  </div>
                </div>
            </ul>
              </div>
          <div class="panel-footer">
            <div class="text-right">
              <div class="pagination">Halaman : <?php echo $halaman;?></div>
            </div>
          </div>                       
            <?php 
              $no = 1;
              foreach($query as $row)
              {
            ?>
    <!--modal div-->
    <?php echo form_open('sms/sendSms'); ?>
    <div class="modal" id="registerModal<?php echo $no;?>" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Balas Sms ke : <?php echo $row->SenderNumber;?></h4>
              </div>
            <div class="modal-body">
              <label>Teks Pesan</label>
              <div class="alert alert-info">
                <a class="alert-link" href="#">
                  <?php echo $row->TextDecoded;?>
                </a>
                
                
              </div>
                  <!--form drop down tipe pesan-->
                <td><label>Pilih Tipe Balasan</label></td>
                <input type="radio" value="4" name="status" onclick="document.getElementById('jenis_balasan').disabled=false;document.getElementById('tampilTextarea').disabled=true;" >    Format
                       &nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="radio" value="1" name="status" onclick="document.getElementById('jenis_balasan').disabled=true;document.getElementById('tampilTextarea').disabled=false;" checked>    Manual
                  <?php
                  $id_drop= $row->ID;
                   $css='class="form-control" id="isi_jenis_balasan" name="textDecoded" data-style="btn-info" ';
                    echo form_dropdown("jenis_balasan",$jenis_balasan,'',$css);
                  ?>
              <div class="form-group">
                <label>Text:</label>
                  <textarea class="form-control" id="tampilTextarea" name="textDecoded" rows="3"></textarea>
                  <input type="hidden" name="destinationNumber" value="<?php echo $row->SenderNumber;?>">

              </div>
              <div class="bs-example" style="margin-bottom: 40px;">

                <?php if(empty($dataHabis))
                {
                  echo "<tr><td colspan=\"6\">Data tidak tersedia</td></tr>";
                }else{
                
                foreach($dataHabis as $rowmenu)
                {
                ?>
                  <span class="label label-danger">
                    <?php echo $rowmenu->nama_menu;?> /
                    <?php echo $rowmenu->stok_menu; ?>
                  </span>
                  &nbsp;
                 <?php }} ?>

                 <?php if(empty($dataHabis))
                {
                  echo "<tr><td colspan=\"6\">Data tidak tersedia</td></tr>";
                }else{
                
                foreach($dataMasih as $rowmenu)
                {
                ?>
                  <span class="label label-default">
                    <?php echo $rowmenu->nama_menu;?> /
                    <?php echo $rowmenu->stok_menu; ?>
                  </span>
                  &nbsp;
                 <?php }} ?>
              </div>
            </div>
          <div class="modal-footer">
              <input type="submit" class="btn btn-primary" data-dismiss="modal" value="Close">
              <input type="submit" class="btn btn-success" value="Send">
              <?php echo form_close(); ?>
          </div>
          </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
   <?php
    $no++;
    }
  ?>

<!--Tampil konten sms selesai-->                          
        <!-- /.panel-footer -->
          </div>
        </div>
    <!--batas new template-->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
</div>
        
    <!--modal-->
    <!-- /.modal -->
    <!--endmodal-->
   

