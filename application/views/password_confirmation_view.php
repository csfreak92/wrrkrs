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
                <div class="well" name="results" id="results">
                <?php 
                    // $page = $_SERVER['PHP_SELF'];
                    // header('Refresh: 10');
                    if($val == 1)
                    {
                        echo "<div class='alert alert-success'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Success!</strong> Your password has been changed! You will 
                            be logged out from the system in a few seconds.
                        </div>";
                    }
                    else
                    {
                        echo "<div class='alert alert-error'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Error!</strong> A problem has occurred while submitting your data.
                        </div>";
                    }

                ?>

                </div>
            </center>
        </div>
    </div>
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.bootstrap.css"/>
<script type="text/javascript">
$( document ).ready(function(){
    var val = '<?php echo $val ?>';
    // alert(val);
    if(val == 1)
    {
        $.ajax({
            type: "POST", 
            data: val, 
            url: 'evaluate/'+val, 
            async: false, 
            cache: false, 
            success: function(data, status){
                console.log(data);
                console.log(status);
                // alert(data);
                // alert(status);
            }, 
            error: function(e, status){
                console.log(e);
                console.log(status);
            }
        });  
    }

});
</script>
<?php $this->load->view('footer_view'); ?>