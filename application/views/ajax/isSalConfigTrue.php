<!-- start: FORM VALIDATION 1 PANEL -->
<?php $qs = $qres->row(); 

$this->db->select("SUM(monthNo) as month");
$this->db->where("emp_id",$enum);
$a = $this->db->get("emp_salary_info");
if($a->num_rows() > 0):
$month = $a->row()->month;
else:
$month = 0;
endif;

$this->db->select("finance_start_date as fsd");
$fsd = $this->db->get("general_settings")->row()->fsd;

$this->db->select("closing_balance as cb");
$this->db->where("opening_date",date("Y-m-d"));
$cb = $this->db->get("opening_closing_balance")->row()->cb;

$temp = $this->db->query("SELECT * FROM emp_salary_info WHERE emp_id = '$enum' ORDER BY id DESC LIMIT 1");

if($temp->num_rows() > 0){
	$pAdvance = $temp->row()->currentAdvance;
}else{
	$pAdvance = 0;
}
?>
<div class="panel panel-white">
	<div class="panel-heading panel-green">
		<h4 class="panel-title">Employee Salary Detail  <span class="text-bold"><?php echo $ename;?> (<?php echo $enum; ?>)</span></h4>
		<div class="panel-tools">
			<div class="dropdown">
				<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
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
	<div class="panel-body">
	<form action="<?php echo base_url();?>employeeController/saveSalary" method="post">
		<p style="color:#188f7f; font-weight: bolder;">
			Check employee personal &amp; salary detail. Assign salary to this pirticular employee.
		</p>
		<hr>
		<input type="hidden" name = "empid" value ="<?php echo $enum; ?>" class="form-control" />
			<div class="row" id="bankTrans">
				<?php $this->db->where("employee_id",$enum);?>
				<?php $bank1 = $this->db->get("bank_account_detail");?>
				<?php if($bank1->num_rows() >= 1): ?>
				<?php $bank = $bank1->row(); ?>
				<div class="col-md-2">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Bank Name
						</label>
						<br/>
						<?php if(strlen($bank->bank_name) > 0) {echo $bank->bank_name;}else{ echo "N/A"; }?>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Account Number
						</label>
						<br/>
						<?php if(strlen($bank->account_number) > 0) {echo $bank->account_number;}else{ echo "N/A"; } ?>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							IFSC Code
						</label>
						<br/>
						<?php if(strlen($bank->ifsc_code) > 0) {echo $bank->ifsc_code;}else{ echo "N/A"; }?>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Branch Name
						</label>
						<br/>
						<?php if(strlen($bank->branch_name) > 0) {echo $bank->branch_name;}else{ echo "N/A"; }?>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Branch Address
						</label>
						<br/>
						<?php if(strlen($bank->branch_address) > 0) {echo $bank->branch_address;}else{ echo "N/A"; }?>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Payee Name
						</label>
						<br/>
						<?php if(strlen($bank->bank_payee_name) > 0) {echo $bank->bank_payee_name;}else{ echo "N/A"; }?>
					</div>
				</div>
				<?php else:?>
				<div class="col-md-12">
					<div class="alert alert-danger">
						<button data-dismiss="alert" class="close">
							&times;
						</button>
						<strong>There is no bank Detail available of this Employee. change bank detail form employee profile section.</strong>
					</div>
				</div>
				<?php endif;?>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php 
                         $color = array(
                             "partition-purple",
                             "progress-partition-green",
                             "progress-bar-warning",
                             "progress-bar-success",
                             "progress-partition-green",
                             "partition-azure",
                             "partition-orange",
                             "progress-bar-success",
                             "partition-blue",
                             "progress-bar-danger",
                             "progress-bar-danger",
                             "partition-purple",
                         );
                    ?>
                    <div class="progress">
                       	<input type="hidden" name="fsd" value="<?php echo $fsd; ?>" />
                        <input type="hidden" name="month" value="<?php echo $month; ?>" />
                        <?php for($i =0 ; $i<=$month-1; $i++):?>
                        <div class="progress-bar <?php echo $color[$i];?>" style="width: 8.33%">
                        	<?php echo date("M-Y",strtotime("$fsd + $i month"));?>
                        </div>
                        <?php endfor; ?>
                    </div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Pay Mode
						</label>
						<select class="form-control" id="payMode" name="payment_mode" required="required">
	                        <option value="">-Select Mode-</option>
	                        <option value="cash">Cash</option>
	                        <option value="online">Online Transfer</option>
	                        <option value="cheque">Cheque</option>
                        </select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Select Name of months for Salary
						</label>
						<select multiple="multiple" id="form-field-select-2" name="diposit_month[]" class="form-control search-select" required="required">
                            <?php for($i=$month; $i<=11; $i++):?>
                                <option value="<?php echo date("M-y",strtotime("$fsd + $i month"));?>">
                                
                                     <?php if($i==0){echo date("M-Y",strtotime("$fsd + 0 month"));}else {echo date("M-Y",strtotime("$fsd + $i month"));}?>
                                 </option>
                            <?php endfor; ?>
                            	<option value="advance">
                                     Advance
                                 </option>
                       </select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Advance Amaount
						</label>
						<input type="text" class="form-control" name="advance_amount" id="advance_amount" value ="0.00"/>
					</div>				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Previous Due Advance
						</label>
						<input type="text" class="form-control" value ="<?php echo $pAdvance; ?>" disabled="disabled"/>
						<input type="hidden" class="form-control" name="previous_due_advance" id="previous_due_advance" value ="<?php echo $pAdvance; ?>"/>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Basic <span class="symbol required"></span>
						</label>
						<input type="hidden" id="basicSalary1" value ="<?php echo $qs->basicSalary;?>"/>
						<input type="text" class="form-control" name="basicSalary" id="basicSalary" value ="<?php echo $qs->basicSalary;?>"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							PF
						</label>
						<input type="hidden" id="ProvidentFund1" value ="<?php echo $qs->ProvidentFund;?>"/>
						<input type="text"  name="ProvidentFund" id="ProvidentFund" value ="<?php echo $qs->ProvidentFund;?>" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							SI
						</label>
						<input type="hidden" id="employeeStateInsurance1" value ="<?php echo $qs->employeeStateInsurance;?>" />
						<input type="text" name="employeeStateInsurance" id="employeeStateInsurance" value ="<?php echo $qs->employeeStateInsurance;?>" class="form-control"/>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							MA
						</label>
						<input type="hidden" id="medicalAllowance1" value ="<?php echo $qs->medicalAllowance;?>" />
						<input type="text"  name="medicalAllowance" id="medicalAllowance" value ="<?php echo $qs->medicalAllowance;?>" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							TA
						</label>
						<input type="hidden" id="transportAllowance1" value ="<?php echo $qs->transportAllowance;?>" />
						<input type="text" name="transportAllowance" id="transportAllowance" value ="<?php echo $qs->transportAllowance;?>" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							DA
						</label>
						<input type="hidden" id="dearnessAllowance1" value ="<?php echo $qs->dearnessAllowance;?>" />
						<input type="text" name="dearnessAllowance" id="dearnessAllowance" value ="<?php echo $qs->dearnessAllowance;?>" class="form-control"/>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							HA
						</label>
						<input type="hidden" id="houseRentAllowance1" value ="<?php echo $qs->houseRentAllowance;?>" />
						<input type="text" name="houseRentAllowance" id="houseRentAllowance" value ="<?php echo $qs->houseRentAllowance;?>" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							SA
						</label>
						<input type="hidden" id="skillAllowance1" value ="<?php echo $qs->skillAllowance;?>" />
						<input type="text" name="skillAllowance" id="skillAllowance" value ="<?php echo $qs->skillAllowance;?>" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							SPA
						</label>
						<input type="hidden" id="spcialAllowance1" value ="<?php echo $qs->spcialAllowance;?>" />
						<input type="text" name="spcialAllowance" id="spcialAllowance" value ="<?php echo $qs->spcialAllowance;?>" class="form-control"/>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							ENCENTIVE
						</label>
						<input type="hidden" id="encentieve1" value ="<?php echo $qs->encentieve;?>" />
						<input type="text" name="encentieve" id="encentieve" value ="<?php echo $qs->encentieve;?>" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							BONUS
						</label>
						<input type="hidden" id="bonus1" value ="<?php echo $qs->bonus;?>" />
						<input type="text" name="bonus" id="bonus" value ="<?php echo $qs->bonus;?>" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							GROSS
						</label>
						<input type="hidden" id="gross_s1" value ="<?php echo $qs->gross_s;?>" />
						<input type="text" name="gross_s" id="grossSalary" value ="<?php echo $qs->gross_s;?>" class="form-control"/>
					</div>
				</div>
			</div>
			<div class="row" id="bankForm">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Transaction No.
						</label>
						<input type="text"  name="transactionNo" class="form-control"/>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Employee Account No.
						</label>
						<input type="text"  name="empAccountNo" class="form-control"/>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Transfer Date
						</label>
						<input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="transactDate" class="form-control date-picker">
					</div>
				</div>
			</div>
			<div class="row" id="bankCheque">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Cheque Number
						</label>
						<input type="text"  name="chequeNo" class="form-control"/>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Cheque Type
						</label>
						<select class="form-control" id="payMode" name="payment_mode">
	                        <option value="">-Select Cheque Type-</option>
	                        <option value="Account Payee">Account Payee</option>
	                        <option value="Direct Payee">Self Payee</option>
                        </select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label" style="color:#188f7f; font-weight: bolder;">
							Payee Name
						</label>
						<input type="text"  name="payeeName" class="form-control"/>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<p style="color:#188f7f; font-weight: bolder;">
						<input type="hidden" id="cb" value="<?php echo $cb; ?>">
						After checking all detail click save & print salary Slip for salary Invoice.
					</p>
				</div>
				<div class="col-md-4">
					<button class="btn btn-green btn-block" type="submit" id="sub">
						<i class="fa fa-save"></i> SAVE &amp; PRINT SAL. SLIP <i class="fa fa-print"></i>
					</button>
					<div class="alert alert-danger" id="sub1">
						<strong>Oh snap!</strong> There is not enough balance in school account...
					</div>					
				</div>
			</div>
		</form>
	</div>
