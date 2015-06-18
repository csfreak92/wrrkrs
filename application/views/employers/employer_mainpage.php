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
            <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/home" id="homelink">Home</a></li>
            <li role="presentation"><a href="<?php echo base_url(); ?>core/findworker" id="findlink">Find A Worker</a></li>
            <li role="presentation"><a href="<?php echo base_url(); ?>core/myprofile" id="profilelink">My Profile</a></li>
            <li role="presentation"><a href="<?php echo base_url(); ?>core/messages" id="messagelink">Messages</a></li>
        </ul>
        <br>
        <div id="my-tab-content" class="tab-content"> 
            <div class="tab-pane active" id="home">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/employer_searchfreelancers" id="homelink1">Find Freelancers</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/employer_searchemployers" id="homelink2">Find Employers</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane active" id="employer_searchfreelancers">
                        <h1>Search Freelancers</h1>
                        <div class="">
                        <form id="searchfreelancerfrm" name="searchfreelancerfrm" method="post">
                            <table style="border-spacing: 5px; border: 1px;">
                                <tr>
                                    <td style="padding: 5px;"><input type="text" name="keybox" id="keybox" style="height: 90%; margin-top: 5px; width: 500;" placeholder="Enter Search Keyword/s"></td>
                                    <td style="padding: 5px;"><input type="button" name="searchbtn" id="searchbtn" value="Search Freelancer" class="btn btn-default large"></td>
                                </tr>
                            </table>
                        </form>
                        </div>
                    </div>
                    <div class="" id="resultsdiv">

                    </div>

                    <div class="tab-pane" id="employer_searchemployers">
                        <h1>searchemployers TAB CONTENTS</h1>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="findworker">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/postjob">Post a Job</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/freelancerfeeds">Freelancer Feeds</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/myjobpostings">My Job Postings</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/employer_searchjobs">Search Jobs</a></li>
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
                    <div class="tab-pane" id="employer_searchjobs">
                        <h1>SEARCH JOBS</h1>
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
// AUTO-TRIGGER TABS AND ITS CONTENTS
$("#homelink").click(function(){
    document.getElementById('homelink1').click();
    document.getElementById('homelink2').click();    
    document.getElementById('homelink1').click();
});

</script>
<script type="text/javascript">
$('#searchbtn').click(function(e){
    e.preventDefault();
    $("#resultsdiv").empty();
    var workLocation = "";
    var name = "";
    var postData = $('#searchfreelancerfrm').serialize();
    var id = "";
    $.ajax({
        type: "POST", 
        data: postData, 
        async: false, 
        cache: false, 
        dataType: "JSON",
        url: 'search_for_freelancer',
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
                    else if(k == "freelancer_id")
                    {
                        id = v;
                    }
                    else if(k == "freelancer_first_name" )
                    {
                        name += v;
                    }
                    else if(k == "freelancer_last_name")
                    {
                        name = name + " " + v;
                        // $("#resultsdiv").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td><a href='jobdetails/"+geoId+"/1'>"+v+"</a></td></tr>").css("color","green");
                        $("#resultsdiv").append("<div class='' name='resultsdiv' id='resultsdiv'>"+"<tr><td><a href='freelancer_details/"+id+"'>"+name+"</a></td></tr>").css("color","blue");
                    }
                    else if(k == "freelancer_address")
                    {
                        workLocation += v;
                    }
                    else if(k == "freelancer_city" || k == "freelancer_country" || k == "freelancer_state_province_region" || k == "freelancer_zipcode")
                    {
                        workLocation = workLocation + ", " + v;
                    }
                    else
                    {
                        $("#resultsdiv").append("<div class='' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+v+"</td></tr>").css("color","black");
                    }
                });
                $("#resultsdiv").append("<div class='' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+workLocation+"</td></tr>").css("color","black");
                $("#resultsdiv").append("<hr>");
                workLocation = "";
                name = "";
                id = "";
            });
        }
    });
});
</script>
<?php $this->load->view('footer_view'); ?>