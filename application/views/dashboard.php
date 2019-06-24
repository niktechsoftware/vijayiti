<!-- start: PAGE CONTENT -->
<?php 
$is_login = $this->session->userdata('is_login');
$is_lock = $this->session->userdata('is_lock');
$logtype = $this->session->userdata('login_type');
if($is_login == "admin"){
	$vd = date('m-Y');
	$this->db->where("send_date",$vd);
	$t = $this->db->get("sms_reminder");
	if($t->num_rows() < 1)
	{
		$date_of_post = date('d-m-Y');
		$date = $date_of_post;
		$stamp = strtotime($date);
		$v = date("d", $stamp);
		 
		if(( $v == 1 ) || ($v == 2)|| ($v == 3) || ($v == 4)|| ($v == 5)|| ($v == 7))
		{
			$val = $this->db->get("sms_setting")->row();
			$senderiD=$val->sender_id;
			$authkey=$val->auth_key;
			$this->load->helper("sms");
			$school_info = mysql_query("select * from general_settings");
			$info = mysql_fetch_object($school_info);
			$isSMS = $this->db->get("sms")->row()->parent_message;
			$i=0;
			if($isSMS=="yes")
			{

				$this->db->where("status","Active");
				$std = $this->db->get("student_info");
				$i=0;
				if($std->num_rows() > 0)
				{
					foreach($std->result() as $s):
					$this->db->where("student_id",$s->student_id);
					$m=$this->db->get("guardian_info")->row();
					$fmobile = $m->f_mobile;
					$msg =	"Dear Parent ".$m->father_full_name." your Ward's (".$s->first_name." ".$s->midd_name." ".$s->last_name.") school fee is remain to deposit. Please deposit before 10".date('m-Y').".Ignore message if already deposited ".$info->your_school_name;
					if($fmobile){
						sms($authkey,$msg,$senderiD,$fmobile);
						$i++;}
						if($s->mobile)
						{
							sms($authkey,$msg,$senderiD,$fmobile);
							$i++;
						}
						endforeach;
				}
			}
			$data = array(
					'send_date'	=> date('m-Y'),
					'last_reminder' => "NO",
					'total_sms' => $i
			);
			$this->db->insert("sms_reminder",$data);
		}
	}

}

?>

