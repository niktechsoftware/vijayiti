<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Transfer Certificate</title>
	
	
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>
	
</head>




<style type="text/css">
.header {
	border: 1px solid #000;
	margin-bottom: 13px;
}

table h1, h2, h3, h4 {
	font-family: Arial, Helvetica, sans-serif;
	line-height: 10px;
	margin: 8px;
}

.tcbody {
	font-family: Verdana, Geneva, sans-serif;
	font-style: italic;
	font-size : 12px;
	line-height: 20px;
	
}

.main {
	width: 700px;
	margin: auto;
}
</style>

<body>		
	<div id="page-wrap">

		<?php 
		$id = $this->uri->segment(3);
				$this->db->where("student_id",$id);
			$vl=$this->db->get("tc_certificate")->row();
	$school_info = mysql_query("select * from general_settings");
	$info = mysql_fetch_object($school_info);
?>		
		<table style="width: 100%; padding:5px;margin-bottom: 15px;">
			<tr>
				<td width="10%" style="border: none;">
					<img src="<?php echo base_url();?>assets/images/empImage/<?php echo $this->session->userdata("logo");?>" alt="" width="80" />
				</td>
				<td style="border: none;">
					<h2 align="center" style="text-transform:uppercase;"><?php echo $info->your_school_name; ?></h2>
			        <h4 align="center" style="font-variant:small-caps;">
						<?php echo $info->address_1." ".$info->address_2." ".$info->city; ?>
			        </h4>
			        <h4 align="center" style="font-variant:small-caps;">
						<?php if(strlen($info->phone_number > 0 )){echo $info->state." - ".$info->pin.", Phone : ".$info->phone_number.", ";} ?>
			            
			        </h4>
				</td>
			</tr>
			
		</table>
		
<?php
	$id = $this->uri->segment(3);
	
	$rowb = $this->db->query("select * from student_info where student_id = $id ")->row();
	$gdetail = $this->db->query("select * from guardian_info where student_id = $id ")->row();
	$fname = $gdetail->father_full_name;
	$mname = $gdetail->mother_full_name;
	$add= $gdetail->address;
	$stuname=$rowb->first_name." ".$rowb->midd_name." ".$rowb->last_name;
?>
    <div class="row">      
    <div class="col-md-12">
    <table style="width:100%;">
    <tr><td style="border-left:none;border-bottom:none;border-top:none; width:30%;"><h5>Aff.No.:L-8(E)170/2015</h5></td>
			<td style="text-align: center;border-left:none;border-bottom:none;border-top:none; width:35%;"></td>
			<td style="text-align: right;border-left:none;border-bottom:none;border-top:none; width:30%;"><h4></h4></td>
	</tr>
	<tr><td style="border-left:none;border-bottom:none;border-top:none; width:30%;"></td>
			<td style="text-align: center;border-left:none;border-bottom:none;border-top:none; width:35%;"><h3  style="border: 2px solid #000; padding: 5px; width: 210px; margin-left:100px;">Transfer Certificate</h3></td>
			<td style="text-align: right;border-left:none;border-bottom:none;border-top:none; width:30%;"></td>
			<tr>
	
			<tr><td style="border-left:none;border-bottom:none;border-top:none; width:30%;">Book No...........</td>
			<td style="text-align: center;border-left:none;border-bottom:none;border-top:none; width:35%;">Student ID : <?php echo $rowb->student_id;?>/<?php echo $vl->tc_number; ?></td>
			<td style="text-align: right;border-left:none;border-bottom:none;border-top:none; width:30%;">Admission No........</td>
			<tr><td></br></td></tr>
			<tr><td></br></td></tr>
			<tr><td></br></td></tr>
		</tr>
			
			
			</table>
		
		</div>
	</div>
		
			<div class="tcbody">
			
			<div>1. Name of Pupil : <strong><?php echo $stuname; ?></strong></div>
			<div>2. (a) Father's Name : <strong>Mr.<?php echo $fname;?> </strong></div>
			<div>&nbsp;&nbsp;&nbsp;(b) Mother's Name : <strong>Mrs.<?php echo $mname;?> </strong></div>
			
			<div>3. (b) Nationality : <strong>Indian </strong></div>
			<div>4. Whether the condidate belongs to Schedule Caste or Schedule Tribe : <strong><?php if(($rowb->category=="SC")||($rowb->category=="sc")||($rowb->category=="ST")||($rowb->category=="st")){echo "Yes";}else{echo "No";}  ?> </strong></div>
			<div>5. Date of first admission in the School with class : <strong><?php //echo $rowb->adm_date;?> ......................,.................................. <?php //echo $rowb->class_id;?><?php //echo $rowb->section;?> </strong></div>
			<div>6. Date of Birth : <strong><?php echo $rowb->date_ob; ?></strong></div>
			<div>7. Class in which the pupil last studied : <strong>.........................................................................</strong></div>
			<div>8. School/Board Annual Examination last taken with result : <strong>.............................................</strong></div>
			<div>9. Whether failed, if so once/twice in the same class : <strong>......................................................</strong></div>
			<div>10. Subject Studied :<?php $i=1; $this->db->where("class_id",$rowb->class_id);
			$this->db->where("section",$rowb->section);
			$sub=$this->db->get("subject")->result();
			foreach ($sub as $s):
			if($i%5==0){echo "</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> ".$i.".</strong>  ";
			echo $s->subject;
			$i++; endforeach;
			?>
			<div>11. Whether qualified for promotion to the higher class :</br>If so, Which class : <strong>......................................................................................................</strong></div>
			<div>12. Month upto which the (pupil has paid) school dues paid : <strong>...........................................</strong></div>
			<div>13. Any fee concession available of  : if so, the nature of such concession : <strong>.........................</strong></div>
			<div>14. Total No. of working days : <strong>.....................................................................................</strong></div>
			<div>15. Total No. of working days present : <strong>..........................................................................</strong></div>
			<div>16. Whether NCC Cadet/Boy Scout Girl Guide (details may be given): <strong>................................</strong></div>
			<div>17. Games played or extra curricular activities in which the pupil usually took part : <br>
			(mention achievement level therein)<strong>...............................................................................</strong></div>
			<div>18. General conduct : <strong>...................................................................................................</strong></div>
			<div>19. Date of application for certificate : <strong><?php echo date('d-m-Y',strtotime($vl->tc_date)); ?></strong></div>
			<div>20. Date of Issue of certificate : <strong><?php echo date('d-m-Y',strtotime($vl->tc_date)); ?></strong></div>
			<div>21. Reasons for leaving the school : <strong>...............................................................................</strong></div>
			<div>22. Any other remarks : <strong>................................................................................................</strong></div>
			
			<div></br></div>
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td valign="top" width="275"><div align="left">
								Sig. of Class teacher
							</div></td>
							<td valign="top" width="275"><div align="center">
								Sig. of Checked by
							</div></td>
						<td valign="top" width="275"><div align="right">
								Sig. of Principal
							</div></td>
					</tr>
				</tbody>
			</table>
		</div>
	
		
	
	</div>
	<br/><br/>
	<div class="invoice-buttons" id='non-printable'>
    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
        	<i class="fa fa-print padding-right-sm"></i> Print Reciept
        </button>
    </div>
    </div>
    
    
</div>

</body>
</html>
    
</body>

</html>