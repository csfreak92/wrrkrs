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
    <ul class="nav nav-tabs nav-justified" id="tabs" data-tabs="tabs">
        <li role="presentation" class="active"><a href="#home" data-toggle="tab" id="homelink">Home</a></li>
        <li role="presentation"><a href="#findwork" data-toggle="tab" id="findlink">Find Work</a></li>
        <li role="presentation"><a href="#myprofile" data-toggle="tab" id="profilelink">My Profile</a></li>
        <li role="presentation"><a href="#messages" data-toggle="tab" id="messagelink">Messages</a></li>
    </ul>
    <div id="my-tab-content" class="tab-content"> 
        <div class="tab-pane active" id="home">
        <!--     <h1>HOME TAB</h1>
            <h3>HOME CONTENTS</h3> -->
            <ul class="nav nav-tabs nav-justified" id="tabs" data-tabs="tabs">
                <li role="presentation" class="active"><a href="#subhome1" data-toggle="tab" id="homelink1">Sub Home1</a></li>
                <li role="presentation"><a href="#subhome2" data-toggle="tab" id="homelink2">Sub Home2</a></li>
            </ul>
            <div id="my-tab-content" class="tab-content"> 
                <div class="tab-pane active" id="subhome1">
                    <h1>Subhome1 TAB CONTENTS</h1>
                </div>    
                <div class="tab-pane" id="subhome2">
                    <h1>Subhome2 TAB CONTENTS</h1>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="findwork">
            <!-- <h1>FIND WORK TAB</h1>
            <h3>WORK CONTENTS</h3> -->
            <ul class="nav nav-tabs nav-justified" id="tabs" data-tabs="tabs">
                <li role="presentation" class="active"><a href="#jobfeeds" data-toggle="tab">Job Feeds</a></li>
                <li role="presentation"><a href="#searchjobs" data-toggle="tab">Search Jobs</a></li>
                <li role="presentation"><a href="#myapplications" data-toggle="tab">My Applications</a></li>
            </ul>
            <div id="my-tab-content" class="tab-content"> 
                <div class="tab-pane active" id="jobfeeds">
                    <h1>JOB FEEDS</h1>
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
            <!-- <h1>MY PROFILE TAB</h1>
            <h3>MY PROFILE CONTENTS</h3> -->
            <ul class="nav nav-tabs nav-justified" id="tabs" data-tabs="tabs">
                <li role="presentation" class="active"><a href="#viewmyprofile" data-toggle="tab">View My Profile</a></li>
                <li role="presentation"><a href="#tests" data-toggle="tab">Tests</a></li>
                <li role="presentation"><a href="#myjobs" data-toggle="tab">My Jobs</a></li>
                <li role="presentation"><a href="#myreports" data-toggle="tab">My Reports</a></li>
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
            <!-- <h1>MESSAGES TAB</h1>
            <h3>MESSAGES CONTENTS</h3> -->
            <ul class="nav nav-tabs nav-justified" id="tabs" data-tabs="tabs">
                <li role="presentation" class="active"><a href="#conversations" data-toggle="tab">Conversations</a></li>
                <li role="presentation"><a href="#notifications" data-toggle="tab">Notifications</a></li>
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




<script type="text/javascript">
// AUTO-TRIGGER TABS AND ITS CONTENTS
$("#homelink").click(function(){
    document.getElementById('homelink1').click();
    document.getElementById('homelink2').click();    
    document.getElementById('homelink1').click();
});

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
</body>
</html>