<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Fee Invoice</title>

	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>
	
	<style type="text/css">

	@media print
	{
			body * { visibility: hidden; }
			#printcontent * { visibility: visible; }
			#printcontent { position: absolute; top: 40px; left: 30px; }
	    }
	</style>
	
    <script>
        function convert_number(number)
        {
            if ((number < 0) || (number > 999999999))
            {
                return "Number is out of range";
            }
            var Gn = Math.floor(number / 10000000);  /* Crore */
            number -= Gn * 10000000;
            var kn = Math.floor(number / 100000);     /* lakhs */
            number -= kn * 100000;
            var Hn = Math.floor(number / 1000);      /* thousand */
            number -= Hn * 1000;
            var Dn = Math.floor(number / 100);       /* Tens (deca) */
            number = number % 100;               /* Ones */
            var tn= Math.floor(number / 10);
            var one=Math.floor(number % 10);
            var res = "";

            if (Gn>0){
                res += (convert_number(Gn) + " Crore");
            }
            if (kn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(kn) + " Lakhs");
            }
            if (Hn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(Hn) + " Thousand");
            }

            if (Dn){
                res += (((res=="") ? "" : " ") +
                    convert_number(Dn) + " hundred");
            }


            var ones = Array("", "One", "Two", "Three", "Four", "Five", "Six","Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen","Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen","Nineteen");
            var tens = Array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty","Seventy", "Eigthy", "Ninety");

            if (tn>0 || one>0)
            {
                if (!(res==""))
                {
                    res += " and ";
                }
                if (tn < 2)
                {
                    res += ones[tn * 10 + one];
                }
                else
                {

                    res += tens[tn];
                    if (one>0)
                    {
                        res += ("-" + ones[one]);
                    }
                }
            }

            if (res=="")
            {
                res = "zero";
            }
            return res;
        }

    </script>
</head>

<body>
	<div id="printcontent">
	<div id="page-wrap" style="border:1px solid #333;">
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
		
		<div id="customer">
        	<div style="display:inline-block;">
            <table> 
                    <tr>
                    	<td style="border:none; line-height: 8px;">
                    		Student Name : <strong><?php echo $rowc->name; ?></strong>
                        </td>
                    </tr>
                    <tr>
                    	<td style="border:none; line-height: 8px;">
                    		Fathers Name : <strong><?php echo $rowc->father_full_name; ?></strong>
                        </td>
                    </tr>
                    <tr>
                    	<td style="border:none; line-height: 8px;">
                        	<?php echo 'Class : <strong>'.$rowc->trade.' - '.$rowc->unit.' - '.$rowc->shift.'</strong>';	?>
                        </td>
                    </tr>
                    <tr>
                    	<td style="border:none; line-height: 8px;">
                        	<?php echo 'Address : <strong>'.$rowc->address1.' '.$rowc->address2.' '.$rowc->city.' - '.$rowc->pin_code.'</strong>';	?>
                        </td>
                    </tr>
            </table>
			</div>
            <div style="display:inline-block; float:right; margin-right:5px;">
            <table>
                <tr>
                    <td class="meta-head" style="line-height: 8px;">Reciept No.</td>
                    <td style="line-height: 8px;"><?php echo $rowb->invoice_no; ?></td>
                </tr>
                <tr>
                    <td class="meta-head" style="line-height: 8px;">
                    	<?php echo 'Student ID :'; ?>
                    </td>
                    <td style="line-height: 8px;"><?php echo $rowc->enroll_num; $id = $rowc->enroll_num; ?></td>
                </tr>
                <tr>
                    <td class="meta-head" style="line-height: 8px;">Payment Mode</td>
                    <td style="line-height: 8px;"><?php echo $rowb->payment_mode; ?></td>
                </tr>
                <tr>
                    <td class="meta-head" style="line-height: 8px;">Number Of Month</td>
                    <td style="line-height: 8px;">
                    	<script> document.write(convert_number(<?php echo $rowb->diposit_month; ?>)); </script>
					</td>
                </tr>
                <tr>
                    <td class="meta-head" style="line-height: 8px;">Diposit Date</td>
                    <td style="line-height: 8px;">
                    	<?php 
							echo date("d-M-y", strtotime($rowb->diposit_date));
						?>
					</td>
                </tr>
                <tr>
                    <td class="meta-head" style="line-height: 8px;">Fee of Month</td>
                    <td style="line-height: 8px;">
                    	<?php 
                    		$sno = $rowb->id;
                    		$c = $this->db->query("SELECT * FROM `fee_deposit` WHERE student_id='$id' AND id < '$sno' ORDER BY id DESC LIMIT 1");
                    		if($c->num_rows() > 0){
	                    		$last = $c->row();
	                    		$month = $last->till_diposit;
	                    		for($k = 0; $k < $rowb->diposit_month;$k++){
									echo date("M-Y", strtotime("$month + $k month"));
									if($k != $rowb->diposit_month){
										echo ",";
									}
	                    		}
                    		}else{
                    			echo date("M-Y", strtotime($rowb->finance_start_date));
                    		}
						?>
					</td>
                </tr>
            </table>
            </div>
		
		</div>
		<table id="items" align="center" style="width:95%; margin-top:0px; alignment-adjust:central; margin-left:2.5%;">
		  <tr>
		       <th width="5%">No.</th>
               <th width="75%">Fee Name</th>
               <th width="20%">Fee Amount</th>
		  </tr>
		  <?php if($isAdmission == "true"): ?>
		  		<tr>
		  			<td colspan="3" align="center">Admission Fee Detail</td>
		  		</tr>
		  		<?php $i = 1;?>
		  		<?php $oneTime = $this->db->list_fields("one_time_fee");?>
		  		<?php foreach ($oneTime as $otf):?>
		  		<?php if($otf != "id" && $otf != "student_id" && $otf != "diposit_date"):?>
		  		<tr>
		  			<?php $temp = str_replace("_", " ", $otf)?>
		  			<?php $name = ucwords($temp);?>
		  			<td><?php echo $i;?></td>
		  			<td><?php echo $name; ?></td>
		  			<td><?php echo $one_time_fee->$otf;?></td>
		  		</tr>
		  		<?php $i++;?>
		  		<?php endif;?>
		  		<?php endforeach;?>
		  		<tr>
		  			<td colspan="3"><hr/></td>
		  		</tr>
		  <?php endif;?>
		<?php 
			$i = 1;
			$fields1 = $this->db->list_fields('fee_deposit');
			foreach($fields1 as $fields):
				if($fields != "id" && $fields != 'student_id' && $fields != "payment_mode" && $fields != "previous_balance" && $fields != "total" && $fields != "paid" && $fields != "other_fee_reason" && $fields != "current_balance" && $fields != "sub_total" && $fields != "diposit_month" && $fields != "diposit_date" && $fields != "till_diposit" && $fields != "invoice_no" && $fields != "finance_start_date"):
				$abc = str_replace("_"," ","$fields");
				$name = ucwords($abc);
		?>
		  <tr class="item-row">
		      <td style="line-height: 8px;"><?php echo $i; ?></td>
		      <td style="line-height: 8px;"><?php   if($fields == "Previous Stock Balance"){ echo "Remain Admission";}else{ echo $name;} if(($fields == "Others_Fee") && ($rowb->Others_Fee > 0)){ echo " (".$rowb->other_fee_reason.")";} ?></td>
		      <td style="line-height: 8px;">
		      	<?php echo $rowb->$fields; ?></td>
		  </tr>
