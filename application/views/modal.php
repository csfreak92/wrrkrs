<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="New Freelance Platform for Canadian Locals">
    <title>FREELANCE PLATFORM</title>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
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
        MESSAGES PAGE
            <ul class="nav nav-tabs nav-justified" id="tabs" data-tabs="tabs">
            <li role="presentation"><a href="<?php echo base_url(); ?>core/home" id="homelink">Home</a></li>
            <li role="presentation"><a href="<?php echo base_url(); ?>core/findwork" id="findlink">Find A Job</a></li>
            <li role="presentation"><a href="<?php echo base_url(); ?>core/myprofile" id="profilelink">My Profile</a></li>
            <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/messages" id="messagelink">Messages</a></li>
        </ul>
        <br>
        <div id="my-tab-content" class="tab-content"> 
            <div class="tab-pane" id="home">
                <ul class="nav nav-tabs nav-justified" id="tabs" data-tabs="tabs">
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/searchfreelancers" id="homelink1">Sub Home1</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/searchemployers" data-toggle="tab" id="homelink2">Sub Home2</a></li>
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
                <ul class="nav nav-tabs nav-justified" id="tabs" data-tabs="tabs">
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
                        <h1>SEARCH JOBS</h1>
                    </div>
                    <div class="tab-pane" id="myapplications">
                        <h1>MY APPLICATIONS</h1>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="myprofile">
                <ul class="nav nav-tabs nav-justified" id="tabs" data-tabs="tabs">
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/viewmyprofile" data-toggle="tab">View My Profile</a></li>
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
            <div class="tab-pane active" id="messages">
                <ul class="nav nav-tabs nav-justified" id="tabs" data-tabs="tabs">
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/conversations">Conversations</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/notifications">Notifications</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane active" id="conversations">
                        <h1>CONVERSATIONS</h1>
                        <p>Listed here are the conversations in a chat manner type.</p>
                        <div class="">
                            <form name="newmsgfrm" id="newmsgfrm" method="post" action="<?php echo base_url(); ?>core/create_new_msg">
                            <table>
                                <tr><td><input type="button" name="newmsgbtn" id="newmsgbtn" class="btn btn-default" value="New Message"></td></tr>
                                <tr><td>
                                    <!-- <p><b><a href="#" onclick="return false;" data-toggle="modal" data-target="#confirmationModal">SIMULATE ERROR</a></b></p> -->
                                    <!-- <p><b><a href="#" onclick="return false;" data-toggle="modal" data-target="#modal-add-cart">SIMULATE ERROR</a></b></p> -->
                                    <!-- <p><b><a href="#" onclick="return false;" data-target="#modal-add-cart">SIMULATE ERROR</a></b></p> -->
                                    
                                </td></tr>
                            </table>


 
<div id="modal-add-cart" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-add-cart-label" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 id="modal-add-cart-title">QUESTION</h4>
        <textarea id="textareaID"></textarea>
     </div>
     <div class="modal-footer">
        <button class="btn btn-danger btn-small" data-dismiss="modal" aria-hidden="true">STAY</button>
        <a class="btn btn-danger btn-small" href="new_page.php">CHANGE SITE</a>
     </div>
   </div>
</div>
</div>

<!-- MODAL FROM BOOTSTRAP 3 TUTORIAL ONLINE. NEED TO FIX THIS!!!!! ASAP!!!! THERE IS A BUG HERE -->
<!-- <div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmationModal" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Welcome</h3>
  </div>
  <div class="modal-body">
    <p> Hello </p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>
 -->

                            </form>
                        </div>
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

</script>
<script type="text/javascript">
// $('#newmsgbtn').click(function(e){
//         e.preventDefault();
//         alert('sigup clicked!');
//         $('#confirmationModal').modal('show');
//         alert('after modal show!');
//         $("#confirmationModal").modal({
//             backdrop: "static"
//         });
//         alert('after executing all!');
//         // $('#yesbtn').click(function(){
//         //     $('#confirmationModal').modal('hide');
//         // });
//         // $('#nobtn').click(function(){
//         //     $('#confirmationModal').modal('hide');
//         // });         
//     });


$('#newmsgbtn').click(function(e){
        e.preventDefault();
        alert('sigup clicked!');
        $('#modal-add-cart').modal('show');
        alert('after modal show!');
        $("#modal-add-cart").modal({
            backdrop: "static"
        });
        alert('after executing all!');
        // $('#yesbtn').click(function(){
        //     $('#confirmationModal').modal('hide');
        // });
        // $('#nobtn').click(function(){
        //     $('#confirmationModal').modal('hide');
        // });         
    });
</script>
<?php $this->load->view('footer_view'); ?>