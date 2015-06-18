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
<style type="text/css">
    .clickableRow
    {
        cursor: pointer;
    }

    .clickableRow:hover
    {
      color: red;
    }
    
/*    .ui-autocomplete-loading {
        background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat;
    }
    #messagereceiver { width: 25em; }*/
</style>
<script type="text/javascript">
  $( document ).ready(function(){
      $('#mymessages').dataTable();
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
            <li role="presentation"><a href="<?php echo base_url(); ?>core/findwork" id="findlink">Find A Job</a></li>
            <li role="presentation"><a href="<?php echo base_url(); ?>core/myprofile" id="profilelink">My Profile</a></li>
            <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/messages" id="messagelink">Messages</a></li>
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
            <div class="tab-pane" id="myprofile">
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
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
                <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
                    <li role="presentation" class="active"><a href="<?php echo base_url(); ?>core/conversations">Conversations</a></li>
                    <li role="presentation"><a href="<?php echo base_url(); ?>core/notifications">Notifications</a></li>
                </ul>
                <div id="my-tab-content" class="tab-content"> 
                    <div class="tab-pane active" id="conversations">
                        <h1>CONVERSATIONS</h1>
                        <p>Listed here are the conversations in a chat manner type.</p>                
                        <form name="newmsgfrm" id="newmsgfrm" method="post" action="<?php echo base_url(); ?>core/create_new_msg" onsubmit="return validateForm();">
                          <div class="">
                            <table>
                                <tr><td><input type="button" name="newmsgbtn" id="newmsgbtn" class="btn btn-default" value="New Message"></td></tr>
                            </table>
                          </div>

 
                            <div id="modal-add-cart" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-add-cart-label" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                      <h4 id="modal-add-cart-title">MESSAGE</h4>
                                      <table id="messagetbl" name="messagetbl">
                                          <tr><td>To:</td>
                                              <!-- <td><input type="text" name="messagereceiver" autocomplete="on" id="messagereceiver" class="form-control" placeholder="Type Recepient" style="height: 80%;"></td> -->
                                              <td><?php echo form_dropdown('receipient_name', $receipient, '', 'class="form-control" id="receipient_name"'); ?></td>
                                          </tr>
                                          <tr><td>RE:</td><td><input type="text" name="messagesubject" id="messagesubject" class="form-control" placeholder="Type Message Subject" style="height: 80%"></td></tr>
                                          <tr><td>Message:</td><td><textarea id="messagecontent" name="messagecontent" class="form-control" style="height: 300px; "></textarea></td></tr>
                                      </table>
                                   </div>
                                   <div class="modal-footer">
                                      <!-- <button class="btn btn-danger btn-small" data-dismiss="modal" aria-hidden="true">STAY</button> -->
                                      <!-- <button class="btn btn-danger btn-small" data-dismiss="modal" id="nobtn" aria-hidden="true">NO</button> -->
                                      <input type="submit" class="btn btn-danger btn-small" id="sendbtn" name="sendbtn" aria-hidden="true" value="SEND"></button>
                                      <!-- <a class="btn btn-danger btn-small" href="new_page.php">CHANGE SITE</a> -->
                                   </div>
                                 </div>
                              </div>
                            </div>

                        </form><br>
                        <?php 
                                $this->load->library('table');
                                if($messages_data != "" || $messages_data != false || $messages_data != NULL)
                                {
                            
                                    foreach($messages_data as $det)
                                    {
                                        // $link = anchor( base_url().'core/openlink/'.$row->job_id, 'Details');
                                        // $data = $this->table->add_row( 
                                        //     "<div class='clickableRow' data-id='".$det->message_id."'>".$det->receiver."</div>", 
                                        //     "<div class='clickableRow' data-id='".$det->message_id."'>".$det->message_subject."</div>",
                                        //     "<div class='clickableRow' data-id='".$det->message_id."'><i>".$det->message_subject."</i> : ".$det->message_body."</div>",
                                        //     "<div class='clickableRow' data-id='".$det->message_id."'>".$det->message_timestamp."</div>"
                                        //     // $link
                                        // );
                                        $link_receive = anchor( base_url().'core/message_conversations/'.$det->receiver, $det->receiver );
                                        $link_msg = anchor( base_url().'core/message_conversations/'.$det->receiver, "<i>".$det->message_subject."</i> : ".$det->message_body );
                                        $link_date = anchor( base_url().'core/message_conversations/'.$det->receiver, $det->message_timestamp );
                                        $data = $this->table->add_row(
                                          $link_receive, 
                                          $link_date,
                                          $link_msg
                                        );
                                        echo $data;
                                    }

                                $this->table->set_heading('Recepient', 'Date', 'Message');
                                $tmpl = array (
                                    'table_open' => '<table border="1" cellpadding="4" cellspacing="0" align="center" id="mymessages" name="mymessages" class="table table-striped table-bordered">',
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
                              }
                        ?>
                    </div>    
                    <div class="tab-pane" id="notifications">
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
$('#newmsgbtn').click(function(e){
        e.preventDefault();
        $('#modal-add-cart').modal('show');
        $("#modal-add-cart").modal({
            backdrop: "static"
        });
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
    });

  $(".clickableRow").click(function(event){
    var idclicked = event.target.dataset.id;
    alert(idclicked);
    $(".clickableRow").load('trial');
  });

  function validateForm()
  {
    var rec_name = $('#receipient_name').val();
    if(rec_name == "default")
    {
        alert("This message cannot be send due to no receipient!");
        return false;
    }
    else
    {
        // alert("Validation passed!");
        return true;
    }
  }
</script>
<?php $this->load->view('footer_view'); ?>