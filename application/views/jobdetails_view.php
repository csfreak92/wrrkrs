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
                        <h1>JOB DETAILS</h1>
                        <!-- <div class="row">
                            <div class="span12" style="background-color: yellow;">
                                level 1 column
                                <div class="row">
                                    <div class="span9" style="background-color: blue;">level 2</div>
                                    <div class="span3" style="background-color: green;">level 2</div>
                                </div>
                            </div>
                        </div>
                        <br> -->

                        <div class="col-md-8">
                                <!-- BODY CONTENT -->
                            <!-- <h3>JOB DETAILS</h3> -->
                            <div class="">
                                <?php echo $job_name; ?><br>
                                <div class="" id="jobdetails">
                                    Job Code: <?php echo $job_code; ?><br>
                                    <table class="table">
                                        <tr>
                                            <td><?php echo $job_type; ?></td>
                                            <td><?php echo $job_duration ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $job_level; ?></td>
                                            <td><?php echo $job_category; ?></td>
                                        </tr>
                                    </table>
                                    
                                    Job Description: <br><?php echo $job_description; ?><br>
                                            <br>
                                    Job Requirements: <br><?php echo $job_requirements; ?><br>
                                    <br><?php echo $job_keywords; ?><br>
                                </div>
                                
                                <table>
                                </table>
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <!-- THIS SHOULD CONTAIN COMPANY PROFILE -->
                            <!-- SIDE CONTENT -->
                            <h3>COMPANY/EMPLOYER DETAILS</h3>
                            <form name="jobappfrm" id="jobappfrm" method="post" action="<?php echo base_url(); ?>core/apply_to_job">
                                <center><table>
                                    <tr>
                                    <?php //echo $job_status; 
                                        if($job_status == "hired")
                                            echo '<td><input type="submit" id="jobappsubmitbtn" name="jobappsubmitbtn" disabled="disabled" value="Hired" class="btn btn-success"></td>';
                                        else if($job_status == "applied")
                                            echo '<td><input type="submit" id="jobappsubmitbtn" name="jobappsubmitbtn" disabled="disabled" value="Application Submitted" class="btn btn-success"></td>';
                                        else
                                            echo '<td><input type="submit" id="jobappsubmitbtn" name="jobappsubmitbtn" value="Apply Now" class="btn btn-success"></td>';
                                    ?>
                                        <input type="hidden" id="hiddenid" name="hiddenid">
                                    </tr>
                                </table></center>
                            </form>
                            <table class="table">
                                <tr><td>Company Name</td><td>Nueca</td></tr>
                                <tr><td>Company Size</td><td></td></tr>
                                <tr><td>Industry</td><td></td></tr>
                                <tr><td>Company Overview</td><td></td></tr>
                                <tr><td>Company Headquarters</td><td></td></tr>
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

<script type="text/javascript">
    var y = '<?php echo $id ?>';
    document.getElementById('hiddenid').value = y;
</script>
<?php $this->load->view('footer_view'); ?>