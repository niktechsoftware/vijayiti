<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script><!-- start: PAGE CONTENT -->
<script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script>
		

<div class="row">
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel panel-white">
		
			<div class="panel-heading panel-pink">
				<h4 class="panel-title">Student  <span class="text-bold">Fee Collect Area</span></h4>
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
							<a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a>
						</li>
						<li>
							<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
						</li>
					</ul>
					</div>
				</div>
			</div>
			<div class="panel-body">
			    <div class="alert alert-info"><h3 class="media-heading text-center">Wecome to Fees Collection Area</h3><p class="media-timestamp">If you want to show student fee collection then 
		enter student id in student id box and click on get record button. Then open new form fill all detail in the form and show all fees of student and save it.</div>
				<div class="row">
					<div class="col-sm-12">
					<?php if(($this->uri->segment(3) == "feeFalse")){?>
						<div class="alert alert-danger">
							<button data-dismiss="alert" class="close">
								&times;
							</button>
							<strong>Oh my god...!</strong> Somthing Wrong contact Niktech Software Solutions... :(
						</div>
					<?php } ?>
						<div class="panel panel-calendar">
							<div class="panel-heading panel-purple border-light">
								<h4 class="panel-title">Collect <span class="text-bold">Student Fees</span></h4>
							</div>
							<div class="panel-body">
						<form action="<?php echo base_url();?>index.php/feeControllers/checkID"  method ="post" role="form" class="smart-wizard form-horizontal" id="form">

							<div class="row">
									<div class="col-sm-5">
										<div class="form-group">
						                      <label for="inputStandard" class="col-lg-4 control-label">
						                      		Student ID <span style="color:red">*</span>
						                      </label>
						                      <div class="col-lg-5">
						                        <input type="text" id="studid" name="studid" class="form-control text-uppercase" />
						                       
						                      </div>
						                </div>	
									</div>
									<div class="col-sm-7" id="getFsd"></div>
									
								</div>
							</form>
							
				                <div class="panel-body">
									<?php
								
									if($stud_id!='0'){
									$pk=$totdata;
									//$pk->student_info.id;
								
									//print_r($fsddate->row());
									if($fsddate->num_rows()>0){
									    $fsddate = $fsddate->row()->finance_start_date;
									    	$fee_record=$this->feemodel->getperfeerecord($pk->s_no);
										?>
								<form action="<?php echo base_url(); ?>index.php/feeControllers/payFee" method="post" id ="form2">
												    <div class ="row">
												        <div class="col-sm-12">
														<?php if($this->uri->segment(4)){?>
												<input type="hidden"  id ="fsd_id" name ="fsdid" value="<?php echo $fsd_id; ?>" class="form-control"  />
												<?php }?>  

												            <div class="row">
															<div class="alert alert-warning"> <strong class="">Note :-This is fee section.here you can deposite fee. Procedure for fee deposite is-First choose Pay Mode,Pay Date,Student Category after that click on those month which you want to pay.
														You can pay two or more month at a time press control button and choose you month you want to pay </div>
												                <div class="col-sm-4">
												                    <div class="panel panel-white">
												                    <div class="panel-heading panel-red text-uppercase">Student Detail</div>
												                        <div class="row">
												                            <div class="col-sm-12">
												                                <div class="row space15">
												                                    <div class="portfolio-item center">
																					<?php if(strlen($pk->stud_image > 0)):?>
																						<img alt="<?php echo $pk->name;?>" class="img-circle" height="148" width="140" src="<?php echo base_url()?>assets/<?php //echo $this->session->userdata("school_code");?>/images/stuImage/<?php echo $pk->photo;?>" />
																					<?php else:?>
																						<?php if($pk->gender == "1"):?>
																							<img alt="<?php echo $pk->name;?>" class="img-circle" height="148" width="140" src="<?php echo base_url()?>assets/<?php //echo $this->session->userdata("school_code");?>/images/stuImage/stuMale.png" />
																						<?php endif;?>
																						<?php if($pk->gender == "0"):?>
																							<img alt="<?php echo $pk->name;?>" class="img-circle" height="148" width="140" src="<?php echo base_url()?>assets/<?php //echo $this->session->userdata("school_code");?>/images/stuImage/stuFemale.png" />
																						<?php endif;?>
																					<?php endif;?>  
												                                    </div>
												                                </div>
												                                <div class="row space15">
												                                    <div class="col-sm-12">
												                                        <div class="col-sm-4 text-uppercase">Student Name & ID</div>
												                                        <div class="col-sm-8">
												                                            <span class="text-bold text-uppercase"><?php echo $pk->name."[".$pk->enroll_num."]";?></span>
												                                        </div>
												                                    </div>
												                                </div>
												                                <div class="row space15">
												                                    <div class="col-sm-12">
												                                        <div class="col-sm-4 text-uppercase">Father Name</div>
												                                        <div class="col-sm-8">
												                                            <span class="text-bold text-uppercase"><?php echo $pk->father_full_name;?></span>
												                                        </div>
												                                    </div>
												                                    <input type="hidden" name ="stuId" id = "stuId" value="<?php echo $pk->s_no; ?>" />
												                                </div>

																				<?php $this->db->where('id',$pk->class_id);

																				$classname=$this->db->get("class_info")->row();
                                                                            
																				 $this->db->where('id',$classname->section);
																				$classsection=$this->db->get("class_section");
																				
																				?>
												                                <div class="row space15">
												                                    <div class="col-sm-12">
												                                        <div class="col-sm-4 text-uppercase">Class &amp; Sec.</div>
												                                        <div class="col-sm-8">
												                                            <span class="text-bold text-uppercase"><?php echo $classname->class_name;?></span>

																							& <span class="text-bold text-uppercase"><?php if($classsection->num_rows()>0){ echo $classsection->row()->section;}else {echo "N/A";}?></span>

												                                        </div>
												                                    </div>
												                                </div>
												                                
												                                <div class="row space15">
												                                    <div class="col-sm-12">
												                                        <div class="col-sm-4 text-uppercase">Address</div>
												                                        <div class="col-sm-8">
												                                            <span class="text-bold text-uppercase">
												                                                <?php echo $pk->address1 ?>

												                                                <?php echo $pk->city ?>
												                                                <?php echo $pk->state."-".$pk->pin_code;?>
												                                            </span>
												                                        </div>
												                                    </div>
												                                </div>
												                                <div class="row space15">
												                                    <div class="col-sm-12">
												                                        <div class="col-sm-4 text-uppercase">Mobile Number</div>
												                                        <div class="col-sm-8">
												                                            <input type="hidden" name ="mobile" id ="mobile" value="<?php echo $pk->mobile; ?>" />
												                                            <span class="text-bold"><?php echo $pk->mobile;?></span>
												                                        </div>
												                                    </div>
												                                </div>
												                                <div class="row space15">
												                                    <div class="col-sm-12">
												                                        <div class="col-sm-4 text-uppercase">Pay Mode</div>
												                                        <div class="col-sm-8">
												                                            <select class="form-control text-uppercase" id="payFeeMode" name="payment_mode" required="required">
												                                                <option value="">-Select Mode-</option>
												                                                <option value="1">Cash</option>
												                                                <option value="2">Online Transfer</option>
												                                                <option value="3">Bank Challan</option>
												                                                <option value="4">Cheque</option>
												                                            </select>
												                                        </div>
												                                    </div>
												                                </div>
												                                 <div class="row space15">
												                                    <div class="col-sm-12">
												                                        <div class="col-sm-4 text-uppercase">Pay Date</div>
												                                        <div class="col-sm-8">
									                                                    <input type="datetime" class="form-control" name ="subdate" value="<?php echo date('Y-m-d H:i:s');?>" required/>

												                                        </div>
												                                    </div>
												                                </div>
												                            
												                                	<div class="row space15">
												                                    <div class="col-sm-12">
												                                        <div class="col-sm-4 text-uppercase">Student Category</div>
												                                        <div class="col-sm-8">
												                                            <select class="form-control text-uppercase" id="scat" name="s_cat" required="required">
																								<?php 
																									$this->db->where('student_id',$pk->s_no);
																									//$this->db->where('school_code',$this->session->userdata('school_code'));
																									$student_cat=$this->db->get('fee_deposit');
																								//	print_r($student_cat->row()->feecat);exit;
																									if($student_cat->num_rows()>0){
																										$this->db->where('id',$student_cat->row()->feecat);
																										//$this->db->where('school_code',$this->session->userdata('school_code'));
																										$new_old_cat=$this->db->get('fee_cat')->row();   
																									?>
														<option  value="<?php echo $new_old_cat->id;?>"><?php echo $new_old_cat->cat_name;?></option>
																									<?php }else{
																								
																								//$school_code=$this->session->userdata('school_code');
																								//$this->db->where('school_code',$school_code);
																								
																								$cat=$this->db->get('fee_cat');
																								// print_r($cat) ;
																								if($cat->num_rows()>0){
																								 foreach($cat->result() as $sc):?>
												                                                <option  value="<?php echo $sc->id;?>"><?php echo $sc->cat_name;?></option>
																							   <?php endforeach; }else{
                                                                                                         echo 'First define student type in setting menu inside fee category';
																							   }}?>
																							   
																							</select>
																							
												                                        </div>
												                                    </div>
												                                </div>
												                                <div class="alert panel-pink" id="onlinePayDetails" style="display: none">
																					<button data-dismiss="alert" class="close">×</button>
																					<h4 class="media-heading text-center">Online Fee Payment Charges</h4>
																					<p>* Credit Card 2.00 %</p>
																					<p>* Net Banking  Rs.28</p>
																					<p>* Debit Card 0.0 % for transaction less than 2000, 1.90 % transaction for more than Rs.2000.</p>
																					<p>* Amex Card 3.60 %</p>
																					<p>* Wallet 2.50 %</p>
																					<p>* UPI Rs.0 for transaction less than 2000, 28 transaction for more than Rs.2000.</p>
																					<p>* Post-Paid 2.90 %</p>
																				</div>
												                                
												                            </div><!-- End 12div column -->
												                        </div><!-- End row -->
												                    </div> <!-- End panel -->
												                </div>
												                <div class="col-sm-8">
												                    <div class="panel panel-white">
												                        <div class="col-sm-12">
												                            <div class="row">
												                                <div class="col-sm-12">
												                                    <?php
												                                    $this->db->select("*");
												                                      // $this->db->where("school_code",$this->session->userdata("school_code"));
												                                      $apm1  =  $this->db->get("late_fees");
												                                      
												                                       $this->db->distinct();
                                                                                		   $this->db->select("*");
                                                                                		   $this->db->where("student_id",$pk->s_no);
                                                                                		    //$this->db->where_in("taken_month",$mpinffd);
                                                                                		   $monthDeposit = $this->db->get("deposite_months");
												                                    
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
												                                                 "partition-blue",
												                                                "partition-purple"
												                                        );
												                                    ?>
												                                    <div class="progress">


												                                        <?php


												                                        $i=1;
												                                        if($fee_record->num_rows()>0){
												                                            
												                                     $j=1;  
												                                       
                                                                                		   foreach($monthDeposit->result() as $mdf):
												                                           ?>
												                                            <div class="progress-bar <?php echo $color[$i];?>" style="width: 8.33%">
												                                            <?php
												                                            $deposite_month =$mdf->deposite_month-24;
												                                            $rdt =date('Y-m-d', strtotime("$deposite_month months", strtotime($fsddate)));
												                                            //$rdt = "01-".$fd->month_number."-2019";
												                                            echo date("M-y",strtotime("$rdt"));
												                                            ?>
												                                        </div>
												                                        <?php $i++;endforeach;
												                                       }else{
												                                           
												                                      if($apm1->num_rows()>0){
												                                          $apm =$apm1->row()->apply_method;
												                                          $h=0; $pm=24/$apm;
												                                          for($j=1;$j<$pm+1;$j++){?>

												                                      
												                                        <?php } }?>
												                                        <?php  } ?>
												                                    </div>
												                                </div>
												                            </div>
												                            <?php

															       	$fsdval=$this->session->userdata('fsd');

																	$this->db->where('id',$fsdval);
																	$fsd_id=$this->db->get('fsd')->row();
																	$startdate=$fsd_id->finance_start_date;
																	$enddate=$fsd_id->finance_end_date;
																	 $tdate=(int)(date('m', strtotime($startdate)));

																	 $endate=(int)(date('m', strtotime($enddate)));

						

												                            ?>
												                            <div class="row space20">
												                                <div class="col-sm-12">
												                                    <select multiple="multiple" id="form-field-select-2" name="diposit_month[]" class="form-control search-select" required="required">
													                                      <?php
																						 
													                                      if($fee_record->num_rows()>0){
													                                            $j=0;  foreach($monthDeposit->result() as $fd):
																								$mpinffd[$j]  = $fd->deposite_month;
																								
                                                                                            $j++;
                                                                                            endforeach;
												                                        $this->db->distinct();
                                                                                		   $this->db->select("taken_month");
                                                                                		   $this->db->where("class_id",$pk->class_id);
                                                                                		    $this->db->where_not_in("taken_month",$mpinffd);
																						   $monthDeposit1 = $this->db->get("class_fees");
																						  
                                                                                		   $monthDe=$monthDeposit1->num_rows();
                                                                                		   //foreach($monthDeposit1->result() as $mdf1):
                                                                                		    $apm =$apm1->row()->apply_method;
													                                              $h=0; $pm=24/$apm;
                                                                                		   for($j=1;$j<$pm+1;$j++){
                                                                                            if($j > $monthDeposit->num_rows()){
												                                           ?>
												                                            <div class="progress-bar <?php echo $color[$i];?>" style="width: 8.33%">
												                                            <?php
												                                            //$deposite_month1 =$mdf1->taken_month-4;
																							$rdt =date('Y-m-d', strtotime("$h months", strtotime($fsddate)));
																							$value=$h+$tdate;

												                                          ?>
													                                     
													                                            <option value="<?php if(($value)>24){echo $value-12;}else{ echo $value;}?>">
													                                                <?php echo date("M-Y",strtotime($rdt));?>
													                                            </option>
													                                            
												                                        </div>
												                                        <?php   }  $h=$h+$apm; $i++;}//endforeach;
													                                      }else{
																							if($apm1->num_rows()>0){
																								$apm =$apm1->row()->apply_method;
																								$h=0; $pm=24/$apm;
																								for($j=1;$j<$pm+1;$j++){

																									$rdt = date('Y-m-d', strtotime("$h months", strtotime($fsddate)));
																									$ft=$h+$tdate;
																									if($ft>24){
																								 $ft1=$ft-12;}
																								 else{
																									 $ft1=$ft;
																								 }
																								 
																								 ?>
																									<option value="<?php echo $ft1;?>">
																									<?php echo date("M-Y",strtotime($rdt));?>
																									</option>
																						            <?php
																						             $h=$h+$apm;

																						    }
																							}}?>
																		
													                      
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
												                            <table style="width:100%;">
																			<tr>
												                            <td id="basicfee"></td>
												                            </tr></table>
												<!-- ------------------------------------------------- Fee Detail Column ------------------------------------------------------ -->
												                        </div>
												                    </div>
												<!-- ------------------------------------------------- Payment mode and Fee Detail Column End ------------------------------------------------------ -->
																</div>
												            </div>
												        </div>
												    </div>
												</form>
                                               <?php //$this->db->where('school_code',$this->session->userdata('school_code'));
                                               $catid=$this->db->get('fee_cat');
                                               ?>
												<script type="text/javascript">
												    $("#payFeeMode").change(function () {
													    if (this.value === "2"){
													        $("#onlinePayDetails").show();
													    } else {
													        $("#onlinePayDetails").hide();
													    }
													});
												    
													$("#form-field-select-2").change(function(){
														var month=[];var i=0;
														var stuId = $("#stuId").val();
															var catId = $("#scat").val();
															var fsdid = $("#fsd_id").val();
															//alert(stuId);
															//alert(catId);
															//alert(fsdid);
														$('#form-field-select-2 :selected').each(function(i, selectedElement) {
															month[i] =$(selectedElement).val();
															//alert(month[i]+stuId+catId);

															});

															//alert(month[i]+stuId+catId +fsdid);


														$.post("<?php echo site_url('feeControllers/getFeeDetails') ?>", {month : month,stuId : stuId,catId : catId, fsdid : fsdid}, function(data){
															$("#basicfee").html(data);

														});


													});
													$("#paid").keyup(function(){
														var c = Number($("#total").val()) - $("#paid").val();
														$("#sub_total").val($("#paid").val());
														$("#sub_total1").val($("#paid").val());
														$("#cb").val(c);
														$("#cb1").val(c);
													});

		//---------------------------------------------------------------------------------------------------

	                                        </script>
									<?php }else{
									echo "FSD NOT SET PLESE DEFINE FSD IN FSD TABLE";
									}}?>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>


<script>
        
var input = document.getElementById("findclass");
                         input.addEventListener("keyup", function () {
                               var findclass = document.getElementById("findclass").value;
                  
      //alert(text_value);
               $.post("<?php echo site_url('index.php/configureClassControllers/findclass') ?>", {findclass : findclass}, function(data){
            $("#classfindDetail").html(data);
                //alert(data);
        });
         });</script>
        
          
        