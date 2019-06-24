<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Student Profile</title>
	
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>

	<style type="text/css">
		table tr th{
			text-align: left;
		}
	</style>
	
</head>

<body>

	<div id="page-wrap" style="border: 1px solid #FFF; width:1000px;">
		<?php 
	$school_info = mysql_query("select * from general_settings");
	$info = mysql_fetch_object($school_info);
?>		
		<table style="width: 100%">
			<tr>
				<td width="10%" style="border: none;">
					<img src="<?php echo base_url();?>assets/images/empImage/<?php echo $this->session->userdata("logo");?>" alt="" width="100" />
				</td>
				<td style="border: none;">
					<h1 align="center" style="text-transform:uppercase;"><?php echo $info->your_school_name; ?></h1>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php echo $info->address_1." ".$info->address_2." ".$info->city; ?>
			        </h3>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php echo $info->state." - ".$info->pin; ?>
			        </h3>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php if(strlen($info->phone_number > 0 )){echo "Phone : ".$info->phone_number.", ";} ?>
			            <?php echo "Mobile : ".$info->mobile_number; ?>
			        </h3>
				</td>
			</tr>
		</table>
		
        
		<div style="clear:both"></div>
		
		<?php
 
	$id = $this->uri->segment(3);
	$this->db->where("enroll_num",$id);
	$detail = $this->db->get("student_info")->row();
	
	
?>
		
		<table id="items">
			
			<tr>
				<th>Student ID</th>
				<td><?php echo $detail->enroll_num; ?></td>
				<th>Scholer name</th>
				<td><?php echo $detail->name; ?></td>
			</tr>
			<tr>
				
				<th>Admission Date</th>
				<td><?php echo $detail->admission_date;?></td>
			</tr>
			<tr>
				<th>Student Name</th>
				<td><?php echo $detail->name;?></td>
				<th>Date of Birth</th>
				<td><?php echo $detail->dob;?></td>
			</tr>
			<tr>
				<th>Class Section</th>
				<td><?php echo $detail->trade." - ".$detail->unit;?></td>
				<th>Gender</th>
				<td><?php echo $detail->gender;?></td>
			</tr>
		
			<tr>
				<th>Nationality</th>
				<td><?php echo "Indian";?></td>
			
			</tr>
			<tr>
				<th>Category</th>
				<td><?php $detail->category;?></td>
				<th>Religion</th>
				<td><?php echo $detail->religion;?></td>
			</tr>
			<tr>
				<th>Address 1</th>
				<td><?php echo $detail->address1;?></td>
				<th>Address 2</th>
				<td><?php echo $detail->address2;?></td>
			</tr>
			<tr>
				<th>City</th>
				<td><?php echo $detail->city;?></td>
				<th>State</th>
				<td><?php echo $detail->state;?></td>
			</tr>
			<tr>
				<th>Country</th>
				<td><?php echo $detail->country." - ".$detail->pin_code;?></td>
				<th>Phone</th>
				<td></td>
			</tr>
			<tr>
				<th>Mobile</th>
				<td><?php echo $detail->mobile; ?></td>
				<th>Email</th>
				<td><?php echo $detail->email;?></td>
			</tr>
		
			<tr>
				<th colspan="4" style="text-align: center;">-------- PARANTS INFORMATION --------</th>
			</tr>
			<tr>
				<th>Father Name</th>
				<td><?php echo $detail->father_full_name; ?></td>
				<th>Mother Name</th>
				<td><?php echo $detail->mother_name;?></td>
			</tr>
			
		
		</table>
		
		
	<div class="invoice-buttons">
    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
        	<i class="fa fa-print padding-right-sm"></i> Print Profile
        </button>
    </div>
	</div>
	
</body>

</html>