<?php $i++; endif; endforeach; ?>		  
		  
          <tr>
          	  <td colspan="2" rowspan="4" align="right">
          	  		<table style="width:100%">
          	  			<tr>
          	  				<td rowspan="4" style="width: 75%;padding: 5px;" valign="bottom">
          	  					<table>
          	  						<tr>
          	  							<td style="border:0px;"><strong>Recieved by : </strong></td>
          	  							<td style="border:0px;"><?php echo $reciever_name; ?></td>
          	  							<td style="border:0px;" width="10"></td>
          	  							<td style="border:0px;"><strong>Paid By : </strong></td>
          	  							<td style="border:0px;"><?php echo $fee_bank_detail->depositor_name; ?></td>
          	  						</tr>
          	  					</table>
          	  					<strong>Paid Amount in Words : </strong><script> document.write(convert_number(<?php echo $rowb->paid; ?>)); </script> Only /-
          	  					<br/>
          	  					<br/>
          	  					This is computer generated copy it not require any signature or stamp...
          	  				</td>
          	  				<td align="right"><strong>Previous Balance</strong></td>
          	  			</tr>
          	  			<tr>
          	  				<td align="right"><strong>Total</strong></td>
          	  			</tr>
          	  			<tr>
          	  				<td align="right"><strong>Amount Paid</strong></td>
          	  			</tr>
          	  			<tr>
          	  				<td align="right"><strong>Balance Due</strong></td>
          	  			</tr>
          	  		</table>
          	  </td>
		      <td><?php echo $rowb->previous_balance; ?></td>
		  </tr>
		  <tr>
		      <td><?php echo $rowb->total; ?></td>
		  </tr>
          <tr>
		      <td><?php echo $rowb->paid; ?></td>
		  </tr>
          <tr>
		      <td><?php echo $rowb->current_balance; ?></td>
		  </tr>		
		</table>
	</div>
	</div>
	<br/><br/>
	<div class="invoice-buttons">
    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
        	<i class="fa fa-print padding-right-sm"></i> Print Reciept
        </button>
    </div>
    
</body>

</html>