                                <?php
                    //kalo data tidak ada didatabase
                        if(empty($query))
                          {
                            echo "<tr><td colspan=\"6\">Data tidak tersedia</td></tr>";
                          }else
                          {
                          $no = 1;
                          foreach($query as $row)
                          {
                          ?>
                    
                                <li class='list-group-item list-group-item-info right clearfix'>
                                    <span class='chat-img pull-right'>
                                    <div class='btn-group pull-right'>
                                    <button class='btn btn-default btn-xs dropdown-toggle' style='valign:center;'><span class='glyphicon glyphicon-remove'></span>Hapus</i></button>
                                    <a href="<?= base_url() ?>dashboard/editData/ <?= $row->SenderNumber ?>"><button class='btn btn-default btn-xs dropdown-toggle' style='valign:center;'><span class='glyphicon glyphicon-envelope'></span>Balas &nbsp;</i></button></a>
                                    </div>
                                    </span>
                                    <div class='chat-body clearfix'>
                                        <div class='header'>
                                            <strong class='primary-font'>
                                                <?php echo $row->SenderNumber;?></strong>
                                            
                                            <small>
                                               <i class='fa fa-clock-o fa-fw'></i>
                                               <?php echo $row->ReceivingDateTime;?>
                                            </small>
                                            </p>
                                        </div> 
                                        </p>
                                        
                                    </div>
                                </li>
                                <?php
                      $no++;
                      }}
                    ?>
                            