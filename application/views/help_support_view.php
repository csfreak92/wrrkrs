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
<script type="text/javascript">
    $( document ).ready(function(){
        $('#allapplicationstab').dataTable();
    });
</script>

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
        HELP & SUPPORT VIEW
        <div class="container">
            <p>this is the settings page.</p>
        </div>
    </div>
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.bootstrap.css"/>

<script type="text/javascript" src="<?php echo base_url(); ?>js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>

<?php $this->load->view('footer_view'); ?>