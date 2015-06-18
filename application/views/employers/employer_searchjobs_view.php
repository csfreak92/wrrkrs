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
    <?php $this->load->view('header_view'); ?>
    <br><br><br>
    <div class="container">
        <!-- nav nav-tabs nav-justified -->
        <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
            <li role="presentation"><a href="<?php echo base_url(); ?>core/home" id="homelink">Home</a></li>
            <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/findworker" id="findlink">Find A Worker</a></li>
            <li role="presentation"><a href="<?php echo base_url(); ?>core/myprofile" id="profilelink">My Profile</a></li>
            <li role="presentation"><a href="<?php echo base_url(); ?>core/messages" id="messagelink">Messages</a></li>
        </ul>
        <br>
        <div id="my-tab-content" class="tab-content"> 
            <div class="tab-pane" id="home">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/employer_searchfreelancers" id="homelink1">Find Freelancers</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/employer_searchemployers" id="homelink2">Find Employers</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane" id="employer_searchfreelancers">
                    </div>
                    <div class="tab-pane" id="employer_searchemployers">
                        <h1>searchemployers TAB CONTENTS</h1>
                    </div>
                </div>
            </div>
            <div class="tab-pane active" id="findworker">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/postjob">Post a Job</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/freelancerfeeds">Freelancer Feeds</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/freelancerjobapps">Freelancer Job Applications</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/myjobpostings">My Job Postings</a></li>
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/employer_searchjobs">Search Jobs</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane" id="postjob">
                        <h1>POST A JOB</h1>
                    </div>    
                    <div class="tab-pane" id="freelancerfeeds">
                        <h1>FREELANCER FEEDS</h1>
                    </div>    
                    <div class="tab-pane" id="myjobpostings">
                        <h1>MY JOB POSTINGS</h1>
                    </div>
                    <div class="tab-pane active" id="employer_searchjobs">
                        <h1>SEARCH JOBS</h1>
                        WE'LL GET BACK TO THIS LATER.
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
                </div>
            </div>
            <div class="tab-pane" id="myprofile">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/employer_profile" data-toggle="tab">View My Profile</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/employer_myjobs">My Jobs</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/employer_myreports">My Reports</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane" id="employer_profile">
                        <h1>MY PROFILE</h1>
                    </div>    
                    <div class="tab-pane" id="employer_myjobs">
                        <h1>MY JOBS</h1>
                    </div>
                    <div class="tab-pane" id="employer_myreports">
                        <h1>MY REPORTS</h1>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="messages">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/employer_conversations">Conversations</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/employer_notifications">Notifications</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane" id="employer_conversations">
                        <h1>CONVERSATIONS</h1>
                    </div>    
                    <div class="tab-pane" id="employer_notifications">
                        <h1>NOTIFICATIONS</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            $("#searchresultsdiv").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td><a href='myjobdetails/"+geoId+"/1'>"+v+"</a></td></tr>").css("color","green");
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
                            $("#searchresultsdiv").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td><a href='myjobdetails/"+id+"/1'>"+v+"</a></td></tr>").css("color","green");
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
                        $("#searchresultsdiv").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td><a href='myjobdetails/"+geoId+"/1'>"+v+"</a></td></tr>").css("color","green");
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