<?php if($this->uri->segment("3") == "noteTrue"){?>
<div class="row">
    <div class="col-md-6 col-lg-12 col-sm-6">
        <div class="panel panel-default panel-white core-box">
			<div class="alert alert-success">
				<button data-dismiss="alert" class="close">
					&times;
				</button>
				<strong>Done!</strong> Your new Note successfully added <a class="alert-link" href="#">
					into database.</a>
			</div>
		</div>
	</div>
</div>
<?php } elseif($this->uri->segment("3") == "noteFalse"){?>
<div class="row">
    <div class="col-md-6 col-lg-12 col-sm-6">
        <div class="panel panel-default panel-white core-box">
			<div class="alert alert-danger">
				<button data-dismiss="alert" class="close">
					&times;
				</button>
				<strong>Oh my god! sorry....</strong>
					Something going wrong contect to <strong>Gfinch Technologies</strong> for this.... :(
			</div>
		</div>
	</div>
</div>
<?php }?>

<?php if($this->uri->segment("3") == "noteDelTrue"){?>
<div class="row">
    <div class="col-md-6 col-lg-12 col-sm-6">
        <div class="panel panel-default panel-white core-box">
			<div class="alert alert-success">
				<button data-dismiss="alert" class="close">
					&times;
				</button>
				<strong>Done!</strong> Your Note successfully Deleted from database.
			</div>
		</div>
	</div>
</div>
<?php } elseif($this->uri->segment("3") == "noteDelFalse"){?>
<div class="row">
    <div class="col-md-6 col-lg-12 col-sm-6">
        <div class="panel panel-default panel-white core-box">
			<div class="alert alert-danger">
				<button data-dismiss="alert" class="close">
					&times;
				</button>
				<strong>Oh my god! sorry....</strong>
					Something going wrong contect to <strong>Gfinch Technologies</strong> for this.... :(
			</div>
		</div>
	</div>
</div>
<?php }?>

<!-- ------------------------------------------ All alert codeing end -------------------------------------------- -->

<div class="row">
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-green padding-20 text-center core-icon">
                    <i class="fa fa-inr fa-2x icon-big"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/login/feeReport">
	                <div class="padding-20 core-content">
	                	<h3 class="title block no-margin">Fee Report</h3>
	                	<br/>
	                	<span class="subtitle"> Find out detailed fee Reports  </span>
	                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-blue padding-20 text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/login/newAdmission">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Student Admission</h4>
                    <span class="subtitle"> Enrolle a new student. </span>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-red padding-20 text-center core-icon">
                    <i class="fa fa-tasks fa-2x icon-big"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/login/studentAttendance">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Atendance Report</h4>
                    <br/>
                    <span class="subtitle"> Access the Attendance Report. </span>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-azure padding-20 text-center core-icon">
                    <i class="fa fa-book fa-2x icon-big"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/login/daybook">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Day Book</h4>
                    <br/>
                    <span class="subtitle"> Access the Day Book. </span>
                </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-7 col-lg-4">
    <div class="panel panel-dark">
        <div class="panel-heading">
            <h4 class="panel-title">Cash Transcation</h4>
            <div class="panel-tools">
                <div class="dropdown">
                    <a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-white">
                        <i class="fa fa-cog"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-light pull-right" role="menu">
                        <li>
                            <a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
                        </li>
                        <li>
                            <a class="panel-refresh" href="#">
                                <i class="fa fa-refresh"></i> <span>Refresh</span>
                            </a>
                        </li>
                        <li>
                            <a class="panel-config" href="#panel-config" data-toggle="modal">
                                <i class="fa fa-wrench"></i> <span>Configurations</span>
                            </a>
                        </li>
                        <li>
                            <a class="panel-expand" href="#">
                                <i class="fa fa-expand"></i> <span>Fullscreen</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="panel-body no-padding">
            <div class="partition-green padding-15 text-center">
                <h4 class="no-margin">Last 4 Transaction</h4>
            </div>
            <div id="accordion" class="panel-group accordion accordion-white no-margin">
                <div class="panel no-radius">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle padding-15">
                                <i class="icon-arrow"></i>
                                <?php $new = $this->db->query("SELECT * FROM cash_payment WHERE date='".date("Y-m-d")."'")->num_rows();?>
                                Cash Payment <?php if($new > 0):?> <span class="label label-danger pull-right"><?php echo $new;?></span><?php endif;?>
                            </a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapseOne">
                        <div class="panel-body no-padding partition-light-grey">
                        <a href="<?php echo base_url()?>index.php/login/dayBook">
                            <table class="table">
                                <tbody>
                                <?php $i=1;?>
                                <?php $cash = $this->db->query("SELECT * FROM cash_payment ORDER BY receipt_no DESC LIMIT 4");?>
                                <?php if($cash->num_rows() >= 1):?>
                                <?php foreach($cash->result() as $row):?>
                                <tr>
                                    <td class="center"><?php echo $i;?></td>
                                    <td>
                                    	<?php 
                                    		if(strlen($row->valid_id)>1):
                                    			echo $row->valid_id;
                                    		else:
                                    			echo $row->name;
                                    		endif;
                                    	?>
                                    </td>
                                    <td class="center"><?php echo $row->amount;?></td>
                                    <td><?php echo date("d-M-Y", strtotime("$row->date"));?></td>
                                </tr>
                                <?php $i++; endforeach;?>
                                <?php else: ?>
                                <tr>
                                    <td class="center"><h2>No Trasaction done yet...</h2></td>
                                </tr>
                                <?php endif;?>
                                </tbody>
                            </table>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="panel no-radius">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle padding-15 collapsed">
                                <i class="icon-arrow"></i>
                                <?php $new = $this->db->query("SELECT * FROM bank_transaction WHERE date='".date("Y-m-d")."'")->num_rows();?>
                                Bank Transaction <?php if($new > 0):?> <span class="label label-danger pull-right"><?php echo $new;?></span><?php endif;?>
                            </a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapseTwo">
                        <div class="panel-body no-padding partition-light-grey">
                        <a href="<?php echo base_url()?>index.php/login/dayBook">
                            <table class="table">
                                <tbody>
                                <?php $i=1;?>
                                <?php $cash = $this->db->query("SELECT * FROM bank_transaction ORDER BY receipt_no DESC LIMIT 4");?>
                                <?php if($cash->num_rows() >= 1):?>
                                <?php foreach($cash->result() as $row):?>
                                <tr>
                                    <td class="center">1</td>
                                    <td><?php echo $row->id_name; ?></td>
                                    <td class="center"><?php echo $row->amount;?></td>
                                    <td><?php echo date("d-M-Y", strtotime("$row->date"));?></td>
                                </tr>
                                <?php $i++; endforeach;?>
                                </tbody>
                                <?php else: ?>
                                <tr>
                                    <td class="center"><h2>No Trasaction done yet...</h2></td>
                                </tr>
                                <?php endif;?>
                            </table>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="panel no-radius">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapseThree" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle padding-15 collapsed">
                                <i class="icon-arrow"></i>
                                <?php $new = $this->db->query("SELECT * FROM director_transaction WHERE date='".date("Y-m-d")."'")->num_rows();?>
                                Director Transaction <?php if($new > 0):?> <span class="label label-danger pull-right"><?php echo $new;?></span><?php endif;?>
                            </a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapseThree">
                        <div class="panel-body no-padding partition-light-grey">
                        <a href="<?php echo base_url()?>index.php/login/dayBook">
                            <table class="table">
                                <tbody>
                                <?php $i=1;?>
                                <?php $cash = $this->db->query("SELECT * FROM director_transaction ORDER BY receipt_no DESC LIMIT 4");?>
                                <?php if($cash->num_rows() >= 1):?>
                                <?php foreach($cash->result() as $row):?>
                                <tr>
                                    <td class="center"><?php echo $i;?></td>
                                    <td>
                                    	<?php echo $row->applicant_name; ?>
                                    </td>
                                    <td class="center"><?php echo $row->amount;?></td>
                                    <td><?php echo date("d-M-Y", strtotime("$row->date"));?></td>
                                </tr>
                                <?php $i++; endforeach;?>
                                <?php else: ?>
                                <tr>
                                    <td class="center"><h2>No Trasaction done yet...</h2></td>
                                </tr>
                                <?php endif;?>
                                </tbody>
                            </table>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-4 col-sm-6">
    <div class="panel panel-blue core-box">
        <div class="e-slider owl-carousel owl-theme">
        
        
        <?php $leve = $this->db->query("SELECT * FROM emp_leave WHERE approve='no' ORDER BY sno DESC LIMIT 5");?>
        <?php $is_row = $leve->num_rows();?>
        <?php if($is_row > 0):?>
        
        <?php foreach($leve->result() as $row):?>
        	<?php $id = $row->emp_id;?>
			<?php $this->db->where("emp_no",$id); ?>
			<?php $info = $this->db->get("employee_info")->row(); ?>
        	
            <div class="item">
                <div class="panel-body">
                    <div class="core-box">
                        <div class="text-light text-bold">
                            Employee Leve Request
                        </div>
                        <br/>
                        <table style="width: 100%;">
                        	<tr>
                        		<td rowspan="4" width="30%">
                        			                        		
                        			<?php if(strlen($info->photo > 0)):?>
										<img alt="<?php echo $info->first_name;?>" width="80%" src="<?php echo base_url()?>assets/images/empImage/<?php echo $info->photo;?>" />
									<?php else:?>
										<?php if($info->gender == 'Male'):?>
											<img alt="<?php echo $info->first_name;?>" width="80%" src="<?php echo base_url()?>assets/images/empImage/empMale.png" />	
										<?php endif;?>
										<?php if($info->gender == 'Female'):?>
											<img alt="<?php echo $info->first_name;?>" width="80%" src="<?php echo base_url()?>assets/images/empImage/empFemale.png" />	
										<?php endif;?>
									<?php endif;?>
                        		</td>
                        		<td>Name :
                        			<?php echo $info->first_name." ".$info->last_name;?>
                        		</td>
                        	</tr>
                        	<tr>
                        		<td>Start Date : <?php echo date("d-M-Y", strtotime($row->start_date)); ?></td>
                        	</tr>
                        	<tr>
                        		<td>Days : <?php echo $row->total_leave; ?></td>
                        	</tr>
                        	<tr>
                        		<td>End Date : <?php echo date("d-M-Y", strtotime($row->end_date)); ?></td>
                        	</tr>
                        	<tr>
                        		<td colspan="2"><br/>Reason : <?php echo implode(' ', array_slice(explode(' ', $row->reason), 0, 7)); ?>...</td>
                        	</tr>
                        </table>
                    </div>
                </div>
                <div class="padding-10">
                	<a href="#" class="btn btn-xs btn-light-blue"><i class="fa fa-check"></i> Approve</a>
                    <a href="#" class="btn btn-xs btn-light-blue"><strong>x</strong> Reject</a>
                    <a href="#" class="view-more pull-right text-dark text-bold">
                        View More <i class="fa fa-angle-right text-light"></i>
                    </a>
                </div>           
            </div>
        <?php endforeach; ?>
        <?php else: ?>
        	<div class="item">
                <div class="panel-body">
                    <div class="core-box">
                        <div class="text-light text-bold">
                            Employee Leve Request
                        </div>
                        <br/>
                    	<h2>There is no request for the day... :)</h2>
                    </div>
                </div>   
            </div> 
        <?php endif;?>
            
        </div>
    </div>
</div>
<div class="col-md-12 col-lg-4 col-sm-12">
    <div id="notes">
        <div class="panel panel-note">
            <div class="e-slider owl-carousel owl-theme">
            <?php $this->db->limit(5);?>    
            <?php $this->db->where("user_id",$this->session->userdata("userid")); ?>
            <?php $res = $this->db->get("privatenote"); ?>
            
            <?php if($res->num_rows() > 0):?>            
            <?php foreach($res->result() as $row):?>
                
                <div class="item">
                    <div class="panel-heading">
                        <h4 class="no-margin"><?php echo $row->title; ?></h4>
                    </div>
                    <div class="panel-body space10">
                        <div class="note-short-content">
                            <?php echo implode(' ', array_slice(explode(' ', $row->note), 0, 15)); ?>...
                        </div>
                    </div>
                    <div class="panel-footer">
                        <time class="timestamp" title="<?php echo $row->date; ?>">
                            <?php echo $row->date; ?>
                        </time>
                        <div class="note-options pull-right">
                            <a href="#readNote" class="read-note" data-subviews-options='{"startFrom": "right", "onShow": "readNote(subViewElement)", "onHide": "hideNote()"}'>
                            	<i class="fa fa-chevron-circle-right"></i> Read</a>
                            	<a href="<?php echo base_url()?>index.php/msgNoticeControllers/delNotice1/<?php echo $row->id;?>" class="delete-note"><i class="fa fa-times"></i> Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>    
            <?php else:?>
            	<div class="item">
                    <h3>There is no any note avaliable this time.</h3>
                </div>
            <?php endif;?>    
            </div>
        </div>
    </div>
</div>
 <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-green padding-20 text-center core-icon">
                    <i class="fa fa-inr fa-2x icon-big"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/login/sMSReport">
	                <div class="padding-20 core-content">
	                	<h3 class="title block no-margin">SMS Report</h3>
	                	<br/>
	                	<span class="subtitle"> Find out detailed SMS Reports  </span>
	                </div>
                </a>
            </div>
        </div>
    </div>

</div>

<!-- end: PAGE CONTENT-->