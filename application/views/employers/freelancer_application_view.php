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
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"/>
 
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.11.1.js"></script>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.css"/>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
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
            <div class="tab-pane active" id="findworker">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/postjob">Post a Job</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/freelancerfeeds">Freelancer Feeds</a></li>
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/freelancerjobapps">Freelancer Job Applications</a></li>
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
                        <h4>NOTE: These are the job postings that this employer has created</h4>
                        <div class="">
                            
                        </div>
                    </div>
                    <div class="tab-pane active" id="freelancerjobapps">
                        <h1>JOB APPLICATION DETAILS</h1>
                        <h4>NOTE: This page shows all the job application details.</h4>
                        <div class="container-fluid">
                            <div class="col-md-4">
                                <h4>FREELANCER APPLICATION DETAILS</h4>
                                <center><div id="freelancer_img" style="height: 200px; width: 200px; background-color: none;">
                                        <img  class="img-rounded" src="<?php echo base_url(); ?>images/freelancers/<?php echo $prof_pic; ?>" 
                                        style="height: 200px; width: 200px;  background-color: none;"/></div></center>
                                <div class="container">
                                <form method="post" class="" action="<?php echo base_url(); ?>core/freelancer_details/<?php echo $free_id; ?>">
                                </div>
                                <table class="table">
                                    <tr>
                                        <!-- <td colspan="2"></td> -->
                                        <td colspan="2"><center><input type="submit" class="btn btn-default" value="View Freelancer Profile" name="viewbtn" id="viewbtn"></center></td>
                                        </form>
                                    </tr>
                                    <tr>
                                        <td><input type="button" class="btn btn-success" value="Approve" name="hirebtn" id="hirebtn"></td>
                                        <td><input type="button" class="btn btn-danger" value="Decline" name="rejectbtn" id="rejectbtn"></td>
                                    </tr>
                                        
                                    <tr><td>Fullname:</td><td><div class="" id="name"><strong><?php echo $name; ?></strong></div></td></tr>
                                    <tr><td>Username:</td><td><div class="" id="user" style="color: #0000CC;"><strong><?php echo $user; ?></strong></div></td></tr>
                                    <tr><td>Status:</td><td><div class="" id="stat"><i><?php echo $stat; ?></i></div></td></tr>    
                                    <tr><td>Date:</td><td><div class="" id="date"><?php echo $date; ?></div></td></tr>
                                </table>                           
                                <!-- </form> -->
                            </div>
                            <div class="col-md-8">
                                <h4>JOB DETAILS</h4>
                                <table class="table">
                                    <tr><td>Job Code:</td><td><div class="" id="job_code"><?php echo $job_code; ?></div></td></tr>
                                    <tr><td>Job Name: </td><td><div class="" id="job_name"><?php echo $job_name; ?></div></td></tr>
                                    <tr><td>Job Description: </td><td><div class="" id="job_description"><?php echo $job_description; ?></div></td></tr>
                                    <tr><td>Job Type: </td><td><div class="" id="job_type"><?php echo $job_type; ?></div></td></tr>
                                    <tr><td>Job Duration: </td><td><div class="" id="job_duration"><?php echo $job_duration; ?></div></td></tr>
                                    <tr><td>Job Level: </td><td><div class="" id="job_level"><?php echo $job_level; ?></div></td></tr>
                                    <tr><td>Job Category: </td><td><div class="" id="job_category"><?php echo $job_category; ?></div></td></tr>
                                    <tr><td>Job Requirements: </td><td><div class="" id="job_requirements"><?php echo $job_requirements; ?></div></td></tr>
                                    <tr><td>Job Keywords: </td><td><div class="" id="job_keywords"><?php echo $job_keywords; ?></div></td></tr>
                                </table>
                            </div>

                        <form method="post" class="" action="<?php echo base_url(); ?>core/respond_application/<?php echo $free_id; ?>/<?php echo $job_id ?>">
                            <div id="modal-hire-freelancer" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-hire-freelancer-label" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                      <h5 id="modal-hire-freelancer-title" class="modal-success-title">
                                        <strong>HIRE FREELANCER CONFIRMATION MODAL</strong></h5>
                                      
                                   </div>
                                   <div class="modal-body">
                                        <center><h1>Are you sure you want to hire this freelancer?</h1></center>
                                      <center><table id="messagetbl" name="messagetbl">
                                        <tr>
                                            <td><input type="submit" class="btn btn-success" name="confirmhireyes" id="confirmhireyes" value="YES"></td>
                                            <td><input type="submit" class="btn btn-danger" name="confirmhireno" id="confirmhireno" value="NO"></td>
                                        </tr>
                                      </table></center>
                                   </div>
                                   <div class="modal-footer">
                                   </div>
                                 </div>
                              </div>
                            </div>


                            <div id="modal-reject-freelancer" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-hire-freelancer-label" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                      <h5 id="modal-reject-freelancer-title" class="modal-danger-title">
                                        <strong>REJECT FREELANCER CONFIRMATION MODAL</strong></h5>
                                      
                                   </div>
                                   <div class="modal-body">
                                        <center><h1>Are you sure you want to reject this freelancer?</h1></center>
                                      <center><table id="messagetbl" name="messagetbl">
                                        <tr>
                                            <td><input type="submit" class="btn btn-success" name="confirmrejectyes" id="confirmrejectyes" value="YES"></td>
                                            <td><input type="submit" class="btn btn-danger" name="confirmrejectno" id="confirmrejectno" value="NO"></td>
                                        </tr>
                                      </table></center>
                                   </div>
                                   <div class="modal-footer">
                                   </div>
                                 </div>
                              </div>
                            </div>
                        </form>

                        </div>
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

    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.bootstrap.css"/>

    <script type="text/javascript" src="<?php echo base_url(); ?>js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myjobposts').dataTable();
    });
</script>
<script type="text/javascript">
    $('#hirebtn').click(function(e){
        e.preventDefault();
        $('#modal-hire-freelancer').modal('show');
        $("#modal-hire-freelancer").modal({
            backdrop: "static"
        });
    });

    $("#rejectbtn").click(function(e){
        e.preventDefault();
        $('#modal-reject-freelancer').modal('show');
        $("#modal-reject-freelancer").modal({
            backdrop: "static"
        });
    });

    // <form method="post" class="" action="<?php echo base_url(); ?>core/freelancer_details/<?php echo $free_id; ?>">

</script>
<?php $this->load->view('footer_view'); ?>