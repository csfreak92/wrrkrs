<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="New Freelance Platform for Locals">
    <title>FREELANCE PLATFORM</title>
    <!--[if lte IE 8]>
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <!--<![endif]-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/pure.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/gumby.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/side-menu.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/modernizr-2.6.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/jquery-2.0.2.min.js"></script>
<style>
    #submitbtn
    {
        cursor: pointer;
    }
</style>
</head>

<body>

<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>
    <br><br><br><br>
    <div class="fourteen columns">
        <h3>Login to Freelance Platform</h3>
        <hr>
        <div class="row">
            <center>
            <div class="fourteen columns">
            <div id="errordiv"><?php echo validation_errors(); ?></div>
            <form class="pure-form pure-form-aligned" method="post" action="verifylogin">
            <table id="logintable">
				<tr><td></td><td align="center"><label for="login">Login</label></td></tr>
				<tr><td><label for="username">Username:</label></td>
					<td><input type="text" size="20" id="username" name="username"></td>
				</tr>
				<tr><td><label for="password">Password:</label></td>
					<td><input type="password" size="20" id="password" name="password"></td>
				</tr>
				<center><tr><td></td><td><div class="large primary btn">
					<button type="submit" class="btn" name="submitbtn" id="submitbtn" value="Login">
					<a gumby-trigger="#loginBtn">Login</a>
                </button></div></td></tr></center>
			</table>
			</form>
            </div></center>
        </div>
      <br><br><br><br>
      <div class="ten columns">
      <footer style="color: white; height: 80px; background-color: orange;">
          <center>
          &copy; 2015 All rights reserved to<br> Center for Community Development
          Ateneo de Naga University
          </center>
      </footer>
      </div>
    </div>
   </div>

    <script>
        var oldieCheck = Boolean(document.getElementsByTagName('html')[0].className.match(/\soldie\s/g));
        if(!oldieCheck) {
            document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"><\/script>');
        } else {
            document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"><\/script>');
        }
    </script>
    <script>
        if(!window.jQuery) {
            if(!oldieCheck) {
              document.write('<script src="../js/libs/jquery-2.0.2.min.js"><\/script>');
          } else {
              document.write('<script src="../js/libs/jquery-1.10.1.min.js"><\/script>');
          }
      }
  </script>
  <script gumby-touch="/js/libs" src="<?php echo base_url(); ?>js/libs/gumby.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/ui/gumby.retina.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/ui/gumby.fixed.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/ui/gumby.toggleswitch.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/ui/gumby.radiobtn.js"></script>
  
  <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/ui/gumby.tabs.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/gumby.init.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/plugins.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/main.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/dataTables.jqueryui.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/dataTables.tableTools.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/dataTables.tableTools.js"></script>

  <link rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.jqueryui.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.tableTools.css">

</div>
<script type="text/javascript">
// $('#submitbtn').click(function(e){
//     alert('submitted!');
// });
</script>
</body>
</html>
