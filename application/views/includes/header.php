<!DOCTYPE html>
<!-- Template Name: Rapido - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- start: HEAD -->

<head>
    <title><?php echo $title; ?></title>
    <!-- start: META -->
    <meta charset="utf-8" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- end: META -->
    <!-- start: MAIN CSS -->
    <?php echo $this->load->view($headerCss); ?>
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body>
<!-- start: SLIDING BAR (SB) -->
<div id="slidingbar-area">
    <div id="slidingbar">
        <div class="row">
            <!-- start: SLIDING BAR FIRST COLUMN -->
            <div class="col-md-2 col-sm-2">
                
            </div>
            <!-- end: SLIDING BAR FIRST COLUMN -->
            <!-- start: SLIDING BAR SECOND COLUMN -->
            <div class="col-md-3 col-sm-3">
                <h2>My Info</h2>
                <address class="margin-bottom-40">
                	
                    <?php echo $this->session->userdata('name'); ?>
                    <br>
                    <?php if($this->session->userdata('login_type') == 'admin'): ?>
                    	<?php echo $this->session->userdata('your_school_name') ?>
                    	<br/>
                    	<?php echo $this->session->userdata('address_1')." ".$this->session->userdata('address_2'); ?>
                    	<br/>
                    	<?php echo $this->session->userdata('city')." ".$this->session->userdata('state')." - ".$this->session->userdata('pin');?>
                    	<br/>
                    	Contact : <?php echo $this->session->userdata('phone_number').", +91-".$this->session->userdata('mobile_number'); ?>
                    
                    <?php elseif($this->session->userdata('login_type') == 'student'):?>
                    	Class : <?php echo $this->session->userdata('class_id')." ".$this->session->userdata('section'); ?>
                    	<br/>
                    	<?php echo $this->session->userdata('address_1')." ".$this->session->userdata('address_2'); ?>
                    	<br/>
                    	<?php echo$this->session->userdata('city')." ".$this->session->userdata('state')." - ".$this->session->userdata('pin_code');?>
                    	<br/>
                    	Contact : <?php echo "+91-".$this->session->userdata('mobile'); ?>
                    
                    <?php else:?>
                    	Job Category : <?php echo $this->session->userdata('job_category'); ?>
                    	<br/>
                    	<?php echo $this->session->userdata('address_1')." ".$this->session->userdata('address_2'); ?>
                    	<br/>
                    	<?php echo $this->session->userdata('city')." ".$this->session->userdata('state')." - ".$this->session->userdata('pin_code');?>
                    	<br/>
                    	Contact : <?php echo "+91-".$this->session->userdata('mobile'); ?>
                    	<br/>
                    	Email : <?php echo $this->session->userdata('email');?>
                    <?php endif;?>
                </address>
                	<?php if($this->session->userdata('login_type') == 'admin'): ?>
                    	 <a class="btn btn-transparent-white" href="<?php echo base_url()?>index.php/adminController/adminProfile">
		                    <i class="fa fa-pencil"></i> Edit
		                </a>
                    <?php elseif($this->session->userdata('login_type') == 'student'):?>
                    	 <a class="btn btn-transparent-white" href="<?php echo base_url()?>index.php/studentController/admissionSuccess/<?php echo $this->session->userdata("username");?>">
		                    <i class="fa fa-pencil"></i> Edit
		                </a>
                    <?php else:?>
                    	 <a class="btn btn-transparent-white" href="<?php echo base_url()?>index.php/employeeController/employeeProfile/<?php echo $this->session->userdata("username");?>">
		                    <i class="fa fa-pencil"></i> Edit
		                </a>
                    <?php endif;?>
            </div>
            <!-- end: SLIDING BAR SECOND COLUMN -->
            <!-- start: SLIDING BAR THIRD COLUMN -->
            <div class="col-md-7 col-sm-7">
                <img src="<?php echo base_url()?>assets/images/hgenesis.png"/>
            </div>
            <!-- end: SLIDING BAR THIRD COLUMN -->
        </div>
        <div class="row">
            <!-- start: SLIDING BAR TOGGLE BUTTON -->
            <div class="col-md-12 text-center">
                <a href="#" class="sb_toggle"><i class="fa fa-chevron-up"></i></a>
            </div>
            <!-- end: SLIDING BAR TOGGLE BUTTON -->
        </div>
    </div>
