<?php
$pk = $var->row();
$studID = $pk->enroll_num;
$fields1 = $this->db->list_fields('one_time_fee');
$fields = $this->db->list_fields('fee_shedule');

// $fee2 = $this->db->query("SELECT * FROM fee_deposit WHERE student_id='$studID' ORDER BY till_date DESC LIMIT 1")->row();

$this->db->where("student_id",$studID);
$fee1 = $this->db->get("fee_shedule");

$is_shedule = $fee1->num_rows();
$fee = $fee1->row();

?>
<br/><br/>
<form action="<?php echo base_url(); ?>index.php/feeControllers/payFee" method="post">
    <div class ="row">
        <div class="col-sm-12">
            <div class="row">
            <div class="alert alert-warning"> <strong>Note :-The fee of April should be deposited separately because one time fee is included.</strong> After April fee you can deposited number of month fee in one time.</div>
                <div class="col-sm-4">
                    <div class="panel panel-white">
                    <div class="panel-heading panel-red">Student Detail</div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row space15">
                                    <div class="col-sm-12 center">
                                        <?php if(strlen($pk->stud_image > 0)):?>
                                            <img alt="<?php echo $pk->name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/<?php echo $pk->photo;?>" />
                                        <?php else:?>
                                            <?php if($pk->gender == 'Male'):?>
                                                <img alt="<?php echo $pk->name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/stuMale.png" />	
                                            <?php endif;?>
                                            <?php if($pk->gender == 'Female'):?>
                                                <img alt="<?php echo $pk->name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/stuFemale.png" />	
                                            <?php endif;?>
                                        <?php endif;?>
                                    </div>
                                </div>
                                <div class="row space15">
                                    <div class="col-sm-12">	
                                        <div class="col-sm-4">Student Name</div>
                                        <div class="col-sm-8">
                                            <span class="text-bold"><?php echo $pk->name;?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row space15">
                                    <div class="col-sm-12">	
                                        <div class="col-sm-4">Father Name</div>
                                        <div class="col-sm-8">
                                            <span class="text-bold"><?php echo  $pk->father_full_name;?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row space15">
                                    <div class="col-sm-12">	
                                        <div class="col-sm-4">Trade  &amp; -Shif -Unit.</div>
                                        <div class="col-sm-8">
                                            <span class="text-bold"><?php echo $pk->trade."-".$pk->shift."-".$pk->unit;?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row space15">
                                    <div class="col-sm-12">	
                                        <div class="col-sm-4">Address</div>
                                        <div class="col-sm-8">
                                            <span class="text-bold">
                                                <?php echo $pk->address1 ?>
                                               
                                                <?php echo $pk->city ?>
                                                <?php echo $pk->state."-".$pk->pin_code;?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row space15">
                                    <div class="col-sm-12">	
                                        <div class="col-sm-4">Mobile Number</div>
                                        <div class="col-sm-8">
                                            <span class="text-bold"><?php echo $pk->mobile;?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row space15">
                                    <div class="col-sm-12">	
                                        <div class="col-sm-4">Pay Mode</div>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="payFeeMode" name="payment_mode" required="required">
                                                <option value="">-Select Mode-</option>
                                                <option value="cash">Cash</option>
                                                <option value="online">Online Transfer</option>
                                                <option value="challan">Bank Challan</option>
                                                <option value="cheque">Cheque</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                            </div><!-- End 12div column -->
                        </div><!-- End row -->
                    </div> <!-- End panel -->
                </div>
                <div class="col-sm-8">
                    <div class="panel panel-white">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12" >
                                    <?php 
                                        $color = array(
                                                "progress-bar-danger",
                                                "progress-bar-success",
                                                "progress-bar-warning",
                                                "progress-partition-green",
                                                "partition-azure",
                                                "partition-blue",
                                                "partition-orange",
                                                "partition-purple",
                                                "progress-bar-danger",
                                                "progress-bar-success",
                                                "progress-partition-green",
                                                "partition-purple",
                                        		 "progress-bar-danger",
                                                "progress-bar-success",
                                                "progress-bar-warning",
                                                "progress-partition-green",
                                                "partition-azure",
                                                "partition-blue",
                                                "partition-orange",
                                                "partition-purple",
                                                "progress-bar-danger",
                                                "progress-bar-success",
                                                "progress-partition-green",
                                                "partition-purple"
                                        );
                                    ?>
                                    <div class="progress form-control" style="width:450px; height:70px;"  >
                                        <input type="hidden" name="fsd" value="<?php echo $fsd; ?>" />
                                        <input type="hidden" name="month" value="<?php echo $month; ?>" />
                                        
                                        <?php for($i = 0; $i < $month; $i++):?>
                                        <div class="progress-bar <?php echo $color[$i];?>" style="width:45px; height:20px;">
                                            <?php echo date("M-y",strtotime("$fsd + $i month"));?>
                                        </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row space20">
                                <div class="col-sm-12">
                                    <select multiple="multiple" id="form-field-select-2" name="diposit_month[]" class="form-control search-select" required="required">
                                       
	                                        <?php for($i = $month; $i<=23; $i++):?>
	                                            <option value="<?php echo date("M-y",strtotime("$fsd + $i month"));?>">
	                                                <?php echo date("M-Y",strtotime("$fsd + $i month"));?>
	                                            </option>
	                                        <?php endfor; ?>
                                        
                                    </select>
                                </div>
                            </div>
                            <br/><br/>
                        </div>
                    </div>
