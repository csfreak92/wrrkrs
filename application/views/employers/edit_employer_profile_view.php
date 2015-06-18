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
                                <!-- THIS SHOULD CONTAIN ALL ABOUT THE EMPLOYER'S PROFILE. -->
                                
                                <br>
                                <div id="employer_img" style="height: 200px; width: 200px; background-color: none;">
                                    <img  class="img-rounded" src="<?php echo base_url(); ?>images/employers/<?php echo $photo; ?>" 
                                    style="height: 200px; width: 200px;  background-color: none;"/>
                                </div>
                                <form name="editprofrm" id="editprofrm" method="post" action="<?php echo base_url(); ?>core/change_prof_pic">
                                <table class="">
                                    <tr><td><h3><?php echo $fullname; ?></h3><h4><i><?php echo $uname; ?></i></h4><h5><?php echo $email; ?></h5></td>
                                        <td><input type="submit" name="editprofbtn" id="editprofbtn" class="btn btn-default" value="Change Profile Pic"></td></tr>
                                </table>
                                </form>
                                <form name="editempprofrm" id="editempprofrm" method="post" action="<?php echo base_url(); ?>core/save_edited_emp_profile">
                                <h4>Summary:</h4><br>
                                    <div class="span6">
                                        <input type="textarea" id="summary_box" name="summary_box" class="form-control" style="height: 400px; width: 100%;" value="<?php echo $summary ?>">
                                    </div>
                                 <div class="span5"><h4>Employer Details:</h4>
                                    <table class="table">
                                        <tr><td>Rating:</td><td><input type="textarea" id="rating_text" name="rating_text" class="form-control"></td></tr>
                                        <tr><td>Email:</td><td><input type="textarea" id="email_text" name="email_text" class="form-control"></td></tr>
                                        <tr><td>Contact Number:</td><td><input type="textarea" id="contact_text" name="contact_text" class="form-control"></td></tr>
                                        <tr><td>Address:</td><td><input type="textarea" id="address_text" name="address_text" class="form-control"></td></tr>
                                        <tr><td>City:</td><td><input type="textarea" id="city_sel" name="city_sel" class="form-control"></td></tr>
                                        <tr><td>State:</td><td><input type="textarea" id="state_sel" name="state_sel" class="form-control"></td></tr>
                                        <tr><td>Country:</td><td><input type="textarea" id="country_sel" name="country_sel" class="form-control"></td></tr>
                                        <tr><td>Industry:</td><td><input type="textarea" id="industry_text" name="industry_text" class="form-control"></td></tr>
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
                            </div>
                            <input type="submit" name="savebtn" id="savebtn" value="Save" class="btn btn-primary">
                            </form>
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
    //!ATTENTION! THIS IS CAUSING AN ERROR IN THE JS BECAUSE IT IS ILLEGALLY CLOSED FOR IT 
    // NEEDS TO BE INPUTTED FROM HTML FORMS WHICH WAS VIOLATED BY JUST INPUTING THEM USING 
    // DIRECTLY BY ACCESSING THE DB  THAT'S WHY IT IS LIKE THIS! FIX THE INPUT AREA FIRST!
    var summary = '<?php echo $summary; ?>%';
    document.getElementById('summary_box').value = summary;
    // $('#summary_box').html($('#summary_box').text().replace(/\n\r?/g, '<br />'));

    var rating = '<?php echo $rating; ?>%';
    document.getElementById('rating_text').value = rating;

    var email = '<?php echo $email; ?>';
    document.getElementById('email_text').value = email;

    var contact = '<?php echo $contact; ?>';
    document.getElementById('contact_text').value = contact;    

    var address = '<?php echo $address; ?>';
    document.getElementById('address_text').value = address;
    
    var city = '<?php echo $city; ?>';
    document.getElementById('city_sel').value = city;

    var state = '<?php echo $state; ?>';
    document.getElementById('state_sel').value = state;

    var country = '<?php echo $country; ?>';
    document.getElementById('country_sel').value = country;

    var industry = '<?php echo $industry; ?>';
    document.getElementById('industry_text').value = industry;

</script>

<?php $this->load->view('footer_view'); ?>