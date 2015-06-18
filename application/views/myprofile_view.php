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
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"/>
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
                        <h1>SEARCH JOBS</h1>
                    </div>
                    <div class="tab-pane" id="myapplications">
                        <h1>MY APPLICATIONS</h1>
                    </div>
                </div>
            </div>
            <div class="tab-pane active" id="myprofile">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/viewmyprofile" data-toggle="tab">My Online Resume</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/tests">Tests</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/myjobs">My Jobs</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/myreports">My Reports</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane active" id="viewmyprofile">
                        <!-- <h1>MY PROFILE</h1> -->
                        <div class="" id="onlineResume">
                            <!-- THIS SHOULD CONTAIN ALL ABOUT MY PROFILE. 
                            IT SHOULD FUNCTION AS AN ONLINE RESUME. -->
                            <br>
                            <div id="freelancer_img" style="height: 200px; width: 200px; background-color: none;">
                                <img  class="img-rounded" src="<?php echo base_url(); ?>images/freelancers/<?php echo $photo; ?>" 
                                style="height: 200px; width: 200px;  background-color: none;"/></div>
                            <form name="editprofrm" id="editprofrm" method="post" action="<?php echo base_url(); ?>core/edit_my_profile">
                            <table class="">
                                <tr><td><h3><?php echo $fullname; ?></h3><h4><i><?php echo $uname; ?></i></h4><h4><?php echo $title; ?></h4><h5><?php echo $email; ?></h5></td>
                                    <td><input type="submit" name="editprofbtn" id="editprofbtn" class="btn btn-default" value="Edit My Profile"></td></tr>
                            </table>
                            </form>
                            <?php //print_r( $profile_data ); ?>
                            Skills: <ol class="breadcrumb">
                                <li><?php echo $skills; ?></li>
                            </ol><br>
                            Summary: <br>
                                <div class="span6">
                                <?php echo $summary; ?>
                                </div>
                            <div class="span5">
                                <table class="table">
                                    <tr><td>Availability:</td><td><?php echo $availability; ?></td></tr>
                                    <tr><td>Rating:</td><td><?php echo $rating; ?>%</td></tr>
                                    <tr><td>Education:</td><td><?php echo $educ; ?></td></tr>
                                    <tr><td>Address:</td><td><?php echo $address; ?></td></tr>
                                    <tr><td>Country:</td><td><?php echo $country; ?></td></tr>
                                    <tr><td>Zip Code:</td><td><?php echo $zip; ?></td></tr>
                                </table>
                            </div>
                            <div class="span2"></div>
                            <br>
                        </div>
                        
                        <div class="well span10">
                            <h4>PROJECT PORTFOLIO</h4>
                            <img src="<?php echo base_url(); ?>images/freelancers/" alt="..." id="first_pic" name="first_pic" class="first_pic"><br><br>
                            <img src="<?php echo base_url(); ?>images/freelancers/" alt="..." id="second_pic" name="second_pic" class="second_pic"><br><br>
                            <img src="<?php echo base_url(); ?>images/freelancers/" alt="..." id="third_pic" name="third_pic" class="third_pic"><br><br>
                        </div><br><br><br>
                        <div class="well span10">
                            <h4>WORK EXPERIENCE</h4>
                        </div><br><br><br>
                        <div class="well span10">
                            <h4>TESTS</h4>
                        </div>
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

// AUTO-TRIGGER TABS AND ITS CONTENTS
    //document.getElementById('viewmyprofile').click();
</script>
<script type="text/javascript">
    var arr = "<?php echo $portfolio; ?>";
    new_arr = arr.split(", ");
    var len = new_arr.length;
    console.log(len);
    console.log(new_arr);
    var frs = $('.first_pic').attr("src");
    frs += new_arr[0];
    $('.first_pic').attr("src", frs);
    var sec = $('.second_pic').attr("src");
    sec += new_arr[1];
    $('.second_pic').attr("src", sec);
    var trd = $('.third_pic').attr("src");
    trd += new_arr[2];
    $('.third_pic').attr("src", trd);
    console.log(frs);
    console.log(sec);
    console.log(trd);
    console.log(ra);
</script>
<?php $this->load->view('footer_view'); ?>