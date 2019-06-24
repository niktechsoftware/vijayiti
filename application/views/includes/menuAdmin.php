<!-- start: PAGESLIDE LEFT -->
<a class="closedbar inner hidden-sm hidden-xs" href="#">
</a>
<nav id="pageslide-left" class="pageslide inner">
<div class="navbar-content">
<!-- start: SIDEBAR -->
<div class="main-navigation left-wrapper transition-left">
<div class="navigation-toggler hidden-sm hidden-xs">
    <a href="#main-navbar" class="sb-toggle-left">
    </a>
</div>
<div class="user-profile border-top padding-horizontal-10 block">
    <div class="inline-block">
    	<?php if(strlen($this->session->userdata('photo')) > 1):?>
    		<?php if($this->session->userdata('login_type') == 'student'): ?>
        		<img src="<?php echo base_url()?>assets/images/stuImage/<?php $this->session->userdata('photo');?>" width="30" alt="">
        	<?php else: ?>
        		<img src="<?php echo base_url()?>assets/images/empImage/<?php echo $this->session->userdata('photo');?>" width="30" alt="">
        	<?php endif;?>
        <?php else:?>
        	<img src="<?php echo base_url()?>assets/images/anonymous.jpg" width="30" alt="">
        <?php endif;?>
    </div>
    <div class="inline-block">
        <h5 class="no-margin"> Welcome </h5>
        <h4 class="no-margin"> <?php echo $this->session->userdata('name'); ?> </h4>
        <a class="btn user-options sb_toggle">
            <i class="fa fa-cog"></i>
        </a>
    </div>
</div>
<!-- start: MAIN NAVIGATION MENU -->

<!-- ===================================================== Administrator Menu Start ======================================= -->
<?php if($this->session->userdata('login_type') == 'admin'): ?>

<ul class="main-navigation-menu">
<li class="active open">
    <a href="<?php echo base_url(); ?>index.php/login"><i class="fa fa-home"></i> <span class="title"> Dashboard </span><span class="label label-default pull-right ">HOME</span> </a>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-desktop"></i> <span class="title"> Configration </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/configureClass">
                Configure Trade <i class="icon-arrow"></i>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/updateClass">
                <span class="title"> Update Trade </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/configureSubject">
                <span class="title"> Subject Configration  </span>
            </a>
        </li>
        
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-cogs"></i> <span class="title">Employee </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/addemployee">
                <span class="title"> Add Employee </span>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url(); ?>index.php/login/employeeList">
                <span class="title">Simple Employee List</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/advencedEmployeeList">
                <span class="title">Advanced Employee List</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/employeeSalary">
                <span class="title"> Employee Salary</span>
            </a>
        </li>
      	<li>
            <a href="<?php echo base_url(); ?>index.php/login/employeeSalaryReport">
                <span class="title"> Employee Salary Report</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/notActiveEmployee">
                <span class="title">Inactive Employee List </span>
            </a>
        </li>
         <!--
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/employeeLeave">
                <span class="title"> Leave </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/updateProfile">
                <span class="title"> Update Profile </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/oldEmployeed">
                <span class="title"> Old Employee Details </span>
            </a>
        </li>
        -->
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-th-large"></i> <span class="title"> Students </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/newAdmission">
                <span class="title">New Admission</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/simpleSearchStudent">
                <span class="title">Simple Search</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/searchStudent">
                <span class="title">Advanced Search</span>
            </a>
        </li>
        
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/notActiveStudent">
                <span class="title">InActive Student List</span>
            </a>
        </li>
       
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-pencil-square-o"></i> <span class="title">Fee </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/collectFee">
                <span class="title">Collect Fee</span>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url(); ?>index.php/login/transport">
                <span class="title">Update Scheduled Fee</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/feeReport">
                <span class="title">Fee Report</span>
            </a>
        </li>
        
         <li>
            <a href="<?php echo base_url(); ?>index.php/login/feedue">
                <span class="title">Admission Fee Report</span>
            </a>
        </li>
        
         <li>
            <a href="<?php echo base_url(); ?>index.php/login/printDeuFee">
                <span class="title">Print Admission Fee Report</span>
            </a>
        </li>
        
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-user"></i> <span class="title"> Attendance </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/studentAttendance">
                <span class="title">Student Attendance </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/teacherAttendance">
                <span class="title"> Teacher Attendance </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/stuAttendanceReport">
                <span class="title"> Student Attendance Report </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/empAttendanceReport">
                <span class="title"> Teacher Attendance Report </span>
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="javascript:;" class="active">
        <i class="fa fa-folder"></i> <span class="title"> Stock </span> <i class="icon-arrow"></i>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/enterStock">
               Enter Stock <i class="icon-arrow"></i>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/saleStock">
               Sale Stock <i class="icon-arrow"></i>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/printReceipt">
               Print Receipt
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/stockEdit">
              Edit Bill
            </a>
        </li>
    </ul>
