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
<header style="color: white; height: 80px; margin-top: 0px; background-color: #4169E1;">
<div class="row">
    <div class="span4 offset2">
        <br>
        <h3>Sign Up Page</h3>
    </div>
</div>
</header>
<body>
    <br><br><br>
    <div class="container">
        <form name="backfrm" id="backfrm" method="post" action="<?php echo base_url(); ?>">
            <input type="submit" class="btn btn-default" name="backbtn" id="backbtn" value="<< Back">
        </form>
        <form name="signupfrm" id="signupfrm" method="post" action="<?php echo base_url(); ?>core/signup_user">
        <div id="errordiv"><?php echo validation_errors(); ?></div>
        <table name="signuptbl" id="signuptbl">
            <tr><td>First Name:</td><td><input type="text" name="firstname" id="firstname" style="height: 90%" placeholder="Type First Name" class="form-control"></td></tr>
            <tr><td>Middle Initial:</td><td><input type="text" name="middleinitial" id="middleinitial" style="height: 90%; width: 30%;"placeholder="Initial" class="form-control"></td></tr>
            <tr><td>Last Name:</td><td><input type="text" name="lastname" id="lastname" style="height: 90%" placeholder="Type Last Name" class="form-control"></td></tr>
            <tr><td>Sex:</td>
            <td><select name="sex" id="sex" style="height: 90%" class="form-control">
                    <option value="default"> -- Select one -- </option>
                    <option value="male">male</option>
                    <option value="female">female</option>
                </select>
            </td></tr>
            <tr><td>Address:</td><td><input type="text" name="address" id="address" style="height: 90%" placeholder="Type Street Address" class="form-control"></td></tr>
            <tr><td>City:</td><td><input type="text" name="city" id="city" style="height: 90%" placeholder="Type City" class="form-control"></td></tr>
            <tr><td>State/Province/Region:</td><td><input type="text" name="stateprovreg" id="stateprovreg" style="height: 90%" placeholder="Type State/Province/Region" class="form-control"></td></tr>
            <tr><td>Zip Code:</td><td><input type="text" name="zip" id="zip" style="height: 90%; width: 30%;"placeholder="ZIP" class="form-control"></td></tr>
            <tr><td>Country:</td><td><input type="text" name="country" id="country" style="height: 90%" placeholder="Select Country" class="form-control"></td></tr>
            <tr><td>Email Address:</td><td><input type="text" name="email" id="email" style="height: 90%" placeholder="Type Email Address" class="form-control"></td></tr>
            <tr><td>Mobile Number:</td><td><input type="text" name="contact" id="contact" style="height: 90%" placeholder="Type Mobile Number" class="form-control"></td></tr>
            <tr><td>User Name:</td><td><input type="text" name="username" id="username" style="height: 90%" placeholder="Type User Name" class="form-control"></td></tr>
            <tr><td>Password:</td><td><input type="password" name="password" id="password" style="height: 90%" placeholder="Type Password" class="form-control"></td></tr>
            <input type="hidden" name="usertype" id="usertype" value="<?php echo $usertype; ?>">
            <tr><td></td><td><input type="button" class="btn btn-success" name="submitbtnsignup" id="submitbtnsignup" value="SIGNUP"></td></tr>
        </table>
    </div>


    <div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmationModal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 id="confirmationModal-title"><font color="green">Confirm Sign Up</font></h4>

                </div>
                <div class="modal-body">
                <center>
                <font color="blue">Upon clicking this Yes button and submitting this form, 
                    I agree to the Terms and Conditions of Freelanzers.com as <?php if($usertype == "employer")
                        echo "an ";  else echo "a "; ?><?php echo $usertype; ?>that I will used this freelance
                        platform properly for the benefit of all</font>
                </center>
                </div>
                <div class="modal-footer">
                <button class="btn btn-success" type="submit" id="yesbtn" name="yesbtn" value="Yes">Yes</button>
                <button class="btn btn-danger" type="button" id="nobtn" name="nobtn" value="No">No</button>
                </div>
            </div>
        </div>
    </div>
    </form>
<script type="text/javascript">
    $('#submitbtnsignup').click(function(e){
        e.preventDefault();
        $('#confirmationModal').modal('show');
        $("#confirmationModal").modal({
            backdrop: "static"
        });

        $('#nobtn').click(function(){
            $('#confirmationModal').modal('hide');
        });         
    });
</script>
<?php $this->load->view('footer_view'); ?>