<!-- ------------------------------------------------- Payment mode and Fee Detail Column Start ------------------------------------------------------ -->						
                    <div class="row">
                        <div class="col-sm-12">
<!-- ------------------------------------------------- Payment mode Column Start ------------------------------------------------------ -->							
                            <table style="width:100%;"><tr><td valign="top" width="50%">
                            <div class="col-sm-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading panel-red">Payment Mode Detail</div>
                                	<input type="hidden" name ="stuId" value="<?php echo $studID; ?>" />
                                    <div class="row" id="cheque">
                                        <div class="col-sm-12">
                                            <BR/>
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-5">Dipositor Name</div>
                                                    <div class="col-sm-7">
                                                        <input type="text" name ="dipositorName1" id="ac" class="form-control">
                                                    </div>
                                                </div>
                                            </div>									
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-5">Cheque Bank</div>
                                                    <div class="col-sm-7">
                                                        <input type="text" name ="chequebank" id="ac" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-5">Cheque number</div>
                                                    <div class="col-sm-7">
                                                        <input type="text" name ="chequeNumber" id="ac" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row" id="challan">
                                        <div class="col-sm-12">
                                            <BR/>
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-5">Dipositor Name</div>
                                                    <div class="col-sm-7">
                                                        <input type="text" name ="dipositorName2" id="ac" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-5">Transaction No.</div>
                                                    <div class="col-sm-7">
                                                        <input type="text" name ="transactionNumber" id="ac" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-5">Challan Number</div>
                                                    <div class="col-sm-7">
                                                        <input type="text" name ="challanNumber" id="ac" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-5">Deposite Date</div>
                                                    <div class="col-sm-7">
                                                        <input type="date" name ="diposit_date2" id="ac" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row" id="online">
                                        <div class="col-sm-12">
                                            <BR/>
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-5">Dipositor Name</div>
                                                    <div class="col-sm-7">
                                                        <input type="text" name ="dipositorName3" id="ac" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-5">Dipositor A/C No.</div>
                                                    <div class="col-sm-7">
                                                        <input type="text" name ="schoolAC" id="ac" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-5">Transaction No.</div>
                                                    <div class="col-sm-7">
                                                        <input type="text" name ="transactionNumber1" id="ac" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-5">Deposite Date</div>
                                                    <div class="col-sm-7">
                                                        <input type="date" name ="diposit_date1" id="ac" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row" id="cash">
                                        <div class="col-sm-12">
                                            <BR/>
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-5">Dipositor Name</div>
                                                    <div class="col-sm-7">
                                                        <input type="text" name ="dipositorName" id="ac" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row" id="reason">
                                        <div class="col-sm-12">
                                            <BR/>
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-3">Other Fee Reason</div>
                                                    <div class="col-sm-9">
                                                        <textarea rows="4" cols="" class="form-control" name="other_fee_reason" id="reason1"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row" id="no">
                                        <div class="col-sm-12">
                                            <BR/>
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="alert alert-block alert-info fade in">
                                                        <button data-dismiss="alert" class="close" type="button">
                                                            &times;
                                                        </button>
                                                        <h4 class="alert-heading"><i class="fa fa-info"></i> Info!</h4>
                                                        <p>
                                                            Please Select Payment mode first.... :)
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-sm-12">
								<?php if($is_shedule <= 0 || $month == 0):?>
                                <div class="panel panel-white">
                                    <div class="panel-heading panel-red">Admission Fee Detail</div>
                                    <div class="row" id="no2">
                                        <div class="col-sm-12">
                                            <BR/>
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="alert alert-block alert-info fade in">
                                                        <button data-dismiss="alert" class="close" type="button">
                                                            &times;
                                                        </button>
                                                        <h4 class="alert-heading"><i class="fa fa-info"></i> Info!</h4>
                                                        <p>
                                                            Please Select Payment mode first.... :)
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="otf">
                                        <div class="col-sm-12">
                                            <BR/>
                                            <input type="hidden" name="one_time" value="true" />
                                            <?php
                                                foreach($fields1 as $field):
                                                    if($field != "id" && $field != "student_id" && $field != "diposit_date"):
                                                    ?>
                                                        <div class="row space15">
                                                            <div class="col-sm-12">
                                                                <div class="col-sm-6"> <?php echo $field; ?></div>
                                                                <div class="col-sm-6">
                                                                    <input type="text" id="<?php echo $field; ?>" name="<?php echo $field; ?>" <?php if($field =="ANNUAL/Admission_Fee"){?> required="required" <?php  } ?> class="form-control"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    endif;
                                                endforeach;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            	<?php endif;?>
                            </div>
                            </td>
                            <td>