</li>

<li>
    <a href="javascript:;">
        <i class="fa fa-folder-open"></i> <span class="title"> Message </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/noticeAlert">
                Notice / Alert <i class="icon-arrow"></i>
            </a>
           
                </li>
                <li>
            <a href="<?php echo base_url(); ?>index.php/login/message">
               Message <i class="icon-arrow"></i>
            </a>
           
                </li>
               
            </ul>
        </li>
       <li>
    <a href="javascript:;">
        <i class="fa fa-folder-open"></i> <span class="title"> Mobile Message </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
   				 <li>
		            <a href="<?php echo base_url(); ?>index.php/login/smssetting">
		                Mobile SMS Setting<i class="icon-arrow"></i>
		            </a>
                </li>
        		<li>
		            <a href="<?php echo base_url(); ?>index.php/login/mobileNotice/Notice">
		                Notice<i class="icon-arrow"></i>
		            </a>
                </li>
                <li>
		            <a href="<?php echo base_url(); ?>index.php/login/mobileNotice/Parent%20Message">
		              Parent Message <i class="icon-arrow"></i>
		            </a>
                </li>
                 <li>
		            <a href="<?php echo base_url(); ?>index.php/login/mobileNotice/Announcement">
		               Announcement<i class="icon-arrow"></i>
		            </a>
                </li>
                <li>
		            <a href="<?php echo base_url(); ?>index.php/login/mobileNotice/Greeting">
		              Greeting <i class="icon-arrow"></i>
		            </a>
                </li>
              
                <li>
		            <a href="<?php echo base_url(); ?>index.php/login/mobileNotice/classwise">
		            Class Wise <i class="icon-arrow"></i>
		            </a>
                </li>
               
            </ul>
 </li>
 <li>
    <a href="javascript:;">
        <i class="fa fa-folder-open"></i> <span class="title"> Accounting </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>login/dayBook">
               Day Book<i class="icon-arrow"></i>
            </a>
           
                </li>
                <li>
            <a href="<?php echo base_url(); ?>login/cashPayment">
              Transaction <i class="icon-arrow"></i>
            </a>
           
            </li>
      </ul>
    </li>
    <!--
	<li>
	    <a href="javascript:;">
	        <i class="fa fa-folder-open"></i> <span class="title"> Website </span><i class="icon-arrow"></i> <span class="arrow "></span>
	    </a>
	    <ul class="sub-menu">
	        <li>
	            <a href="<?php echo base_url(); ?>index.php/login/gallery">
	              Gallery<i class="icon-arrow"></i>
	            </a>
	        </li>
	     </ul>
	</li>
	-->
</ul>
<?php endif;?>

