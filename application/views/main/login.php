<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KSDCHASIER_APP</title>

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>asset/font-awesome/css/font-awesome.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>asset/css/sb-admin.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    

</head>

<body>

    <div class="container">
        <div class="row">

            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><CENTER>APLIKASI KASIR KSD</CENTER></h3>
                    </div>
                    
                    <div class="panel-body">

                            <form role="form" action="<?php echo base_url();?>index.php/loginControl/login" method="post" name="login">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo set_value('username');?>"  autofocus>
                                    <?php echo form_error('username');?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password"  value="<?php echo set_value('password');?>">
                                    <?php echo form_error('password');?>
                                </div>
                                
                                <div class="form-group">
                                            <label>Masuk Sebagai:</label>
                                            <?php $css='class="form-control" name="level_user" id="level_user" ';
                                            echo form_dropdown("level_user",$level_user,'1',$css);
                                            ?>
                                        </div>
                            
                                <!-- Change this to a button or input when using this as a form -->
                                <center>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo base_url(); ?>asset/js/sb-admin.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery-migrate.js"></script>
</body>

</html>