</div>
<!-- end: SLIDING BAR -->
<div class="main-wrapper">
<!-- start: TOPBAR -->
<header class="topbar navbar navbar-inverse navbar-fixed-top inner">
    <!-- start: TOPBAR CONTAINER -->
    <div class="container">
        <div class="navbar-header">
            <a class="sb-toggle-left hidden-md hidden-lg" href="#main-navbar">
                <i class="fa fa-bars"></i>
            </a>
            <!-- start: LOGO -->
            <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/login/dashboard">
                <?php echo $this->session->userdata('your_school_name') ?>
            </a>
            <!-- end: LOGO -->
        </div>
        <div class="topbar-tools">
            <!-- start: TOP NAVIGATION MENU -->
            <ul class="nav navbar-right">
                <!-- start: USER DROPDOWN -->
                <li class="dropdown current-user">
                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                    	<?php if(strlen($this->session->userdata('photo')) > 1):?>
				    		<?php if($this->session->userdata('login_type') == 'student'): ?>
				        		<img src="<?php echo base_url()?>assets/images/stuImage/<?php echo $this->session->userdata('photo');?>" class="img-circle" width="30" alt="">
				        	<?php else: ?>
				        		<img src="<?php echo base_url()?>assets/images/empImage/<?php echo $this->session->userdata('photo');?>" class="img-circle" width="30" alt="">
				        	<?php endif;?>
				        <?php else:?>
				        	<img src="<?php echo base_url()?>assets/images/anonymous.jpg" class="img-circle" width="30" alt="">
				        <?php endif;?>
                        <span class="username hidden-xs"><?php echo $this->session->userdata("name")?></span> 
                        <i class="fa fa-caret-down "></i>
                    </a>
                    <ul class="dropdown-menu dropdown-dark">
                        <li>
                        	<?php if($this->session->userdata('login_type') == 'admin'): ?>
		                    	 <a href="<?php echo base_url()?>index.php/adminController/adminProfile">
				                    My Profile
				                </a>
		                    <?php elseif($this->session->userdata('login_type') == 'student'):?>
		                    	 <a  href="<?php echo base_url()?>index.php/studentController/admissionSuccess/<?php echo $this->session->userdata("username");?>">
				                    My Profile
				                </a>
		                    <?php else:?>
		                    	 <a href="<?php echo base_url()?>index.php/employeeController/employeeProfile/<?php echo $this->session->userdata("username");?>">
				                    My Profile
				                </a>
		                    <?php endif;?>
                        </li>
                        <li>
                            <a href="pages_calendar.html">
                                My Calendar
                            </a>
                        </li>
                        <?php  $v=$this->session->userdata('username');
						            $abc = $this->db->query("SELECT * FROM message WHERE reciever_id='$v' AND open='n'");
						            $total = $abc->num_rows();
						            
						            $total1=$this->db->count_all("notice");
						            $totalNoti = $total1 + $total;?>
               
                        <li>
                            <a href="pages_messages.html">
                                My Messages (<?php echo $total;?>)
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>index.php/homeController/lockPage">
                                Lock Screen
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>index.php/homeController/logout">
                                Log Out
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end: USER DROPDOWN -->
                <li class="right-menu-toggle">
                    <a href="#" class="sb-toggle-right">
                        <i class="fa fa-globe toggle-icon"></i> <i class="fa fa-caret-right"></i> <span class="notifications-count badge badge-default hide"> <?php  echo $totalNoti;?></span>
                    </a>
                </li>
            </ul>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- end: TOPBAR CONTAINER -->
</header>
<!-- end: TOPBAR -->