</div>
<script>
$("#sub1").hide();
$("#bankTrans").hide();
$("#bankForm").hide();
$("#bankCheque").hide();
$("#payMode").change(function(){
	var mode = $("#payMode").val();
	if(mode == "online" || mode == "cheque"){
		$("#bankTrans").show(500);
	}
	else{
		$("#bankTrans").hide(500);
	}
});
$("#payMode").change(function(){
	var mode = $("#payMode").val();
	if(mode == "online"){
		$("#bankForm").show(500);
	}
	else{
		$("#bankForm").hide(500);
	}
});
$("#payMode").change(function(){
	var mode = $("#payMode").val();
	if(mode == "cheque"){
		$("#bankCheque").show(500);
	}
	else{
		$("#bankCheque").hide(500);
	}
});

$("#form-field-select-2").change(function(){

	var isAdvance = $("#form-field-select-2").val();
	if( isAdvance != "advance"){
		var month = $("#form-field-select-2 :selected").length;
		
		var basic = Number($("#basicSalary1").val())*month;
		var da = Number($("#dearnessAllowance1").val())*month;
		var ma = Number($("#medicalAllowance1").val())*month;
		var ta = Number($("#transportAllowance1").val())*month;
		var ha = Number($("#houseRentAllowance1").val())*month;
		var sa = Number($("#skillAllowance1").val())*month;
		var spa = Number($("#spcialAllowance1").val())*month;
		var encentieve = Number($("#encentieve1").val())*month;
		var bonus = Number($("#bonus1").val())*month;
	
	
		var pf = Number($("#ProvidentFund1").val())*month;
		var esi = Number($("#employeeStateInsurance1").val())*month;
	
		$("#basicSalary").val(basic);
		$("#medicalAllowance").val(ma);
		$("#transportAllowance").val(ta);
		$("#dearnessAllowance").val(da);
		$("#houseRentAllowance").val(ha);
		$("#skillAllowance").val(sa);
		$("#spcialAllowance").val(spa);
		$("#encentieve").val(encentieve);
		$("#bonus").val(bonus);
	
		$("#ProvidentFund").val(pf);
		$("#employeeStateInsurance").val(esi);
	
	
		var basic = Number($("#basicSalary").val());
		var da = Number($("#dearnessAllowance").val());
		var ma = Number($("#medicalAllowance").val());
		var ta = Number($("#transportAllowance").val());
		var ha = Number($("#houseRentAllowance").val());
		var sa = Number($("#skillAllowance").val());
		var spa = Number($("#spcialAllowance").val());
		var encentieve = Number($("#encentieve").val());
		var bonus = Number($("#bonus").val());
		var adA = Number($("#advance_amount").val());
		
	
		var pDA = Number($("#previous_due_advance").val());
		var pf = Number($("#ProvidentFund").val());
		var esi = Number($("#employeeStateInsurance").val());
		var gross = (basic + da + ma + ta + ha + sa + spa + encentieve + bonus + adA) - (pf + esi + pDA);
		//$("#ProvidentFund").val(pf);
		
		$("#grossSalary").val(gross);
	
		var gross = Number($("#grossSalary").val());
		var cb = Number($("#cb").val());
		
		if(gross > cb){
			$("#sub").hide();
			$("#sub1").show();
		}
		else{
			$("#sub1").hide();
			$("#sub").show();
		}
	}else{
		var month = 0;
		
		var basic = Number($("#basicSalary1").val())*month;
		var da = Number($("#dearnessAllowance1").val())*month;
		var ma = Number($("#medicalAllowance1").val())*month;
		var ta = Number($("#transportAllowance1").val())*month;
		var ha = Number($("#houseRentAllowance1").val())*month;
		var sa = Number($("#skillAllowance1").val())*month;
		var spa = Number($("#spcialAllowance1").val())*month;
		var encentieve = Number($("#encentieve1").val())*month;
		var bonus = Number($("#bonus1").val())*month;
	
	
		var pf = Number($("#ProvidentFund1").val())*month;
		var esi = Number($("#employeeStateInsurance1").val())*month;
	
		$("#basicSalary").val(basic);
		$("#medicalAllowance").val(ma);
		$("#transportAllowance").val(ta);
		$("#dearnessAllowance").val(da);
		$("#houseRentAllowance").val(ha);
		$("#skillAllowance").val(sa);
		$("#spcialAllowance").val(spa);
		$("#encentieve").val(encentieve);
		$("#bonus").val(bonus);
	
		$("#ProvidentFund").val(pf);
		$("#employeeStateInsurance").val(esi);
	
	
		var basic = Number($("#basicSalary").val());
		var da = Number($("#dearnessAllowance").val());
		var ma = Number($("#medicalAllowance").val());
		var ta = Number($("#transportAllowance").val());
		var ha = Number($("#houseRentAllowance").val());
		var sa = Number($("#skillAllowance").val());
		var spa = Number($("#spcialAllowance").val());
		var encentieve = Number($("#encentieve").val());
		var bonus = Number($("#bonus").val());
		var adA = Number($("#advance_amount").val());
		
	
		var pDA = Number($("#previous_due_advance").val());
		var pf = Number($("#ProvidentFund").val());
		var esi = Number($("#employeeStateInsurance").val());
		var gross = (basic + da + ma + ta + ha + sa + spa + encentieve + bonus + adA) - (pf + esi + pDA);
		//$("#ProvidentFund").val(pf);
		
		$("#grossSalary").val(gross);
	
		var gross = Number($("#grossSalary").val());
		var cb = Number($("#cb").val());
		
		if(gross > cb){
			$("#sub").hide();
			$("#sub1").show();
		}
		else{
			$("#sub1").hide();
			$("#sub").show();
		}
	}
	
});

