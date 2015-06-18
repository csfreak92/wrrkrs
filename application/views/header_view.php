<header style="color: white; height: 80px; margin-top: 0px; background-color: #CC0000">
    <!-- #4169E1; -->
    <!-- <div class="row">
        
    </div> -->
<div class="row">
    <div class="span5 pull-left">
        <h1><b>wrrkrs.com</b></h1>
    </div>
    <div class="span3 pull-right">
        <!-- <div c></div> -->
        <br>
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="userdropdown" data-toggle="dropdown"
            aria-expanded="true"><?php echo $username; ?>
            <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <!-- this grid system is distorted whenever i add a new item here in this menu -->
                <li role="presentation"><a role="menuitem" href="<?php echo base_url() ?>core/settings">Settings</a></li>
                <li role="presentation"><a role="menuitem" href="<?php echo base_url() ?>core/logout">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
</header>