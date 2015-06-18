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

    #ajax-loader {
      width: 300px;
      height: 300px;
    }
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>js/spinner/jquery.androidSpinner.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#ajax-loader").hide();
    // $("#ajax-loader").css("display", "none");
  });
</script>

</head>
<body>
<div id="layout">
    <a href="#menu" id="menuLink" class="menu-link">
        <span></span>
    </a>
    <br><br><br><br>

        <div class="span6 pull-right">
          <table class="table">
            <tr>
              <form id='frmsignup' name='frmsignup' method='post' action='<?php echo base_url().'core/signup'; ?>'>
                <td>
                  <div class="span1"><input type="submit" class="btn btn-success" name="freelancers" id="freelancers" value="Find Freelancers"></div>
                </td>
                <td>
                  <div class="span1"><input type="submit" class="btn btn-success" name="jobs" id="jobs" value="Find Jobs"></div>
                </td>
              </form>
              <form id='frmsignin' name='frmsignin' method='post' action='<?php echo base_url().'login'; ?>'>    
                <td>
                  <div class="span1"><input type="submit" class="btn btn-default" name="signin" id="signin" value="Sign In"></div>
                </td> 
              </form>
            </tr>
          </table>
        </div>
        
      <br><br><br><br>
      <center>
      <div id="ajax-loader" name="ajax-loader">
<script type="text/javascript">
  // document.addEventListener( "DOMContentLoaded", function () {
    $( "#ajax-loader" ).ajaxLoader( {
      lineWidth: 33,
      top: {
      color: "#4b98eb"
      },
      bottom: {
      color: "#377fcc"
      }
    } );
  // }, false );
</script>        
      </div>
      <h3>Search Jobs</h3>
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
      </center>
      
      <div class="container" id="indeedSearchResults" name="indeedSearchResults">

      </div>
      <div class="container" name="questionDiv" id="questionDiv">
        <center><p><h5>Did you not find what you are looking for? <b>Register</b> and find more jobs <a href="<?php echo base_url().'core/signup'; ?>">here.</a></h5></p></center>
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
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.jqueryui.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.tableTools.css"> -->
</div>
</body>
<script type="text/javascript">
  $('#searchBtn').click(function(e){
    e.preventDefault();
    $("#indeedSearchResults").empty();
    var postData = $("#indeedSearchFrm").serialize();
    var firstCall = $.ajax({
      type: "POST", 
      async: true, 
      cache: false, 
      data: postData,
      dataType: "JSON", 
      // url: '<?php echo base_url(); ?>api_handler/curl_request_indeed',
      url: '<?php echo base_url(); ?>api_handler/fetch_existing_jobdata',
      error: function(error, status){
        alert(error + status);
        console.log(error);
        console.log(status); 
      }, 
      success: function(data, status){
        console.log(data);
        console.log(status);
        if(data == false || data == "" || data == null || data == " ")
        {
          var secondCall = $.ajax({
            type: "POST", 
            async: true, 
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
              console.log(data);
              console.log(status);
              if(data == false || data == "" || data == null || data == " ")
              {  
                alert('Sorry, there are no jobs that matches your search data as of now... Please try again later.');
                // change this later to bootstrap alerts instead of plain JS alerts
              }
              else
              {  
                // AJAX LOADERS
                // writing JSON response to HTML from data fetched from indeed.ca api
                var x = data;
                var link = "";
                var title = "";
                var city = "";
                var country = "";
                var company = "";
                var state = "";
                var loc = "";
                var snippet = "";
                $.each(x.results, function(k,v){
                  $.each(v, function(a, b){
                    if(a == "url")
                    {
                      link = b;
                      $("#indeedSearchResults").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td><b><a target='_blank' href='"+link+"'>"+title+"</a></b></td></tr>").css("color","blue");
                      $("#indeedSearchResults").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+"Company"+" : "+company+"</td></tr>").css("color","blue");
                      $("#indeedSearchResults").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+"State"+" : "+state+"</td></tr>").css("color","blue");
                      $("#indeedSearchResults").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+"Country"+" : "+country+"</td></tr>").css("color","blue");
                      $("#indeedSearchResults").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+"Location"+" : "+loc+"</td></tr>").css("color","blue");
                      $("#indeedSearchResults").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+"Job Snippet"+" : "+snippet+"</td></tr>").css("color","blue");
                    }
                    if(a == "jobtitle")
                    {
                      title = b;
                    }
                    if(a == "company" ) 
                    {  
                      company = b;
                    }
                    if(a == "city")
                    {  
                      city = b;  
                    }
                    if(a == "state")
                    {
                      state = b;
                    }
                    if(a == "country")
                    {
                      country = b;
                    }
                    if(a == "formattedLocation") 
                    {
                      loc = b;
                    }
                    if(a == "snippet")
                    {
                      snippet = b;
                    }
                  });
                  link = "";
                  title = "";
                  loc = "";
                  snippet = "";
                  country = "";
                  city = "";
                  state = "";
                  company = "";
                  $("#indeedSearchResults").append("<hr>");
                });
                
              } // end of else from data fetched from indeed.ca api
            }
          });
        }
        else
        {
          // alert(data);
          // writing JSON response to HTML from data fetched from the DB
          var x = data;
          var link = "";
          var title = "";
          var city = "";
          var country = "";
          var company = "";
          var state = "";
          var loc = "";
          var snippet = "";
          $.each(x, function(k,v){
            $.each(v, function(a, b){
              if(a == "url")
              {
                link = b;
                $("#indeedSearchResults").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td><b><a target='_blank' href='"+link+"'>"+title+"</a></b></td></tr>").css("color","blue");
                $("#indeedSearchResults").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+"Company"+" : "+company+"</td></tr>").css("color","blue");
                $("#indeedSearchResults").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+"State"+" : "+state+"</td></tr>").css("color","blue");
                $("#indeedSearchResults").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+"Country"+" : "+country+"</td></tr>").css("color","blue");
                $("#indeedSearchResults").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+"Location"+" : "+loc+"</td></tr>").css("color","blue");
                $("#indeedSearchResults").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+"Job Snippet"+" : "+snippet+"</td></tr>").css("color","blue");
              }
              if(a == "jobtitle")
              {
                title = b;
              }
              if(a == "company" ) 
              {  
                company = b;
              }
              if(a == "city")
              {  
                city = b;  
              }
              if(a == "state")
              {
                state = b;
              }
              if(a == "country")
              {
                country = b;
              }
              if(a == "formattedLocation") 
              {
                loc = b;
              }
              if(a == "snippet")
              {
                snippet = b;
              }
            });
            link = "";
            title = "";
            loc = "";
            snippet = "";
            country = "";
            city = "";
            state = "";
            company = "";
            $("#indeedSearchResults").append("<hr>");
          });
        } // end of else for fetching data from the database
          
      } // end of all AJAX calls
    });
  }); 

  $(document).bind("ajaxStart.firstCall", function(){
      $("#ajax-loader").css("display", "block");
      $("#ajax-loader").show();
  });

  $(document).bind("ajaxStop.firstCall", function(){
      $("#ajax-loader").css("display", "none");
      $("#ajax-loader").hide();
  });



</script>
</html>
