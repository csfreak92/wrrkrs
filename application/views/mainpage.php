<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="en">
<head>
    <?php 
            // enable this part later in every page!
            if ($this->session->userdata('logged_in')) {
                $session_data = $this->session->userdata('logged_in');
                $data['username'] = $session_data['username'];
            } else {
                // if no session, redirect to login page
                redirect('login', 'refresh');
            }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CCD Outreach Monitoring System">
    <title>CCD-OMS</title>

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <!--<![endif]-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/pure.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/gumby.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/side-menu.css">
    <link rel="icon" href="<?php echo base_url(); ?>images/the_ccd_logo_final_2_copy.ico" type="image/gif" sizes="16x16">

    <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/modernizr-2.6.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/jquery-2.0.2.min.js"></script>
<style>
    .clickableRow
    {
        cursor: pointer;
    }
</style>
</head>

<body>

<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu pure-menu-open">

            <a class="pure-menu-heading" href="<?php echo base_url().'outreach/mainpage'; ?>">
                <img src="<?php echo base_url(); ?>/images/theccdlogofinal2copy.jpg" width="120" height="120"><br>
                ccd-oms</a>
            <ul>
                <li class="pure-menu-selected">
                    <?php echo anchor(base_url().'outreach/mainpage','Programs'); ?>
                </li>
                <li>
                    <?php echo anchor(base_url().'outreach/students','Students'); ?>
                </li>
                <li>
                    <?php echo anchor(base_url().'outreach/employees','Employees'); ?>
                </li>
                <li>
                    <?php echo anchor(base_url().'outreach/organizations','Organizations'); ?>
                </li>
                <li>
                    <?php echo anchor(base_url().'outreach/aboutus','About Us'); ?>
                </li>
                <li>
                    <?php 
                        // $user = $this->login_model->getloggedinusername(); 
                        // $level = $this->login_model->get_user_level($user);
                        // if($level == 5)
                        // {
                            echo anchor(base_url().'outreach/options','Options');
                        // }
                    ?>
                </li>

                <li class="pure-menu-logout"><a href="<?php echo base_url().'outreach/logout'; ?>">Logout</a></li>
