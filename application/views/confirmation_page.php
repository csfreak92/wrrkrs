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
<header style="color: white; height: 80px; margin-top: 0px; background-color: #4169E1;">
<div class="row">
    <div class="span4 offset2">
        <br>
        <h3>Confirmation Page</h3>
    </div>
</div>
</header>
<body>
<!-- <div class="container"> -->
    <br><br><br>
    <div class="container">
        <?php //echo $response; ?>
        <h4><p>Congratulations! Your account is now active and you can login and starting working <b><a href="<?php echo base_url(); ?>login">here</a>!</b></p></h4>
    </div>  
<?php $this->load->view('footer_view'); ?>