<!-- ------------------------------------------------- Payment mode Column End ------------------------------------------------------ -->					
<!-- ------------------------------------------------- Fee Detail Column ------------------------------------------------------ -->
                            <div class="col-sm-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading panel-red">Fee Detail</div>
                                    <div class="row" id="no1">
                                        <div class="col-sm-12">
                                            <BR/>
                                            <div class="row space15">
                                                <div class="col-sm-12">
                                                    <div class="alert alert-block alert-info fade in">
                                                        <button data-dismiss="alert" class="close" type="button">
                                                            &times;
                                                        </button>
                                                        <h4 class="alert-heading"><i class="fa fa-info"></i> Info!</h4>
                                                        <p>
                                                            Please Select Payment mode first.... :)
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div id="feeDetail">
                                        <div class="row space15">
                                            <div class="col-sm-12"></div>
                                        </div>
                                        <?php
                                            foreach($fields as $field):
                                                if($field != "id" && $field != "student_id"):
                                                ?>
                                                    <div class="row space15">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-6"> <?php if($field == "Examination_Fee"){
                                                            	if($month<6){echo $field."<br> First Sem";}
                                                            	if(($month>=6)&&($month<12)){echo $field."<br>Second Sem";}
                                                            	if(($month>=12)&&($month<18)){echo $field." <br>Third Sem";}
                                                            	if(($month>=18)&&($month<24)){echo $field."<br>Fourth Sem";}
                                                            	
                                                            }else{echo $field; }?></div>
                                                            <div class="col-sm-6">
                                                                <input type="text" id="<?php if($field == "Games_&_Sports_Fee"){echo "game";
                                                                }else{
                                                                	
                                                                	
                                                                	echo $field;}
                                                                 ?>" name="<?php echo $field; ?>" 
                                                                 if(($field == "Examination_Fee")&&($month == 5))
                                                                	{
                                                                	value=" ";
                                                                
                                                                	} else{
                                                                	value="<?php if($month != 0):echo $fee->$field;endif;?>"
                                                                	} 
                                                                	<?php if($is_shedule <= 0 && $field == "Others_Fee"){echo 'disabled="disabled" required = "required"';} ?> class="form-control"/>
                                                            	<?php if($month == 0 && $field == "Others_Fee"){ ?>
                                                            	<input type="hidden" name="Others_Fee" value="0">
                                                            	<?php }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                endif;
                                            endforeach;
                                        ?>
                                        <div class="row space15">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">Previous Balance</div>
                                                <div class="col-sm-6">
                                                	<?php 
                                                		$pb = $this->db->query("SELECT current_balance FROM fee_deposit WHERE student_id='$studID' ORDER BY till_diposit DESC LIMIT 1"); 
                                                		if($pb->num_rows() > 0){
                                                			$pBalance = $pb->row()->current_balance;
                                                		}else{
                                                			$pBalance = 0.00;
                                                		}
                                                	?>
                                                    <input type="text" id="pb" name="pb" value="<?php echo $pBalance; ?>" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                      