<!--                 <form id='frmlogout' name='frmlogout' action=''>
                    <button class="btn btn-danger">LOGOUT</button>
                </form>


 -->  
            </ul>
        </div>
    </div>

    <div class="two columns">
    </div>
    <div class="fourteen columns">
        <h3>List of Programs</h3>
        <div class="row">
        <div class="push_nine four columns">Welcome, you are logged in as: <br>
           <?php 
                // $session_data = $this->session->userdata('logged_in');
                // // print_r($session_data);
                // // $data['username'] = $session_data['username'];
                // echo $this->login_model->getloggedinuser( $session_data['username'], $session_data['password'] );
                

            ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="five columns">
                <div class="medium primary btn icon-left icon-plus-circled"><a href="#" class="switch" gumby-trigger="#addProgram">New Program</a></div>
            </div>
            
        </div>
        <?php 
            $this->load->model('outreach_model');
            $this->load->library('table');
            $this->table->set_heading('Title', 'Date', 'Barangay', 'Town', 'Province', 'Program Type', 'Sem', 'School Year', '', '', '');
            $tmpl = array (
               'table_open' => '<table border="1" cellpadding="4" cellspacing="0" align="center" id="stud" name="stud" class="striped rounded">'
            );
            $this->table->set_template($tmpl);
            echo $this->table->generate();   
        ?>
        <?php $this->load->view('footer_view'); ?>
    </div>

    <div class="modal" id="addProgram">
        <div class="content">
            <a class="close switch" gumby-trigger="|#addProgram"><i class="icon-cancel-circled" /></i></a>
            <div class="row">
                <div class="ten columns">
                    <h3>Add a Program</h3>
                    <hr/>
                    <form class="pure-form pure-form-aligned" method="post" action="add_program">
                        <label for="titleProgram">Title</label>
                        <input id="titleProgram" name="titleProgram" type="text" placeholder="Bahay Atenista 2014">

                        <label for="dateProgram">Date</label>
                        <input id="dateProgram" name="dateProgram" type="date">
                        <div>
                        <label for="semester">Semester</label>
                        <select id="semester" name="semester">
                            <option>1</option>
                            <option>2</option>
                        </select></div>

                        <div>
                        <label for="schoolYear">School Year</label>
                        <input id="schoolYear" name="schoolYear" type="text" placeholder="2014-2015">
                        </div>

                        <label>Location</label>
                        <div class="pure-u-2-5">
                            <input id="brgy" name="brgy" class="pure-input-1" type="text" placeholder="Barangay">
                        </div>
                        <div class="pure-u-2-5">
                            <input id="town" name="town" class="pure-input-1" type="text" placeholder="Town/Municipality/Sitio">
                        </div>
                        <div class="pure-u-2-5">
                            <input id="province" name="province" class="pure-input-1" type="text" placeholder="Province">
                        </div>

                        <label for="descProgram">Description</label>
                        <textarea name="descProgram" id="descProgram" class="input textarea" placeholder="Program Description" rows="3"></textarea>

                        <label for="programType">Program Type</label>
                        <select id="programType" name="programType">
                            <?php 
                                echo "<option>-----</option>";
                                foreach ($type as $value) 
                                {
                                    echo "<option>".$value['type_name']."</option>";
                                }
                            ?>
                        </select>
                        <br/></br>
                        <button type="submit" class="pure-button pure-button-primary">Add</button>
                        <a class="close switch" gumby-trigger="|#addProgram"><button class="pure-button">Cancel</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="editProgram">
        <div class="content">
            <a class="close switch" gumby-trigger="|#editProgram"><i class="icon-cancel-circled" /></i></a>
            <div class="row">
                <div class="ten columns">
                    <h3>Edit Program</h3>
                    <hr/>
                    <form class="pure-form" method="post" action="edit_program">
                        
                        <label for="editTitleProgram">Title</label>
                        <input id="editTitleProgram" name="editTitleProgram" type="text" placeholder="Title">

                        <label for="editDateProgram">Date</label>
                        <input id="editDateProgram" name="editDateProgram" type="date" method="post">

                        <div>
                        <label for="editSemester">Semester</label>
                        <select id="editSemester" name="editSemester">
                            <option>1</option>
                            <option>2</option>
                        </select></div>

                        <div>
                        <label for="editSchoolYear">School Year</label>
                        <input id="editSchoolYear" name="editSchoolYear" type="text" placeholder="2014-2015">
                        </div>

                        <label>Location</label>
                        <div class="pure-u-2-5">
                            <input id="editBrgy" name="editBrgy" class="pure-input-1" type="text" placeholder="Barangay">
                        </div>
                        <div class="pure-u-2-5">
                            <input id="editTown" name="editTown" class="pure-input-1" type="text" placeholder="Town/Municipality/Sitio">
                        </div>
                        <div class="pure-u-2-5">
                            <input id="editProvince" name="editProvince" class="pure-input-1" type="text" placeholder="Province">
                        </div>

                        <label for="editDescProgram">Description</label>
                        <textarea name="editDescProgram" id="editDescProgram" class="input textarea" placeholder="Program Description" rows="3"></textarea>

                        <label for="editProgramType">Program Type</label>
                        <select id="editProgramType" name="editProgramType">
                            <?php 
                                $edittype = $this->outreach_model->get_outreach_subtype();
                                echo "<option>-----</option>";
                                foreach ($edittype as $val) 
                                {
                                    echo "<option>".$val['type_name']."</option>";
                                }
                            ?>
                        </select>
<!-- 
                        <label for="editProgramType">Outreach Type</label>
                        <select id="editProgramType" name="editProgramType">
                            <option>SOP</option>
                            <option>Environmental Advocacy</option>
                        </select>

 -->                        <!-- SOPType and envType inputs should be hidden first.
                             They should be revealed once user selects a programType.
                         -->

