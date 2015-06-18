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
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/postjob">Post a Job</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/freelancerfeeds">Freelancer Feeds</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/freelancerjobapps">Freelancer Job Applications</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/myjobpostings">My Job Postings</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/employer_searchjobs">Search Jobs</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane active" id="postjob">
                        <?php if($notif != "" || $notif != false || $notif != NULL)
                        {
                            if($notif == 1)
                            {
                                echo "<div class='alert alert-success'>
                                    <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                    <strong>Success!</strong> Your job has been posted.
                                </div>";
                            }
                            else
                            {
                                echo "<div class='alert alert-error'>
                                    <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                    <strong>Error!</strong> A problem has occurred while submitting your data. Please try again.
                                </div>";
                            }
                        }
                        ?>
                        <h1>POST A JOB</h1>
                        <div class="">
                            <form method="post" name="newjobfrm" id="newjobfrm" action="<?php echo base_url(); ?>core/post_job"><!--  onsubmit="return validateForm();"> -->
                                <div id="errordiv"><?php echo validation_errors(); ?></div>
                                <table class="" id="jobposttbl" name="jobposttbl">
                                  <td><?php //echo form_dropdown('receipient_name', $receipient, '', 'class="form-control" id="receipient_name"'); ?></td>
                                  <tr><td>Job Title:</td><td><input type="text" name="job_name" id="job_name" class="form-control" style="height: 90%;" placeholder="Type the job title or job name for this post"></td></tr>
                                  <tr><td>Job Description:</td><td><textarea name="job_description" id="job_description" class="form-control" style="height: 100px; width: 400px;" placeholder="Discuss the job description here"></textarea></td></tr>
                                  <tr><td>Job Type:</td><td><?php echo form_dropdown('job_type', $type, '', 'class="form-control" id="job_type"'); ?></td></tr>
                                  <tr><td>Job Duration:</td><td><?php echo form_dropdown('job_duration', $duration, '', 'class="form-control" id="job_duration"'); ?></td></tr>
                                  <tr><td>Job Level:</td><td><?php echo form_dropdown('job_level', $level, '', 'class="form-control" id="job_level"'); ?></td></tr>
                                  <tr><td>Job Category:</td><td><?php echo form_dropdown('job_category', $category, '', 'class="form-control" id="job_category"'); ?></td></tr>
                                  <tr><td>Job Requirements:</td><td><textarea name="job_requirements" id="job_requirements" class="form-control" style="height: 100px; width: 400px;" placeholder="Discuss the job requirements and necessary skills"></textarea></td></tr>
                                  <tr><td>Job Keywords:</td><td><input type="text" name="job_keywords" id="job_keywords" class="form-control" placeholder="Type keywords for freelancers"></td></tr>
                                  <tr><td></td><td></td></tr>
                                  <tr><td></td><td><center><input type="submit" class="btn btn-primary btn-large" id="postbtn" name="postbtn" aria-hidden="true" style="width: 50%;" value="Post"></center></td></tr>
                                </table>
                                <!-- <input type="submit" class="btn btn-primary" name="newjobbtn" id="newjobbtn" value="Post"> --> 
                                
                        </form>
                                <!-- MODAL FOR POSTING A JOB -->
                                <div id="modal-post-job" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-add-cart-label" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                          <h4 id="modal-add-cart-title">JOB POSTING DETAILS</h4>
                                          
                                       </div>
                                       <div class="modal-footer">
                                          <input type="submit" class="btn btn-danger btn-small" id="postbtn" name="postbtn" aria-hidden="true" value="POST"></button>
                                       </div>
                                     </div>
                                  </div>
                                </div>




                        </div>
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

<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.bootstrap.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
// AUTO-TRIGGER TABS AND ITS CONTENTS
// $("#homelink").click(function(){
//     document.getElementById('homelink1').click();
//     document.getElementById('homelink2').click();    
//     document.getElementById('homelink1').click();
// });

</script>
<script type="text/javascript">
// $('#newjobbtn').click(function(e){
//         e.preventDefault();
//         $('#modal-post-job').modal('show');
//         $("#modal-post-job").modal({
//             backdrop: "static"
//         });
        // $('#sendbtn').click(function(e){
        //     e.preventDefault();
        //     var rec_name = $('#receipient_name').val();
        //     // alert(rec_name);
        //     if(rec_name == "default")
        //         alert('This message cannot be sent due to no receipient!');
        //     else
        //         ;
        // });
        // $('#sendbtn').click(function(){
        //     $('#confirmationModal').modal('hide');
        // });
        // $('#nobtn').click(function(){
        //     $('#confirmationModal').modal('hide');
        // });         
    // });

  $(".clickableRow").click(function(event){
    var idclicked = event.target.dataset.id;
    alert(idclicked);
    $(".clickableRow").load('trial');
  });

  function validateForm()
  {
    var job_name = $('#job_name').val();
    var job_desc = $('#job_description').val();
    var job_type = $('#job_type').val();
    var job_dura = $('#job_duration').val();
    var job_level = $('#job_level').val();
    var job_cat = $('#job_category').val();
    var job_req = $('#job_requirements').val();

    if(job_name == "")
    {
        alert("Job posting cannot be saved due to missing fields!");
        $('#job_name').focus();
        return false;
    }
    else if(job_desc == "")
    {
        alert("Job posting cannot be saved due to missing fields!");
        $('#job_description').focus();
        return false;
    }
    else
    {
        alert("Validation passed!");
        return true;
    }
  }
</script>

<?php $this->load->view('footer_view'); ?>