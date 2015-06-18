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
                    <div class="tab-pane active" id="searchfreelancers">
                        <h1>searchfreelancers TAB CONTENTS</h1>
                    </div>    
                    <div class="tab-pane" id="searchemployers">
                        <h1>searchemployers TAB CONTENTS</h1>
                    </div>
                </div>
            </div>
            <div class="tab-pane active" id="findwork">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/jobfeeds">Job Feeds</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/searchjobs">Search Jobs</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/myapplications">My Applications</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane active" id="jobfeeds">
                        <h1>JOB FEEDS</h1>
                        <p>NOTE: These job feeds are based on your geolocation as what you put in your profile.</p>
                        <div class="container" id="jobfeedsdiv">
                            
                        </div>
                    </div>    
                    <div class="tab-pane" id="searchjobs">
                        <h1>SEARCH JOBS</h1>
                    </div>
                    <div class="tab-pane" id="myapplications">
                        <h1>MY APPLICATIONS</h1>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="myprofile">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/viewmyprofile">View My Profile</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/tests">Tests</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/myjobs">My Jobs</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/myreports">My Reports</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane active" id="viewmyprofile">
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
                <ul class="nav nav-tabs nav-justified" id="tabs" data-tabs="tabs">
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/conversations">Conversations</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/notifications">Notifications</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane active" id="conversations">
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
// AUTO-TRIGGER TABS AND ITS CONTENTS
// $("#homelink").click(function(){
//     document.getElementById('homelink1').click();
//     document.getElementById('homelink2').click();    
//     document.getElementById('homelink1').click();
// });
//     $('.clickableRow').click(function(event) {
//         var a = event.target.dataset.key;
//         window.document.location='sampleProgramData/'+a;
//     });
//
</script>
<script type="text/javascript">
    var x = <?php echo $feeds; ?>;
    var id = "";
    $.each(x, function(key,value){
        $.each(value, function(k, v){
            // alert("key is : "+k);
            // alert("value is : "+v);
            // FIX THIS UI LAYOUT LATER. FOR NOW ITS GOOD THAT ITS WORKING WELL. I JUST HAVE TO LAY THIS THING OUT.
            // $("#jobfeedsdiv").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+v+"</td></tr>").css("color","blue");
            if(k == "job_id")
            {
                id = v;
            }
            else if(k == "job_name")
            {
                $("#jobfeedsdiv").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td><a href='jobdetails/"+id+"/1'>"+v+"</a></td></tr>").css("color","green");
            }
            else
            {
                $("#jobfeedsdiv").append("<div class='container' name='resultsdiv' id='resultsdiv'>"+"<tr><td>"+v+"</td></tr>").css("color","blue");
            }
        });
        $("#jobfeedsdiv").append("<hr>");
    });
</script>
<?php $this->load->view('footer_view'); ?>