<!-- ===================================================== Administrator Menu End ======================================= -->
<!-- ===================================================== Student Menu Start ======================================= -->
<?php if($this->session->userdata('login_type') == 'student'): ?>
<ul class="main-navigation-menu">
	<li class="active open">
	    <a href="<?php echo base_url(); ?>index.php/singleStudentControllers"><i class="fa fa-home"></i> <span class="title"> Dashboard </span></a>
	</li>
	<li>
	    <a href="<?php echo base_url(); ?>index.php/singleStudentControllers/studentProfile"><i class="fa fa-bars"></i> <span class="title"> Your Profile</a>
	</li>
	<li>
	    <a href="<?php echo base_url(); ?>index.php/singleStudentControllers/feeReport"><i class="fa fa-money"></i>Your Fee Report</a>
	</li>
	<li>
	    <a href="<?php echo base_url(); ?>index.php/singleStudentControllers/attendanceReport"><i class="fa fa-calendar-o"></i> Attendance Report</a>
	</li>
	<li>
	    <a href="<?php echo base_url(); ?>index.php/singleStudentControllers/leave"><i class="fa fa-edit"></i>Leave Detail</a>
	</li>
	<li>
	    <a href="<?php echo base_url(); ?>index.php/singleStudentControllers/timeScheduling"><i class="fa fa-calendar"></i>Time Table</a>
	</li>
	<li>
	    <a href="<?php echo base_url(); ?>index.php/singleStudentControllers/examResult"><i class="fa fa-book"></i>Exam/Test Report</a>
	</li>
	<li>
	    <a href="<?php echo base_url(); ?>index.php/singleStudentControllers/stock"><i class="fa fa-desktop"></i>Purchasing Report</a>
	</li>
	
	<li>
	    <a href="<?php echo base_url(); ?>index.php/singleStudentControllers/"><i class="fa fa-envelope-o"></i>Mail/Message</a>
	</li>
</ul>

<?php endif; ?>
<!-- ===================================================== Student Menu End ======================================= -->

<!-- ===================================================== Accountent Menu Start ======================================= -->
<?php if($this->session->userdata('login_type') == 'accountent'): ?>

<ul class="main-navigation-menu">
<li class="active open">
    <a href="<?php echo base_url(); ?>index.php/login"><i class="fa fa-home"></i> <span class="title"> Dashboard </span><span class="label label-default pull-right ">LABEL</span> </a>
</li>


<li>
    <a href="javascript:void(0)"><i class="fa fa-cogs"></i> <span class="title">Employee </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/addemployee">
                <span class="title"> Add Employee </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/employeeList">
                <span class="title">Employee List</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/employeeSalary">
                <span class="title"> Employee Salary</span>
            </a>
        </li>
        <!--
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/employeeSummry">
                <span class="title">Salary Summry </span>
            </a>
        </li>
       
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/employeeLeave">
                <span class="title"> Leave </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/updateProfile">
                <span class="title"> Update Profile </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/oldEmployeed">
                <span class="title"> Old Employee Details </span>
            </a>
        </li>
        -->
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-th-large"></i> <span class="title"> Students </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/newAdmission">
                <span class="title">New Admission</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/searchStudent">
                <span class="title">Search Students</span>
            </a>
        </li>
        <!-- 
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/oldStudentsDetails">
                <span class="title">Old Students</span>
            </a>
        </li>
         -->
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-pencil-square-o"></i> <span class="title">Fee </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/collectFee">
                <span class="title">Collect Fee</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/feeReport">
                <span class="title">Fee Report</span>
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-user"></i> <span class="title"> Attendance </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/studentAttendance">
                <span class="title">Student Attendance </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/teacherAttendance">
                <span class="title"> Teacher Attendance </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/stuAttendanceReport">
                <span class="title"> Attendance Report </span>
            </a>
        </li>
    </ul>
</li>




<li>
    <a href="javascript:;">
        <i class="fa fa-folder-open"></i> <span class="title"> Message </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/noticeAlert">
                Notice / Alert <i class="icon-arrow"></i>
            </a>
           
                </li>
                <li>
            <a href="<?php echo base_url(); ?>index.php/login/message">
               Message <i class="icon-arrow"></i>
            </a>
           
                </li>
               
            </ul>
        </li>
       <li>
    <a href="javascript:;">
        <i class="fa fa-folder-open"></i> <span class="title"> Mobile Message </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        		<li>
		            <a href="<?php echo base_url(); ?>index.php/login/mobileNotice/Notice">
		                Notice<i class="icon-arrow"></i>
		            </a>
                </li>
                <li>
		            <a href="<?php echo base_url(); ?>index.php/login/mobileNotice/Parent%20Message">
		              Parent Message <i class="icon-arrow"></i>
		            </a>
                </li>
                 <li>
		            <a href="<?php echo base_url(); ?>index.php/login/mobileNotice/Announcement">
		               Announcement<i class="icon-arrow"></i>
		            </a>
                </li>
                <li>
		            <a href="<?php echo base_url(); ?>index.php/login/mobileNotice/Greeting">
		              Greeting <i class="icon-arrow"></i>
		            </a>
                </li>
                <!-- 
                <li>
		            <a href="<?php echo base_url(); ?>index.php/login/smssetting">
		            Sms Setting <i class="icon-arrow"></i>
		            </a>
                </li>
                 -->
            </ul>
 </li>
 <li>
    <a href="javascript:;">
        <i class="fa fa-folder-open"></i> <span class="title"> Accounting </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>login/dayBook">
               Day Book<i class="icon-arrow"></i>
            </a>
           
                </li>
                <li>
            <a href="<?php echo base_url(); ?>login/cashPayment">
              Transaction <i class="icon-arrow"></i>
            </a>
           
            </li>
      </ul>
    </li>
	<li>
	    <a href="javascript:;">
	        <i class="fa fa-folder-open"></i> <span class="title"> Website </span><i class="icon-arrow"></i> <span class="arrow "></span>
	    </a>
	    <ul class="sub-menu">
	        <li>
	            <a href="<?php echo base_url(); ?>index.php/login/gallery">
	              Gallery<i class="icon-arrow"></i>
	            </a>
	        </li>
	     </ul>
	</li>
