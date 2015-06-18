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
            <li role="presentation"><a href="<?php echo base_url(); ?>core/findworker" id="findlink">Find A Worker</a></li>
            <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/myprofile" id="profilelink">My Profile</a></li>
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
            <div class="tab-pane active" id="myprofile">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/employer_profile">View My Profile</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/employer_myjobs">My Jobs</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/employer_myreports">My Reports</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane active" id="employer_profile">
                        <h1>MY PROFILE</h1>
                            <div class="" id="onlineResume">
                                <!-- THIS SHOULD CONTAIN ALL ABOUT MY PROFILE. 
                                IT SHOULD FUNCTION AS AN ONLINE RESUME. -->
                                <br>
                                <div id="employer_img" style="height: 200px; width: 200px; background-color: none;">
                                    <img  class="img-rounded" src="<?php echo base_url(); ?>images/employers/<?php echo $photo; ?>" 
                                    style="height: 200px; width: 200px;  background-color: none;"/></div>
                                <form name="editprofrm" id="editprofrm" method="post" action="<?php echo base_url(); ?>core/edit_employer_profile">
                                <table class="">
                                    <tr><td><h3><?php echo $fullname; ?></h3><h4><i><?php echo $uname; ?></i></h4><h4><?php //echo $title; ?></h4><h5><?php echo $email; ?></h5></td>
                                        <td><input type="submit" name="editprofbtn" id="editprofbtn" class="btn btn-default" value="Edit My Profile"></td></tr>
                                </table>
                                </form>

                                Summary: <br>
                                    <div class="span6">
                                    <?php echo $summary; ?>
                                    </div>
                                 <div class="span5">Employer Details
                                    <table class="table">
                                        <tr><td>Rating:</td><td><?php echo $rating; ?>%</td></tr>
                                        <tr><td>Email:</td><td><?php echo $email; ?></td></tr>
                                        <tr><td>Contact Number:</td><td><?php echo $contact; ?></td></tr>
                                        <tr><td>Address:</td><td><?php echo $address; ?></td></tr>
                                        <tr><td>City:</td><td><?php echo $city; ?></td></tr>
                                        <tr><td>State:</td><td><?php echo $state; ?></td></tr>
                                        <tr><td>Country:</td><td><?php echo $country; ?></td></tr>
                                        <tr><td>Industry:</td><td><?php echo $industry; ?></td></tr>
                                    </table>
                                </div>
                                <div class="span2"></div>
                                <br>
                            </div>
                            
                            <div class="well span10">
                                <h4>EMPLOYER SCREENSHOTS</h4>
                                <div class="span3">
                                    <img src="<?php echo base_url(); ?>images/employers/" alt="..." id="first_pic" name="first_pic" class="first_pic"><br><br>
                                </div>
                                <div class="span3">
                                    <img src="<?php echo base_url(); ?>images/employers/" alt="..." id="second_pic" name="second_pic" class="second_pic"><br><br>
                                </div>
                                <div class="span3">
                                    <img src="<?php echo base_url(); ?>images/employers/" alt="..." id="third_pic" name="third_pic" class="third_pic"><br><br>
                                </div>
                            </div><br><br>
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
// $("#homelink").click(function(){
//     document.getElementById('homelink1').click();
//     document.getElementById('homelink2').click();    
//     document.getElementById('homelink1').click();
// });
</script>
<?php $this->load->view('footer_view'); ?>