<?php $stock_balenc = $this->db->query("SELECT balance,sno FROM sale_info WHERE valid_id='$studID' ORDER BY sno DESC LIMIT 1");?>  
<?php if($stock_balenc->num_rows() > 0){ ?>   
<?php $stock_balenc1 = $stock_balenc->row();?>                                   
                                        <div class="row space15">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">Privious Stock Balance</div>
                                                <div class="col-sm-6">
                                                    
                                                    <input type="hidden" id="stock1" name="previous_stock_balance" value="<?php echo $stock_balenc1->balance;?>" />
                                                    <input type="hidden" id="stockId" name="stockId" value="<?php echo $stock_balenc1->sno;?>" />
                                                    <input type="text" id="stock" value="<?php echo $stock_balenc1->balance;?>" class="form-control" disabled="disabled"/>
                                                </div>
                                            </div>
                                        </div>     
<?php }else{$remain = 0.00; $avb=-12; 
?><div class="row space15">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">Privious Stock Balance</div>
                                                <div class="col-sm-6">
                                                    
                                                    <input type="hidden" id="stock1" name="previous_stock_balance" value="<?php echo $remain;?>" />
                                                   
                                                    <input type="text" id="stock" value="<?php echo $remain;?>" class="form-control" disabled="disabled"/>
                                                </div>
                                            </div>
                                        </div>  
                                        <?php 



}?>
                                        <div class="row space15">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">Total</div>
                                                <div class="col-sm-6">
                                                    <input type="hidden" id="total1" name="total" />
                                                    <input type="text" id="total" class="form-control" disabled="disabled"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row space15">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">Paid</div>
                                                <div class="col-sm-6">
                                                    <input type="text" id="paid" name="paid" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row space15">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">Current Balance</div>
                                                <div class="col-sm-6">
                                                    <input type="hidden" id="cb1" name="cb" value="0.00" />
                                                    <input type="text" id="cb" value="0.00" class="form-control" disabled="disabled"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row space15">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">Sub Total</div>
                                                <div class="col-sm-6">
                                                    <input type="hidden" id="sub_total1" name="sub_total" />
                                                    <input type="text" id="sub_total" class="form-control" disabled="disabled"/>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="row space15">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6"></div>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-info btn-squared btn-lg">
                                                        Save Fee <i class="fa fa-arrow-circle-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="row space15">
                                            <div class="col-sm-12"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td></tr></table>
<!-- ------------------------------------------------- Fee Detail Column ------------------------------------------------------ -->		
                        </div>
                    </div>
<!-- ------------------------------------------------- Payment mode and Fee Detail Column End ------------------------------------------------------ -->		
				</div>
            </div>
        </div>
    </div>
