<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="New Freelance Platform for Canadian Locals">
    <title>FREELANCE PLATFORM</title>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.css"/>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.11.1.js"></script>
    <script src= "<?php echo base_url(); ?>js/bootstrap.js"></script>
<style>
    .clickableRow
    {
        cursor: pointer;
    }
</style>
</head>
<body>
<!-- <div class="container"> -->
    <?php $this->load->view('header_view'); ?>
    <br><br><br>
    <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-4 sidebar">
                <div class="mini-submenu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
                <div class="list-group">
                    <span href="#" class="list-group-item active">
                        SETTINGS MENU
                        <span class="pull-right" id="slide-submenu">
                            <i class="fa fa-times"></i>
                        </span>
                    </span>
                    <?php echo anchor( base_url().'core/home', 'Home', 'class="list-group-item" ' ); ?>
                    <?php echo anchor( base_url().'core/notifications', 'Notifications', 'class="list-group-item" ' ); ?>
                    <?php echo anchor( base_url().'core/help', 'Help & Support', 'class="list-group-item" ' ); ?>
                    <?php echo anchor( base_url().'core/change_pass', 'Change Password', 'class="list-group-item" ' ); ?>
                </div>        
            </div>
        </div>
        <div class="container">
            <p>This is where you can change your password.</p>
            <center>
            <div class="well">
            <form method="post" action="change_my_password" class="form-horizontal" name="changepassfrm" id="changepassfrm">
                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Username:</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">New Password:</label>
                    <div class="col-sm-5">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Type New Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="passwordRetyped" class="col-sm-2 control-label">Retype Password:</label>
                    <div class="col-sm-5">
                    <input type="password" class="form-control" name="passwordRetyped" id="passwordRetyped" placeholder="Retype Your New Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 offset1">
                    <input type="submit" class="btn btn-primary" name="submitbtnpass" id="submitbtnpass" value="OK">
                    </div>
                </div>
            </form>
            </div> 
            </center>
        </div>
    </div>
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.bootstrap.css"/>

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/additional-methods.min.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/site-demos.css"/>

<script type="text/javascript">
    // uncomment debug to stop form from submitting
    jQuery.validator.setDefaults({
      // debug: true,
      success: "valid"
    });
    $( "#changepassfrm" ).validate({
      rules: {
        password: "required",
        passwordRetyped: {
          equalTo: "#password"
        }
      }
    });
</script>
<?php $this->load->view('footer_view'); ?>