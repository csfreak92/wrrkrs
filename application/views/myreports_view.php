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
            <li role="presentation"><a href="<?php echo base_url(); ?>core/findwork" id="findlink">Find A Job</a></li>
            <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/myprofile" id="profilelink">My Profile</a></li>
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
            <div class="tab-pane" id="findwork">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/jobfeeds">Job Feeds</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/searchjobs">Search Jobs</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/myapplications">My Applications</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane" id="jobfeeds">
                        <h1>JOB FEEDS</h1>
                        <p>ALL DATA FROM THE BACKEND ABOUT LATEST JOB FEEDS WILL BE DISPLAYED HERE</p>
                        <div class="container">
                            
                        </div>
                    </div>    
                    <div class="tab-pane" id="searchjobs">
                        <h1>MY APPLICATIONS</h1>
                    </div>
                    <div class="tab-pane" id="myapplications">
                        <h1>MY APPLICATIONS</h1>
                    </div>
                </div>
            </div>
            <div class="tab-pane active" id="myprofile">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/viewmyprofile">My Online Resume</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/tests">Tests</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/myjobs">My Jobs</a></li>
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/myreports">My Reports</a></li>
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
                    <div class="tab-pane active" id="myreports">
                        <h1>MY REPORTS</h1>
                        <div class="container">
                            HERE GOES THE REPORTS OF EARNINGS, HOURS BILLED, ETC. ETC...
                        </div>
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




<script type="text/javascript">
// AUTO-TRIGGER TABS AND ITS CONTENTS
// $("#homelink").click(function(){
//     document.getElementById('homelink1').click();
//     document.getElementById('homelink2').click();    
//     document.getElementById('homelink1').click();
// });

// $("#homelink").click(function(){
//     document.getElementById('homelink1').click();
//     document.getElementById('homelink2').click();    
// });

// $("#homelink").click(function(){
//     document.getElementById('homelink1').click();
//     document.getElementById('homelink2').click();    
// });

// $("#homelink").click(function(){
//     document.getElementById('homelink1').click();
//     document.getElementById('homelink2').click();    
// });


//     $( document ).ready(function(){
//         $('#stud').dataTable();
//     });


//     $('.clickableRow').click(function(event) {
//         var a = event.target.dataset.key;
//         window.document.location='sampleProgramData/'+a;
//     });
// </script>
<script type="text/javascript">
// // detailProgram
// $('#delProgram,.toggle').on('gumby.onTrigger', function(event) {
//         event.preventDefault();
//         var mykey = event.target.dataset.key;
//         $.ajax({
//             type: "POST",   
//             url: 'delete_program/'+mykey, 
//             success: function(data, status){
//                 alert('SUCCESSFULLY DELETED A RECORD!');
//                 location.reload(true);
//             }, 
//            error: function(e, status){
//                 // alert("There is a/an "+e+" , "+status);
//                 alert("Error: Cannot delete this program record since there are students and employees linked to this data");
//             }
//         });
//     }).trigger('gumby-trigger')

//     $('#addStudent,.switch').on('gumby.onTrigger', function(event) {
//         event.preventDefault();
//     }).trigger('gumby-trigger')

</script>
<?php $this->load->view('footer_view'); ?>