</ul>
<?php endif;?>
<!-- ===================================================== Accountent Menu End ======================================= -->

<!-- ===================================================== Employee Menu Start ======================================= -->
<?php if($this->session->userdata('login_type') == 'employee'): ?>
<ul class="main-navigation-menu">
	 <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/viewProfile">
                <span class="title"> View Profile </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/salarySummry">
                <span class="title">Salary Summry </span>
            </a>
        </li>
       
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/TeacherLeave">
                <span class="title"> Leave Detail </span>
            </a>
        </li>
   </ul>     
	
	
	

<?php endif; ?>
<!-- ===================================================== Employee Menu End ======================================= -->

<!-- ===================================================== Teacher Menu Start ======================================= -->
<?php if($this->session->userdata('login_type') == 'teacher'): ?>

<ul class="main-navigation-menu">
<li class="active open">
    <a href="<?php echo base_url(); ?>index.php/login"><i class="fa fa-home"></i> <span class="title"> Dashboard </span><span class="label label-default pull-right ">LABEL</span> </a>
</li>

<li>
    <a href="javascript:void(0)"><i class="fa fa-cogs"></i> <span class="title"> Personal </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
         <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/viewProfile">
                <span class="title"> View Profile </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/salarySummry">
                <span class="title">Salary Summry </span>
            </a>
        </li>
       
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/TeacherLeave">
                <span class="title"> Leave Detail </span>
            </a>
        </li>
      
       
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-th-large"></i> <span class="title"> Class </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/classTaken">
                <span class="title">Classes Taken</span>
            </a>
        </li>
      
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-pencil-square-o"></i> <span class="title">Fee </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/feeReport">
                <span class="title">Fee Report</span>
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-user"></i> <span class="title"> Attendance </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/teacherStudentAttendance">
                <span class="title">Student Attendance </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/teacherStuAttendanceReport">
                <span class="title"> Attendance Report </span>
            </a>
        </li>
    </ul>
</li>


<li>
    <a href="javascript:;">
        <i class="fa fa-folder-open"></i> <span class="title"> Message </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/teacherNoticeAlert">
                Notice / Alert <i class="icon-arrow"></i>
            </a>
           
                </li>
                <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/teacherMessage">
               Message <i class="icon-arrow"></i>
            </a>
           
                </li>
               
            </ul>
        </li>
</ul>
<?php endif;?>
<!-- ===================================================== Teacher Menu End ======================================= -->

<!-- end: MAIN NAVIGATION MENU -->
</div>
<!-- end: SIDEBAR -->
</div>
<div class="slide-tools">
    <div class="col-xs-6 text-left no-padding">
        <a class="btn btn-sm status" href="#">
            Status <i class="fa fa-dot-circle-o text-green"></i> <span>Online</span>
        </a>
    </div>
    <div class="col-xs-6 text-right no-padding">
        <a class="btn btn-sm log-out text-right" href="<?php echo base_url()?>index.php/homeController/logout">
            <i class="fa fa-power-off"></i> Log Out
        </a>
    </div>
</div>
</nav>
<!-- end: PAGESLIDE LEFT -->