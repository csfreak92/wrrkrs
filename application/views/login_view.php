<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="New Freelance Platform for Canadian Locals">
    <b><title>Wrrkrs.com</title></b>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.css"/>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.11.1.js"></script>
    <script src= "<?php echo base_url(); ?>js/bootstrap.js"></script>
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
        <div class="span2 offset11"><h4>SIGNUP</h4></div><br>
        <div class="pull-right">
          <form id='frmsignup' name='frmsignup' method='post' action='<?php echo base_url().'core/signup'; ?>'>
            <div class="row">
              <div class="span2 offset8"><input type="submit" class="btn btn-success" name="freelancers" id="freelancers" value="Find Freelancers"></div>
              <div class="span2"><input type="submit" class="btn btn-success" name="jobs" id="jobs" value="Find Jobs"></div>
            </div>    
          </form>
        </div>
        <br><br><br>
        <center><h3>Login to Wrrkrs.com</h3></center>
        <hr>
        <div class="row">
            <center>
            <div class="fourteen columns">
            <div id="errordiv"><?php echo validation_errors(); ?></div>
            <form class="pure-form pure-form-aligned" method="post" action="verifylogin">
            <table id="logintable">
				<!-- <tr><td></td><td align="center"><label for="login">Login</label></td></tr> -->
				<tr><td><label for="username">Username:</label></td>
					<td><input type="text" size="20" id="username" name="username"></td>
				</tr>
				<tr><td><label for="password">Password:</label></td>
					<td><input type="password" size="20" id="password" name="password"></td>
				</tr>
				<center><tr><td></td><td><!-- <div class="large primary btn"> -->
					<!-- <button type="submit" class="btn" name="submitbtn" id="submitbtn" value="Login"> -->
          <input type="submit" class="btn btn-primary" name="submitbtn" id="submitbtn" value="Login">
					<!-- <a gumby-trigger="#loginBtn">Login</a> -->

                <!-- </button></div> --></td></tr></center>
			</table>
			</form>
      </div></center>
  </div>
        
        <!-- <div class="container" id="indeedDiv">
        <span id=indeed_at><a href="http://www.indeed.com/">jobs</a> by <a
          href="http://www.indeed.com/" title="Job Search"><img
          src="http://www.indeed.com/p/jobsearch.gif" style="border: 0;
          vertical-align: middle;" alt="Indeed job search"></a></span>
        </div>
        <div class="container" id="indeedSearchRes">
          <a href="http://api.indeed.com/ads/apigetjobs?publisher=2891706259072003&jobkeys=developer&v=2&format=json.">Search</a>
        </div> -->

      <br><br><br><br>
      <center>
        <a href="<?php echo base_url(); ?>extras/search_grabbed_data">Search Jobs Without Registering</a>
      </center>

    <!-- 
      <center>
      <div class="container" id="indeedSearchDiv">
        <table>
        <form method="post" name="indeedSearchFrm" id="indeedSearchFrm" action="<?php echo base_url(); ?>api_handler/curl_request_indeed" class="form-control">
          <tr>
            <td>Keywords:</td>
            <td><input type="text" name="searchKey" id="searchKey" placeholder="Job Title or Keyword"></td>
          </tr>
          <tr>
            <td>Location:</td>
            <td><input type="text" name="searchLoc" id="searchLoc" placeholder="State, County, Province or Territory"></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="button" name="searchBtn" id="searchBtn" value="Search" class="btn btn-primary"></td>
          </tr>
        </form></table>
      </div>
      </center> -->

      <div class="container" id="indeedSearchResults">

      </div>

      <div class="ten columns">
      <footer style="color: white; height: 80px; margin-top: 150px; background-color: #CC0000;">
          <center>
          &copy; 2015 All rights reserved to<br> <b>Wrrkrs.com</b>
          </center>
      </footer>
      </div>
    </div>
   </div>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.jqueryui.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.tableTools.css">
</div>
</body>
<script type="text/javascript">
  $('#searchBtn').click(function(e){
    e.preventDefault();
    var postData = $("#indeedSearchFrm").serialize();
    alert('sending data');
    $.ajax({
      type: "POST", 
      async: false, 
      cache: false, 
      data: postData,
      dataType: "JSON", 
      url: '<?php echo base_url(); ?>api_handler/curl_request_indeed',
      error: function(error, status){
        alert(error + status);
        console.log(error);
        console.log(status);
      }, 
      success: function(data, status){
        alert(data);
        console.log(data);
        console.log(status);
      }
    });
  }); 
</script>
</html>
