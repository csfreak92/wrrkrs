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
<script type="text/javascript">
    $( document ).ready(function(){
        $('#allapplicationstab').dataTable();
    });
</script>

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
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/searchjobs">Search Jobs</a></li>
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/myapplications">My Applications</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane" id="jobfeeds">
                        <h1>JOB FEEDS</h1>
                        <p>ALL DATA FROM THE BACKEND ABOUT LATEST JOB FEEDS WILL BE DISPLAYED HERE</p>
                        <div class="container">
                            
                        </div>
                    </div>    
                    <div class="tab-pane" id="searchjobs">
                        <h1>APPLICATIONS</h1>

                    </div>
                    <div class="tab-pane active" id="myapplications">
                        <h1>MY JOB APPLICATIONS</h1>
                            <?php 
                                $this->load->model('outreach_model');
                                $this->load->library('table');
                                if($applications_data == NULL)
                                    ;
                                else
                                {
                                    foreach($applications_data as $row)
                                    {
                // $this->db->select('b.application_record_id, a.freelancer_id, b.status, b.application_date, c.job_id, 
                // d.job_code, d.job_name, d.job_description, d.job_type, d.job_duration, d.job_level, d.job_category');
                                        $link = anchor( base_url().'core/openlink/'.$row->job_id, $row->job_name );
                                        // anchor( base_url().'core/openlink/'.$row->job_id, 'Details');
                                        $data = $this->table->add_row( 
                                            // $row->application_record_id,
                                            // $row->freelancer_id, 
                                            $row->status, 
                                            $row->application_date, 
                                            // $row->job_id, 
                                            $row->job_code,
                                            // $row->job_name, 
                                            $link,
                                            // $row->job_description, 
                                            $row->job_type, 
                                            $row->job_duration, 
                                            $row->job_level, 
                                            $row->job_category
                                        );
                                        echo $data;
                                    }

                                }

                                $this->table->set_heading('Status', 'Date', 'Job Code', 'Job Name', 'Type', 'Duration', 'Level', 'Category');
                                $tmpl = array (
                                    'table_open' => '<table border="1" cellpadding="4" cellspacing="0" align="center" id="allapplicationstab" name="allapplicationstab" class="table table-striped table-bordered">',
                                    'heading_row_start'   => '<tr>',
                                    'heading_row_end'     => '</tr>',
                                    'heading_cell_start'  => '<th>',
                                    'heading_cell_end'    => '</th>',

                                    'row_start'           => '<tr>',
                                    'row_end'             => '</tr>',
                                    'cell_start'          => '<td>',
                                    'cell_end'            => '</td>',

                                    'row_alt_start'       => '<tr>',
                                    'row_alt_end'         => '</tr>',
                                    'cell_alt_start'      => '<td>',
                                    'cell_alt_end'        => '</td>',

                                    'table_close'         => '</table>'
                                );
                                $this->table->set_template($tmpl);
                                echo $this->table->generate();            
                            ?>
                                <?php //print_r($applications_data); ?>
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
<!--
<script type="text/javascript" src="<?php echo base_url(); ?>js/dataTables.bootstrap.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.bootstrap.css">
-->
<!--
<script type="text/javascript" src="../js/dataTables.bootstrap.js"></script>
<link rel="stylesheet" href="../css/dataTables.bootstrap.css"> -->
<!--
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
-->

<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.bootstrap.css"/>

<script type="text/javascript" src="<?php echo base_url(); ?>js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>


<!-- jquery-1.11.1.min.js -->

<!-- dataTables.bootstrap.css
dataTables.bootstrap.css
dataTables.bootstrap.js
 -->

<?php $this->load->view('footer_view'); ?>