<!--                         <label for="SOPType">SOP Type</label>
                        <select id="SOPType" name="SOPType" disabled>
                            <option>Bahay Atenista</option>
                            <option>Others</option>
                        </select>

                        <label for="envType">Environmetal Advocacy Type</label>
                        <select id="envType" name="envType" disabled>
                            <option>Coastal Cleanup</option>
                            <option>Others</option>
                        </select>
 -->
                        <input id="programID" name="programID" type="hidden" placeholder="">
                        <br/></br>

                        <div class="medium primary btn"><input type="submit" value="Submit" /></div>
                        <a class="close switch" gumby-trigger="|#editProgram"><button class="pure-button">Cancel</button></a>
                    </form>

                </div>
            </div>
        </div>
    </div>


    </div>

    <script>
        var oldieCheck = Boolean(document.getElementsByTagName('html')[0].className.match(/\soldie\s/g));
        if(!oldieCheck) {
            document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"><\/script>');
        } else {
            document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"><\/script>');
        }
    </script>
    <script>
        if(!window.jQuery) {
            if(!oldieCheck) {
              document.write('<script src="../js/libs/jquery-2.0.2.min.js"><\/script>');
          } else {
              document.write('<script src="../js/libs/jquery-1.10.1.min.js"><\/script>');
          }
      }
  </script>
  <script gumby-touch="/js/libs" src="<?php echo base_url(); ?>js/libs/gumby.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/ui/gumby.retina.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/ui/gumby.fixed.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/ui/gumby.toggleswitch.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/ui/gumby.radiobtn.js"></script>
  
  <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/ui/gumby.tabs.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/libs/gumby.init.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/plugins.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/main.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/dataTables.jqueryui.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/dataTables.tableTools.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/dataTables.tableTools.js"></script>


  <link rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.jqueryui.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.tableTools.css">

</div>
<script type="text/javascript">
    $( document ).ready(function(){
        $('#stud').dataTable();
    });


    // $(document).ready( function () {
    //     $('#stud').dataTable( {
    //         "dom": 'T<"clear">lfrtip',
    //         "tableTools": {
    //             "sSwfPath": "<?php echo base_url(); ?>swf/copy_csv_xls_pdf.swf"
    //         }
    //     } );
    // } );

    // $(document).ready( function () {
    //     var table = $('#stud').dataTable();
    //     var tableTools = new $.fn.dataTable.TableTools( table, {
    //         "buttons": [
    //             "copy",
    //             "csv",
    //             "xls",
    //             "pdf",
    //             { "type": "print", "buttonText": "Print me!" }
    //         ]
    //     } );
          
    //     $( tableTools.fnContainer() ).insertAfter('div.info');
    // } );

    $('.clickableRow').click(function(event) {
        var a = event.target.dataset.key;
        window.document.location='sampleProgramData/'+a;
    });
</script>
<script type="text/javascript">
// detailProgram
$('#delProgram,.toggle').on('gumby.onTrigger', function(event) {
        event.preventDefault();
        var mykey = event.target.dataset.key;
        $.ajax({
            type: "POST",   
            url: 'delete_program/'+mykey, 
            success: function(data, status){
                alert('SUCCESSFULLY DELETED A RECORD!');
                location.reload(true);
            }, 
           error: function(e, status){
                // alert("There is a/an "+e+" , "+status);
                alert("Error: Cannot delete this program record since there are students and employees linked to this data");
            }
        });
    }).trigger('gumby-trigger')

    $('#addStudent,.switch').on('gumby.onTrigger', function(event) {
        event.preventDefault();
    }).trigger('gumby-trigger')

</script>
<script type="text/javascript">
// 
$('#editProgram,.switch').on('gumby.onTrigger', function(e) {
    $('#editTitleProgram').focus();

    var title = event.target.dataset.title;
    document.getElementById('editTitleProgram').value = title;

    var date = event.target.dataset.date;
    document.getElementById('editDateProgram').value = date;    

    var brgy = event.target.dataset.barangay;
    document.getElementById('editBrgy').value = brgy;

    var orgid = event.target.dataset.key;
    document.getElementById('programID').value = orgid;

    var town = event.target.dataset.town;
    document.getElementById('editTown').value = town;

    var province = event.target.dataset.province;
    document.getElementById('editProvince').value = province;

    var desc = event.target.dataset.description;
    document.getElementById('editDescProgram').value = desc;

    var sem = event.target.dataset.semester;
    document.getElementById('editSemester').value = sem;

    var sy = event.target.dataset.school_year;
    document.getElementById('editSchoolYear').value = sy;    

    var type = event.target.dataset.type;
    document.getElementById('editProgramType').value = type;

}).trigger('gumby.trigger');

// $('.pure-menu-selected').click();

</script>
</body>
</html>
