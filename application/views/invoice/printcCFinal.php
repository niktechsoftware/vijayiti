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
	border: 3px solid #000;
	margin-bottom: 30px;
}

table h1, h2, h3 {
	font-family: Arial, Helvetica, sans-serif;
	line-height: 20px;
	margin: 10px;
}

.tcbody {
	font-family: Verdana, Geneva, sans-serif;
	font-style: italic;
	font-stretch: expanded;
	line-height: 30px;
	text-align: justify;
}

.main {
	width: 800px;
	margin: auto;
}
</style>

<body>		
	<div id="page-wrap">

		<?php 
	$school_info = mysql_query("select * from general_settings");
	$info = mysql_fetch_object($school_info);
?>		
		<table style="width: 100%; padding:20px;margin-bottom: 30px;">
			<tr>
				<td width="10%" style="border: none;">
					<img src="<?php echo base_url();?>assets/images/empImage/<?php echo $this->session->userdata("logo");?>" alt="" width="100" />
				</td>
				<td style="border: none;">
					<h2 align="center" style="text-transform:uppercase;"><?php echo $info->your_school_name; ?></h2>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php echo $info->address_1." ".$info->address_2." ".$info->city; ?>
			        </h3>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php echo $info->state." - ".$info->pin; ?>
			        </h3>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php if(strlen($info->phone_number > 0 )){echo "Phone : ".$info->phone_number.", ";} ?>
			            
			        </h3>
				</td>
			</tr>
			<tr><td style="border: none;"></td><td style="border: none;"></td></tr>
			<tr><td style="border: none;"></td><td style="border: none;"><h2 align="center" style="text-transform:uppercase;">Character Certificate</h2></td></tr>
		</table>
		
		
		<div style="clear:both"></div>
		
		<div id="customer">
        	<div >
<?php
	$id = $this->uri->segment(3);
	
	$rowb = $this->db->query("select * from student_info where student_id = $id ")->row();
	$gdetail = $this->db->query("select * from guardian_info where student_id = $id ")->row();
	$fname = $gdetail->father_full_name;
	$add= $gdetail->address;
	$stuname=$rowb->first_name." ".$rowb->midd_name." ".$rowb->last_name;
?>
          
	
		
		
			<div class="tcbody">
			<div>
				This is to certify that <strong><?php echo $stuname; ?></strong>, S/O / D/O <strong><?php echo $fname;?></strong>
				 of <strong><?php echo $add;?></strong>. He had
				been studying in this school. So for as I know, he is a child of moral and character . He did not take part in any activity subversive to the state. I wish him every success.
				
			</div>
			<div>
				<br />
			</div>
			<div>a. His moral character :   Good</div>
			<div>b. Behavior                  :   Good</div>
			<div>c. Progress                   :   Satisfactory</div>
			<div>
				<br />
			</div>

			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td valign="top" width="275"><div align="center">
								<br />
							</div></td>
						<td valign="top" width="369"><div align="center"></div>
							<div align="center">Principal</div>
							<div align="center"></div>
							</td>
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