<?php 
		$fieldID = array(
				"#basicSalary",
				"#dearnessAllowance",
				"#medicalAllowance",
				"#transportAllowance",
				"#houseRentAllowance",
				"#skillAllowance",
				"#spcialAllowance",
				"#encentieve",
				"#bonus",
				"#ProvidentFund",
				"#employeeStateInsurance",
				"#advance_amount",
				"#previous_due_advance"
		);
		foreach($fieldID as $field):
	?>
	$("<?php echo $field;?>").keyup(function(){
		var basic = Number($("#basicSalary").val());
		var da = Number($("#dearnessAllowance").val());
		var ma = Number($("#medicalAllowance").val());
		var ta = Number($("#transportAllowance").val());
		var ha = Number($("#houseRentAllowance").val());
		var sa = Number($("#skillAllowance").val());
		var spa = Number($("#spcialAllowance").val());
		var encentieve = Number($("#encentieve").val());
		var bonus = Number($("#bonus").val());
		var adA = Number($("#advance_amount").val());
		

		var pDA = Number($("#previous_due_advance").val());
		var pf = Number($("#ProvidentFund").val());
		var esi = Number($("#employeeStateInsurance").val());
		var gross = (basic + da + ma + ta + ha + sa + spa + encentieve + bonus + adA) - (pf + esi + pDA);
		//$("#ProvidentFund").val(pf);
		$("#grossSalary").val(gross);

		var gross = Number($("#grossSalary").val());
		var cb = Number($("#cb").val());

		if(gross > cb){
			$("#sub").hide();
			$("#sub1").show();
		}
		else{
			$("#sub1").hide();
			$("#sub").show();
		}
		
	});

	<?php endforeach;?>

//$("gross_s")


FormElements.init();
</script>