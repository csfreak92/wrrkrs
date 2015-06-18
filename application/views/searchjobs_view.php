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
            <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
            <li role="presentation"><a href="<?php echo base_url(); ?>core/home" id="homelink">Home</a></li>
            <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/findwork" id="findlink">Find A Job</a></li>
            <li role="presentation"><a href="<?php echo base_url(); ?>core/myprofile" id="profilelink">My Profile</a></li>
            <li role="presentation"><a href="<?php echo base_url(); ?>core/messages" id="messagelink">Messages</a></li>
        </ul>
        <br>
        <div id="my-tab-content" class="tab-content"> 
            <div class="tab-pane" id="home">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/searchfreelancers" id="homelink1">Sub Home1</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/searchemployers" id="homelink2">Sub Home2</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane" id="searchfreelancers">
                        <h1>searchfreelancers TAB CONTENTS</h1>
                    </div>    
                    <div class="tab-pane" id="searchemployers">
                        <h1>searchemployers TAB CONTENTS</h1>
                    </div>
                </div>
            </div>
            <div class="tab-pane active" id="findwork">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/jobfeeds">Job Feeds</a></li>
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/searchjobs">Search Jobs</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/myapplications">My Applications</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane" id="jobfeeds">
                        <h1>JOB FEEDS</h1>
                        <p>ALL DATA FROM THE BACKEND ABOUT LATEST JOB FEEDS WILL BE DISPLAYED HERE</p>
                        <div class="container">
                            
                        </div>
                    </div>    
                    <div class="tab-pane active" id="searchjobs">
                        <h1>SEARCH JOBS</h1>
                        <div class="">
                            <center>
                            <form id="searchjobfrm" name="searchjobfrm" method="post">
                            <table style="border-spacing: 5px; border: 1px;">
                                <tr>
                                    <td style="padding: 5px;"><input type="text" name="searchbox" id="searchbox" style="height: 90%; margin-top: 5px; width: 500;" placeholder="Enter Search Keyword/s"></td>
                                    <td style="padding: 5px;"><input type="button" name="searchbtn" id="searchbtn" value="Search" class="btn btn-default large"></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px;"><input type="text" name="searchgeoloc" id="searchgeoloc" style="height: 90%; margin-top: 5px; width: 500;" placeholder="Search by City, Province or Region"></td>
                                    <td style="padding: 5px;"><input type="button" name="searchgeobtn" id="searchgeobtn" value="Search" class="btn btn-default large"></td>
                                </tr>
                            </table>
                            </form>
                            </center>
                            <table>
                            <div class="" id="searchresultsdiv" name="searchresultsdiv">
                                <hr>
                            </div>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="myapplications">
                        <h1>MY APPLICATIONS</h1>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="myprofile">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/viewmyprofile">View My Profile</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/tests">Tests</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/myjobs">My Jobs</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/myreports">My Reports</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane" id="viewmyprofile">
                        <h1>MY PROFILE</h1>
                    </div>    
                    <div class="tab-pane" id="tests">
                        <h1>TESTS</h1>
                    </div>
                    <div class="tab-pane" id="myjobs">
                        <h1>MY JOBS</h1>
                    </div>
                    <div class="tab-pane" id="myreports">
                        <h1>MY REPORTS</h1>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="messages">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/conversations">Conversations</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/notifications">Notifications</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane" id="conversations">
                        <h1>CONVERSATIONS</h1>
                    </div>    
                    <div class="tab-pane" id="notifications">
                        <h1>NOTIFICATIONS</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- </div> -->



<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
<script type="text/javascript">
$('#searchbtn').click(function(e){
    e.preventDefault();
    $("#searchresultsdiv").empty();
    var locKeySpace = document.getElementById('searchgeoloc').value;
    var workLocation = "";
    var postData = $('#searchjobfrm').serialize();
    var id = "";
    $.ajax({
        type: "POST", 
        data: postData, 
        async: false, 
        cache: false, 
        dataType: "JSON",
        url: 'search_for_job',
        error: function(e, status){
            alert(e+status);
            console.log(e);
            console.log(status);
        },
        success: function(data, status){
            if(locKeySpace != "")
            {
                $.each(data, function(key,value){
                    $.each(value, function(k, v){
                        if(k == "job_id")
                        {
                            geoId = v;
                        }
                        else if(k == "emp_id" || k == "emp_job_id")
                        {
                            ;
                        }
                        else if(k == "job_name")
                        {
                            $("#searchresultsdiv").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td><a href='jobdetails/"+geoId+"/1'>"+v+"</a></td></tr>").css("color","green");
                        }
                        else if(k == "emp_city")
                        {
                            workLocation += v;
                        }
                        else if(k == "emp_state_province_region" || k == "emp_country" || k == "emp_zipcode")
                        {
                            workLocation = workLocation + ", " + v;
                        }
                        else
                        {
                            $("#searchresultsdiv").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+v+"</td></tr>").css("color","blue");
                        }
                        
                    });
                    $("#searchresultsdiv").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+workLocation+"</td></tr>").css("color","blue");
                    $("#searchresultsdiv").append("<hr>");
                });
            }
            else
            {
                $.each(data, function(key,value){
                    $.each(value, function(k, v){
                        if(k == "job_id")
                        {
                            id = v;
                        }
                        else if(k == "job_name")
                        {
                            $("#searchresultsdiv").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td><a href='jobdetails/"+id+"/1'>"+v+"</a></td></tr>").css("color","green");
                        }
                        else
                        {
                            $("#searchresultsdiv").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+v+"</td></tr>").css("color","blue");
                        }
                        
                    });
                    $("#searchresultsdiv").append("<hr>");
                });                
            }
            console.log(data);
        }
    });
});

$('#searchgeobtn').click(function(e){
    e.preventDefault();
    $("#searchresultsdiv").empty();
    var geoPostData = $('#searchjobfrm').serialize();
    var geoId = "";
    var workLoc = "";
    $.ajax({
        type: "POST", 
        data: geoPostData, 
        async: false, 
        cache: false, 
        dataType: "JSON",
        url: 'search_for_job',
        error: function(e, status){
            alert(e+status);
            console.log(e);
            console.log(status);
        },
        success: function(data, status){
            $.each(data, function(key,value){
                $.each(value, function(k, v){
                    if(k == "job_id")
                    {
                        geoId = v;
                    }
                    else if(k == "emp_id" || k == "emp_job_id")
                    {
                        ;
                    }
                    else if(k == "job_name")
                    {
                        $("#searchresultsdiv").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td><a href='jobdetails/"+geoId+"/1'>"+v+"</a></td></tr>").css("color","green");
                    }
                    else if(k == "emp_city")
                    {
                        workLoc += v;
                    }
                    else if(k == "emp_state_province_region" || k == "emp_country" || k == "emp_zipcode")
                    {
                        workLoc = workLoc + ", " + v;
                    }
                    else
                    {
                        $("#searchresultsdiv").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+v+"</td></tr>").css("color","blue");
                    }
                    
                });
                $("#searchresultsdiv").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+workLoc+"</td></tr>").css("color","blue");
                $("#searchresultsdiv").append("<hr>");
            });
            console.log(data);
        }
    });
});

</script>
<?php $this->load->view('footer_view'); ?>