</form>
	<script>
		
	$("#cheque").hide();
	$("#challan").hide();
	$("#online").hide();
	$("#cash").hide();
	$("#feeDetail").hide();
	$("#otf").hide();
	$("#payFeeMode").change(function(){
		var st = $("#payFeeMode").val();
		//alert("teacherid");
		if(st=="cash"){
			$("#cheque").hide();
			$("#challan").hide();
			$("#online").hide();
			$("#cash").show();
			$("#feeDetail").show();
			$("#otf").show();
			$("#no").hide();
			$("#no1").hide();
			$("#no2").hide();
		}	
		else if(st=="online"){
			$("#cheque").hide();
			$("#challan").hide();
			$("#online").show();
			$("#cash").hide();
			$("#feeDetail").show();
			$("#otf").show();
			$("#no").hide();
			$("#no1").hide();
			$("#no2").hide();
					}	
		else if(st=="challan"){
			$("#cheque").hide();
			$("#challan").show();
			$("#online").hide();
			$("#cash").hide();
			$("#feeDetail").show();
			$("#otf").show();
			$("#no").hide();
			$("#no1").hide();
			$("#no2").hide();
		}
		else if(st=="cheque"){
			$("#cheque").show();
			$("#challan").hide();
			$("#online").hide();
			$("#cash").hide();
			$("#feeDetail").show();
			$("#otf").show();
			$("#no").hide();
			$("#no1").hide();
			$("#no2").hide();
		}
		else{
			$("#cheque").hide();
			$("#challan").hide();
			$("#online").hide();
			$("#cash").hide();
			$("#feeDetail").hide();
			$("#otf").hide();
			$("#no").show();
			$("#no1").show();
			$("#no2").hide();
		}
	});

	if($("#Others_Fee").val() > 0){
		$("#reason").show();
		$('#reason1').prop('required',true);
	}
	else{
		$("#reason").hide();
		$('#reason1').prop('required',false);
	}
	
	$("#Others_Fee").keyup(function(){
		if($("#Others_Fee").val() > 0){
			$("#reason").show();
			$('#reason1').prop('required',true);
		}else{
			$("#reason").hide();
			$('#reason1').prop('required',false);
		}
	});
	
	<?php if($month != 0):?>
	$("#form-field-select-2").change(function(){
		var month = $("#form-field-select-2 :selected").length;
		<?php foreach($fields as $field): ?>
		<?php if($field != "id" && $field != "student_id"):?>
			$("#<?php if($field == "Games_&_Sports_Fee"){echo "game";}else{echo $field;} ?>").val(<?php if($is_shedule > 0):echo $fee->$field;else: echo 0; endif;?> * month);
		<?php endif; ?>
		<?php endforeach; ?>
		var count = 0;
		<?php foreach($fields as $field): ?>
		<?php if($field != "id" && $field != "student_id"):?>
			count += Number($("#<?php if($field == "Games_&_Sports_Fee"){echo "game";}else{echo $field;} ?>").val());
		<?php endif; ?>
		<?php endforeach; ?>

		<?php if(($remain>0)&&($remain<$avb)):?>
		count = count + Number($("#stock").val());
		<?php endif;?>

		
		$("#paid").val(count + Number($("#pb").val()));
		$("#sub_total").val(count + Number($("#pb").val()));
		$("#sub_total1").val(count + Number($("#pb").val()));
		$("#total").val(count + Number($("#pb").val()));
		$("#total1").val(count + Number($("#pb").val()));
		$("#cb").val(Number($("#total").val())-Number($("#paid").val()));
		$("#cb1").val(Number($("#total").val())-Number($("#paid").val()));
	});
	
	var count = 0;
	<?php foreach($fields as $field): ?>
	<?php if($field != "id" && $field != "student_id"):?>
		count += Number($("#<?php if($field == "Games_&_Sports_Fee"){echo "game";}else{echo $field;} ?>").val());
	<?php endif; ?>
	<?php endforeach; ?>

	<?php if(($remain>0)&&($remain<$avb)):?>
	count = count + Number($("#stock").val());
	<?php endif;?>

	
	$("#paid").val(count + Number($("#pb").val()));
	$("#sub_total").val(count + Number($("#pb").val()));
	$("#sub_total1").val(count + Number($("#pb").val()));
	$("#total").val(count + Number($("#pb").val()));
	$("#total1").val(count + Number($("#pb").val()));
	$("#cb").val(Number($("#total").val())-Number($("#paid").val()));
	$("#cb1").val(Number($("#total").val())-Number($("#paid").val()));
	<?php endif;?>

	
	<?php foreach($fields as $field): ?>
		<?php if($field != "id" && $field != "student_id"): ?>
			$("#<?php if($field == "Games_&_Sports_Fee"){echo "game";}else{echo $field;} ?>").keyup(function(){
				var count = 0;
				
				<?php foreach($fields as $field): ?>
					<?php if($field != "id" && $field != "student_id"):?>
						count += Number($("#<?php if($field == "Games_&_Sports_Fee"){echo "game";}else{echo $field;} ?>").val());
					<?php endif; ?>
				<?php endforeach; ?>
				//alert(count);
				<?php if($month == 0):?>
					<?php foreach($fields1 as $field): ?>
						<?php if($field != "id" && $field != "student_id" && $field != "diposit_date" && $field != "Total_Admission_Fee"):?>
							count += Number($("#<?php echo $field; ?>").val());
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif?>

				<?php if(($remain>0)&&($remain<$avb)):?>
				count = count + Number($("#stock").val());
				<?php endif;?>

				
				$("#paid").val(count + Number($("#pb").val()));
				$("#sub_total").val(count + Number($("#pb").val()));
				$("#sub_total1").val(count + Number($("#pb").val()));
				$("#total").val(count + Number($("#pb").val()));
				$("#total1").val(count + Number($("#pb").val()));
				$("#cb").val(Number($("#total").val())-Number($("#paid").val()));
				$("#cb1").val(Number($("#total").val())-Number($("#paid").val()));

				//alert("aba");
			});
		<?php endif;?>
	<?php endforeach; ?>

		<?php
		if($month == 0):
            foreach($fields1 as $field):
                if($field != "id" && $field != "student_id"):
                ?>
                $("#<?php if($field == "Games_&_Sports_Fee"){echo "game";}else{echo $field;} ?>").keyup(function(){
    				var count = 0;
    				//alert("<?php echo $field;?>");
    				<?php 
    					foreach($fields as $field): 
    						if($field != "id" && $field != "student_id"):?>
    							count += Number($("#<?php if($field == "Games_&_Sports_Fee"){echo "game";}else{echo $field;} ?>").val());
    				<?php 
    						endif;
    					endforeach;
    					if($month == 0):
    						foreach($fields1 as $field):
								if($field != "id" && $field != "student_id" && $field != "diposit_date" && $field != "Total_Admission_Fee"):?>
									count += Number($("#<?php echo $field; ?>").val());
					<?php 
								endif;
							endforeach;
						endif;
					?>

					<?php if(($remain>0)&&($remain<$avb)):?>
					count = count + Number($("#stock").val());
					<?php endif;?>

					
	    				$("#paid").val(count + Number($("#pb").val()));
	    				$("#sub_total").val(count + Number($("#pb").val()));
	    				$("#sub_total1").val(count + Number($("#pb").val()));
	    				$("#total").val(count + Number($("#pb").val()));
	    				$("#total1").val(count + Number($("#pb").val()));
	    				$("#cb").val(Number($("#total").val())-Number($("#paid").val()));
	    				$("#cb1").val(Number($("#total").val())-Number($("#paid").val()));
	    			});
                <?php
                endif;
            endforeach;
       endif;
     ?>

     
     $("#stock").keyup(function(){
    	 var count = 0;
 		//alert("<?php echo $field;?>");
 		<?php foreach($fields as $field): ?>
 		<?php if($field != "id" && $field != "student_id"):?>
 			count += Number($("#<?php if($field == "Games_&_Sports_Fee"){echo "game";}else{echo $field;} ?>").val());
 		<?php endif; ?>
 		<?php endforeach; ?>
 		
 		<?php if($is_shedule <= 0):?>
 		<?php foreach($fields1 as $field): ?>
 		<?php if($field != "id" && $field != "student_id" && $field != "diposit_date" && $field != "Total_Admission_Fee"):?>
 		count += Number($("#<?php echo $field; ?>").val());
 		<?php endif; ?>
 		<?php endforeach; ?>
 		<?php endif?>
 		
 		<?php if(($remain>0)&&($remain<$avb)):?>
 		count = count + Number($("#stock").val());
 		<?php endif;?>
 		 
 		$("#paid").val(count + Number($("#pb").val()));
		$("#sub_total").val(count + Number($("#pb").val()));
		$("#sub_total1").val(count + Number($("#pb").val()));
		$("#total").val(count + Number($("#pb").val()));
		$("#total1").val(count + Number($("#pb").val()));
		$("#cb").val(Number($("#total").val())-Number($("#paid").val()));
		$("#cb1").val(Number($("#total").val())-Number($("#paid").val()));
 		
 	});






         
	$("#pb").keyup(function(){
		var count = 0;
		//alert("<?php echo $field;?>");
		<?php foreach($fields as $field): ?>
		<?php if($field != "id" && $field != "student_id"):?>
			count += Number($("#<?php if($field == "Games_&_Sports_Fee"){echo "game";}else{echo $field;} ?>").val());
		<?php endif; ?>
		<?php endforeach; ?>
		
		<?php if($is_shedule <= 0):?>
		<?php foreach($fields1 as $field): ?>
		<?php if($field != "id" && $field != "student_id" && $field != "diposit_date" && $field != "Total_Admission_Fee"):?>
		count += Number($("#<?php echo $field; ?>").val());
		<?php endif; ?>
		<?php endforeach; ?>
		<?php endif?>

		<?php if(($remain>0)&&($remain<$avb)):?>
		count = count + Number($("#stock").val());
		<?php endif;?>
		
		$("#total").val(count + Number($("#pb").val()));
		$("#total1").val(count + Number($("#pb").val()));
		$("#cb").val(Number($("#total").val())-Number($("#paid").val()));
		$("#cb1").val(Number($("#total").val())-Number($("#paid").val()));
	});
	
	$("#paid").keyup(function(){
		var c = Number($("#total").val()) - $("#paid").val();
		$("#sub_total").val($("#paid").val());
		$("#sub_total1").val($("#paid").val());
		$("#cb").val(c);
		$("#cb1").val(c);
	});

FormElements.init();
	//---------------------------------------------------------------------------------------------------

</script>