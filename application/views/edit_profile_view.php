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
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/viewmyprofile">My Online Resume</a></li>
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

                            <div id="freelancer_img" style="height: 200px; width: 200px; background-color: none;">
                                <img  class="img-rounded" src="<?php echo base_url(); ?>images/freelancers/<?php echo $photo; ?>" 
                                style="height: 200px; width: 200px;  background-color: none;"/></div>
                            <form name="editprofrm" id="editprofrm" method="post" action="<?php echo base_url(); ?>core/change_prof_pic">
                            <table class="">
                                <tr><td><h3><?php echo $fullname; ?></h3><h4><?php echo $title; ?></h4></td>
                                    <td><input type="submit" name="editprofbtn" id="editprofbtn" class="btn btn-default" value="Change Profile Pic"></td></tr>
                            </table>
                            </form>
                            <form name="editedfrm" id="editedfrm" method="post" action="<?php echo base_url(); ?>core/save_edited_profile">
                            <?php //print_r( $profile_data ); ?>
                            Skills: 
                            <div class="well">
                                <div class="col-med-10"><input type="text" name="skills_text" id="skills_text" class="form-control"></div>
                            </div><br>
                            Summary: <br>
                                <div class="span6">
                                    <input type="textarea" id="summary_box" name="summary_box" class="form-control">
                                </div>
                            <div class="span5">
                                <table class="table">
                                    <tr><td>Availability:</td><td>
                                        <select id="availability_sel" name="availability_sel">
                                            <option>part-time</option>
                                            <option>fulltime</option>
                                        </select>
                                    </td></tr>
                                    <tr><td>Education:</td><td><input type="text" id="educ_txt" name="educ_txt"></td></tr>
                                </table>
                            </div>
                            <input type="submit" name="submiteditbtn" id="submiteditbtn" class="btn btn-primary" value="Save">
                            </form>
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
    document.getElementById('viewmyprofile').click();

    var skills = '<?php echo $skills; ?>';
    document.getElementById('skills_text').value = skills;
    var avail = '<?php echo $availability; ?>';
    // alert(avail);
    document.getElementById('availability_sel').value = avail;
    var educ = '<?php echo $educ; ?>';
    // alert(educ);
    document.getElementById('educ_txt').value = educ;
    // THIS CAUSES A BUG IF YOU CALL $SUMMARY AND STORE THEM IN A JAVASCRIPT VAR!!!
    // IT SAYS ILLEGAL CHARATERS!!!!!!

</script>
<?php $this->load->view('footer_view'); ?>