<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Sale Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">BILL INVOICE</textarea>
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
		
		<div style="clear:both"></div>
		
		<div id="customer">
        	<div style="display:inline-block;">
<?php
 
	$id = $this->uri->segment(3);
	
	$sqlb=mysql_query("select * from sale_info where bill_no = $id");
	$rowb=mysql_fetch_object($sqlb);
	
	$id_name = $rowb->id_name;
	$valid_id = $rowb->valid_id;
	
	if($id_name == "Employee Id")
	{
		$sqlc=mysql_query("select * from employee_info where emp_no=$valid_id");
		$rowc=mysql_fetch_object($sqlc);
	}
	if($id_name == "Student Id")
	{
		$sqlc=mysql_query("select * from student_info where student_id=$valid_id");
		$rowc=mysql_fetch_object($sqlc);
	}

?>
            <table>
                    <tr><td style="border:none;"><strong>To</strong></td></tr>
                    <tr>
                    	<td style="border:none;">
                    	<?php if($id_name == '04'): ?>
                    		<?php echo $rowb->name; ?>
                    	<?php else: ?>
                    		<strong><?php echo $rowc->first_name." ".$rowc->last_name; ?></strong>
                    	<?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                    	<td style="border:none;">
                        	<?php
							if($id_name == "Employee Id")
							{
								echo '<strong>Mobile No. :</strong>'.$rowc->mobile;
							}
							if($id_name == "Student Id")
							{
								echo '<strong>Class :</strong>'.$rowc->class_id.' - '.$rowc->section;
							}
							?>
                    		
                        </td>
                    </tr>
            </table>
			</div>
            <div style="display:inline-block; float:right">
            <table>
                <tr>
                    <td class="meta-head" colspan="2"><h3>Purchase Order</h3></td>
                </tr>
                <tr>
                    <td class="meta-head">
                    	Reciept No.
                    </td>
                    <td><?php
							echo $id;
							?>
                            </td>
                </tr>
                <tr>
                    <td class="meta-head">
                    	<?php
							if($id_name == "Employee Id")
							{
								echo 'Employee ID :';
							}
							elseif($id_name == "Student Id")
							{
								echo 'Student ID :';
							}
							elseif($id_name == "04"){
								echo "Other ID";
							}
							?>
                    </td>
                    <td><?php echo $valid_id; ?></td>
                </tr>
                <tr>
                    <td class="meta-head">Date</td>
                    <td><?php echo date("d-M-Y", strtotime($rowb->date)); ?></td>
                </tr>
            </table>
            </div>
		
		</div>
		
		<table id="items">
		
		  <tr>
		       <th width="5%">No.</th>
               <th width="12%">Item Code</th>
               <th width="30%">Description</th>
               <th width="9%">Quantity</th>
               <th width="11%">Unit Price</th>
               <th width="10%">Discount</th>
               <th width="12%">Total Price</th>
               <th width="11%">Sub Total</th>
		  </tr>
<?php $sqld=mysql_query("select * from sale_info where bill_no = $id"); ?>
<?php $i = 1; while($s = mysql_fetch_object($sqld)){ ?>		  
		  <tr class="item-row">
		      <td><?php echo $i; ?></td>
		      <td><?php echo $s->item_no; $b = $s->item_no; ?></td>
		      <td>
			  	<?php 
				$sqle=mysql_query("select * from enter_stock where item_no = '$b'");
				$rowe=mysql_fetch_object($sqle);
				echo $rowe->item_name.",".$rowe->item_cat.",".$rowe->item_size;
				 ?>
              </td>
		      <td><?php echo $s->item_quant; ?></td>
		      <td><?php echo $s->pries_per_item; ?></td>
		      <td><?php echo $s->dis_rs; ?></td>
              <td><?php echo $s->total_price; ?></td>
		      <td><?php echo $s->sub_total; ?></td>
		  </tr>
<?php $i++; } 

	$sqlb=mysql_query("select SUM(dis_rs),SUM(item_quant),SUM(total_price),SUM(sub_total),paid,balance from sale_info where bill_no = $id");
	$rowb=mysql_fetch_array($sqlb);

?>		  
		  
		  <tr>
		      <td colspan="3" align="right"><strong>Total</strong></td>
		      <td colspan="2"><?php echo $rowb['SUM(item_quant)']; ?></td>
		      <td><?php echo $rowb['SUM(dis_rs)']; ?></td>
              <td><?php echo $rowb['SUM(total_price)']; ?></td>
		      <td><?php echo $rowb['SUM(sub_total)']; ?></td>
		  </tr>
          
		  <tr>
		      <td class="total-line" colspan="2"><?php if($rowb['paid'] > 0){?>
          	  					<strong>Amount Paid</strong>
          	  					<?php }else{?>
          	  					<strong>Amount Refund</strong>
          	  					<?php }?></td>
		      <td class="total-value"><div id="total"><?php echo $rowb['paid']; ?></div></td>
              <td class="total-line" colspan="4"><strong>Balance Due</strong></td>
		      <td class="total-value"><div id="total"><?php echo $rowb['balance']; ?></div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
	<div class="invoice-buttons">
    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
        	<i class="fa fa-print padding-right-sm"></i> Print Reciept
        </button>
    </div>
	</div>
</body>

</html>