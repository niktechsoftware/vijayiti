
		<br/><br/>
		<div class="row">
			<div class="col-md-12 space20">
				<div class="btn-group pull-right">
					<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
						Export <i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu dropdown-light pull-right">
						<li>
							<a href="#" class="export-excel" data-table="#sample-table-2" >
								Export to Excel
							</a>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		 <?php //$this->db->where('school_code',$this->session->userdata('school_code'));
		// $sende_Detail=$this->db->get('sms_setting')->row();
		?>
		<div>  <!--  <p class="alert alert-danger"> Available SMS Balance = <?php $cbs=checkBalSms($sende_Detail->uname,$sende_Detail->password);
		echo $cbs;?></p> -->
		 <!-- <p class="alert alert-info"> Note : This is the area you can send Fee reminder to send click send sms button . If you send SMS change to Success Message send SuccessfulLy . <br> -->
		</div>
	<?php if($cla == "all"){?>
		<div class="table-responsive">
		
			<table class="table table-striped table-hover" id="sample-table-2">
				<thead>
					<tr class = "success">
						<th>SNo</th>
						<th>Student id</th>
						<th>Student Name</th>
						<th>Father Mobile </th>
						<th>Father Name</th>
						<th>Paid Fee  Month</th>
						<th>Total Pay Amount</th>
						<th>Total Paid Amount</th>
						<th>Total Due Amount</th>
						<th>Full Detail</th>
						<th>Sms Send</th>
					</tr>
				</thead>
				<tbody>
				<?php

				$fsdval=$this->session->userdata('fsd');

$this->db->where('id',$fsdval);
$fsd_id=$this->db->get('fsd')->row();
$startdate=$fsd_id->finance_start_date;
$enddate=$fsd_id->finance_end_date;
 $tdate=(int)(date('m', strtotime($startdate)));

 $edate=(int)(date('m', strtotime($enddate)));

	$fsdate=$this->input->post("fsd");
    //$school_code = $this->session->userdata("school_code");
	//$this->db->where("school_code",$school_code);
	$class_id = $this->db->get("class_info")->result();
    foreach($class_id as $cid){
	//echo $cid->id;

	$this->db->where("status",1);
	$this->db->where("class_id",$cid->id);
	//$this->db->where("fsd",$fsdate);
	$student = $this->db->get("student_info");

	if($student->num_rows() > 0){
	$isData = $this->db->count_all("fee_deposit"); 
	if($isData > 0){
?>
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
					    "partition-purple"
				    );
				    $count = 1;
				    $tot=0.00;
				    $totalpaidp=0;
				    $totalduep=0;
				    $tilldatedue=0;
				    ?>
				
				<?php 
			
				    $rowcss = "danger";
				    $count = 1;
						$tot=0.00;
						$this->db->where("id",$fsd);
						$fdate =	$this->db->get("fsd")->row()->finance_start_date;

						$sum=0;

				    foreach($student->result() as $stuDetail):
				    	$stu_id = $stuDetail->id;
				    	$this->db->where("student_id",$stu_id);
				    	//$this->db->where("school_code",$school_code);
				    	$rows = $this->db->get("guardian_info")->row();
				    	if($this->input->post("fsd")==$this->session->userdata("fsd")){
				    		$total = $this->db->query("SELECT SUM(paid) as totalpaid, SUM(total) as totaldeposite,invoice_no from fee_deposit WHERE student_id = '$stu_id' AND finance_start_date='$fsd' AND school_code='$school_code'")->row(); 
							
							$rowcss = $count % 2 == 0 ? "danger" : "warning";
						?>
					<tr class="<?php echo $rowcss;?>">
			  		<td><?php echo $count;?></td>
			  				<td><strong><?php echo $stuDetail->username;?></strong>
			  			<td><?php echo $stuDetail->name;?>
			  			<input type = "hidden" id="sname<?php echo $count;?>" value="<?php echo $stuDetail->name;?>"/></td>
			  			<td><strong><?php if(strlen($stuDetail->mobile) > 1) {echo $stuDetail->mobile; }else echo "N/A"; ?>
                    </strong><input type = "hidden" id="mnum<?php echo $count;?>" value="<?php echo $stuDetail->mobile;?>"/></td>
                      
                          
                          <td><strong><?php if(strlen($rows->father_full_name) > 1) {echo $rows->father_full_name; }else echo "N/A"; ?><?php //echo $rows->father_full_name;
                          
                        ?></strong><input type = "hidden" id="fname<?php echo $count;?>" value="<?php echo $rows->father_full_name;?>"/></td></td>
                          
                          <td>
			  			
							<?php 
							
						
								//$this->db->where("school_code",$this->session->userdata("school_code"));
								$this->db->where("student_id",$stu_id);
								$this->db->where("fsd",$fsd);
								$fee_record = $this->db->get("deposite_months");
							
			               $i=0;
							foreach($fee_record->result() as $fd):
								?>
								<span class="label label-success" style="line-height:20px;">
								<?php 
							 if($fd->deposite_month<4){
								$realm=  $fd->deposite_month-4+12;
					 
							}else{
							 $realm= $fd->deposite_month-4;}
							//	$realm = $fd->deposite_month-4;
								echo date('M-Y', strtotime("$realm months", strtotime($fdate)));
								//echo date("d-M-y",strtotime("$rdt1"));?>
								 </span>
									
							<?php $i++; endforeach;  ?>
						</td>
					
					
			  			<td>
			  			<?php  
			  			$cd=0;
			  			if($this->input->post("fsd")){
			  				//$this->db->where("school_code",$this->session->userdata("school_code"));
								$this->db->where("student_id",$stu_id);
								$this->db->where("finance_start_date",$fsd);
							//	$this->db->where("status",1);
								$feedue = $this->db->get("fee_deposit");
								
								foreach($feedue->result() as $fd):?>
																
								<!-- <span class="label label-success" style="line-height:20px;">
								<?php //echo date("M-y",strtotime("$fd->diposit_date"));?> 
								 </span> -->
								<?php $cd=$cd+$fd->total;?>
							 <?php  endforeach; 
			  			   }
			  		  ?>
			  			<?php $totalduep += $cd; echo $cd;?>
							</td>
							<td>
							<?php  $totalpaidp += $total->totalpaid; echo $total->totalpaid;?>
						</td>
						<td>
							
							<?php 
					            	$depmonth=array();
					            	$mbk=0;
								 	$this->db->where('invoice_no',$total->invoice_no); 
								 	$this->db->where('student_id',$stu_id);
                                 	$mbalance=$this->db->get('feedue');
								 	//print_r($mbalance->mbalance);
								 	if($mbalance->num_rows()>0){
								 	if(strlen($mbalance->row()->mbalance)>0){
									echo	$mbk= "Previous Balance ".$mbalance->row()->mbalance."<br>";
									?>
									<input type = "hidden" id="amt1<?php echo $count;?>" value="<?php echo $mbalance->row()->mbalance;?>"/>
									<?php
									}
								 	    
								 	}
									$cdate = date("Y-m-d");
									$cmonth = date("Y-m",strtotime($cdate));
									//print_r($stu_id);
									$this->db->where("student_id",$stu_id);
									$dipom = $this->db->get("deposite_months");
									if($dipom->num_rows()>0){
										$g=0;	
											foreach($dipom->result() as $dip):
												$depmonth[$g]=$dip->deposite_month;
												//echo $depmonth[$g];
												$g++;
											endforeach;
												//print_r($depmonth);
        										$this->db->where_not_in("month_number",$depmonth);
        										//$this->db->where("school_code",$this->session->userdata("school_code"));
        										$fcd = 	$this->db->get("fee_card_detail");
        										if($fcd->num_rows()>0){
    											$rt=0;$month="";	
    											foreach($fcd->result() as $fcg):
    											if($fcg->month_number<$tdate){
    												$roldm=$fcg->month_number-$tdate+12;
    											}
    											else{
    												$roldm=$fcg->month_number-$tdate;
    											}
            									$oldm =  date('Y-m', strtotime("$roldm months", strtotime($fdate)));
            									if($oldm<=$cmonth){
            										$searchM[$rt]=$fcg->month_number;
            										echo $duedate= date("M-Y",strtotime($oldm));
            										$month =$month." and ".$duedate;
            									
            										$rt++;
						                      	}
							
									endforeach;
										?><input type = "hidden" id="rem<?php echo $count;?>" value="<?php echo $month;?>"/><?php
								if($rt>0){
								$searchM[$rt]=13;
									//$this->db->distinct();
								
									$this->db->select_sum("fee_head_amount");
									//if($school_code ==1){
										//$this->db->where("cat_id",3);}
									$this->db->where("fsd",$fsd);
									$this->db->where("class_id",$stuDetail->class_id);
									
								 $this->db->where_in("taken_month",$searchM);
								 
								 $fee_head = $this->db->get("class_fees");
								 if($fee_head->num_rows()>0){
									 $fee_head =$fee_head->row()->fee_head_amount;
									  $sum=$sum + ($fee_head * $rt);
								 echo "<br>".$fee_head * $rt;
										?><input type = "hidden" id="amt<?php echo $count;?>" value="<?php echo $fee_head * $rt;?>"/><?php
								 }else{
									 echo "fee Not found";								}
							 }
							}else{
								echo "Define Deposite Date in Configuration Fee section";
							}

							}else{
								//$this->db->where("school_code",$this->session->userdata("school_code"));
								$fcd = 	$this->db->get("fee_card_detail");
								$rt=0;
									$month="";
								foreach($fcd->result() as $fcg):
									if($fcg->month_number<$tdate){
										$roldm=$fcg->month_number-$tdate+12;
									}else{
									$roldm=$fcg->month_number-$tdate;
									}	$oldm =  date('Y-m', strtotime("$roldm months", strtotime($fdate)));
									if($oldm<=$cmonth){
										$searchM[$rt]=$fcg->month_number;
										echo $duedate = date("M-Y",strtotime($oldm));
							 	    $month =$month." and ".$duedate;
										$rt++;
								//	echo $fcg->month_number;
								//	echo $cmonth;
									
							}
								endforeach;
							?><input type = "hidden" id="rem<?php echo $count;?>" value="<?php echo $month;?>"/><?php
								$adable_amount=0;
						  	$searchM[$rt]=13;
								//$this->db->distinct();
								$this->db->select_sum("fee_head_amount");
								$this->db->where("fsd",$fsd);
								$this->db->where("class_id",$stuDetail->class_id);
							//	print_r($stuDetail->class_id);
							if($school_code ==1){$this->db->where("cat_id",3);}
							    $this->db->where_in("taken_month",$searchM);
								$fee_head = $this->db->get("class_fees");
								if($fee_head->num_rows()>0){

									$this->db->where("class_id",$stuDetail->class_id);
									//	print_r($stuDetail->class_id);
								
											$this->db->where_in("taken_month",13);
										$one_all_amount = $this->db->get("class_fees");
										$one_all_amount=$one_all_amount->row()->fee_head_amount;
									
										for($ui=0;$ui<$rt;$ui++){
											if($ui>0){
												$adable_amount =$one_all_amount+$adable_amount;
											}
										}
									$fee_head =$fee_head->row()->fee_head_amount+$adable_amount;
									$sum=$sum + $fee_head;
								echo "<br>".$fee_head;
							//print_r($searchM);
							   	?><input type = "hidden" id="amt<?php echo $count;?>" value="<?php echo $fee_head;?>"/><?php
								}else{
									echo "fee Not found";}
							}

							?>
						</td>
			  			<td>
							<a href="<?php echo base_url()?>index.php/feeControllers/feesDetail/<?php echo $stu_id;?>/<?php echo $fsd;?>" target="_blank" class="btn btn-blue">
								View Detail
							</a></td>
								<td>
							<button class="btn btn-yellow" id ="smstodew<?php echo $count;?>" >
								Send SMS
							</button></td>
							<script>
			  		
			  			$("#smstodew<?php echo $count;?>").click(function(){
			  				var smstodue = $("#rem<?php echo $count;?>").val();
			  				var sname = $("#sname<?php echo $count;?>").val();
			  				var fname = $("#fname<?php echo $count;?>").val();
			  				var mnum = $("#mnum<?php echo $count;?>").val();
							var amount = $("#amt<?php echo $count;?>").val();
							var amount1 = $("#amt1<?php echo $count;?>").val();
				// alert(amount1);
				// alert(amount);
					$.post("<?php echo site_url("index.php/feeControllers/feeRemSms") ?>",{smstodue : smstodue,sname : sname,fname : fname,mnum : mnum,amount : amount,amount1 : amount1}, function(data){
						$("#smstodew<?php echo $count;?>").html(data);
					});
				
				});
			  			</script>
			  			
			  		</tr>
			  		<?php  ?>
			  		<?php $count++; ?>
			  		<?php }else{
					
				} endforeach;?>
			
				<?php }else{?>

<br/><br/>
			<div class="alert alert-block alert-danger fade in">
				<button data-dismiss="alert" class="close" type="button">
					&times;
				</button>
				<h4 class="alert-heading"><i class="fa fa-times"></i> Error! <?php echo $student->num_rows();?></h4>
				<p>
					No record found from Fee database please submit fee first of this class &amp; section... 
				</p>
			</div>
		
<?php }}else{?>
	<br/><br/>
	<div class="alert alert-block alert-danger fade in">
		<button data-dismiss="alert" class="close" type="button">
			&times;
		</button>
		<h4 class="alert-heading"><i class="fa fa-times"></i> Error! <?php echo $student->num_rows();?></h4>
		<p>
			No record found from this class and section... 
		</p>
		<p>
			Make sure students are avaliable in this class section... :)
		</p>
	</div>

<?php }?>
	
	<?php 

}?>
	</tbody>
	<tfoot>
				    <tr>
				        <td></td>
				        <td>Total Due</td>
				        <td></td>
				        <td></td>
				        <td></td>
				        <td></td>
				        <td></td>
				        <td></td>
				        <td><?php echo $sum;?></td>
				    </tr>
				</tfoot>
			</table>
		</div>
	
		

	<?php }
	else{
	    
		$this->db->where("status",1);
	 	$this->db->where("class_id",$cla);
	 	$this->db->where("fsd",$this->session->userdata('fsd'));
	 	$student = $this->db->get("student_info");
        //print_r($student->row());exit;

        //$school_code = $this->session->userdata("school_code");
        // if($this->input->post("fsd")){
        //  if($student->num_rows() > 0){	
?>
<?php if($student->num_rows() > 0){
	$isData = $this->db->count_all("fee_deposit"); 
	if($isData > 0){
?>
		<div class="table-responsive">
		
			<table class="table table-striped table-hover" id="sample-table-2">
				<thead>
					<tr class = "success">
						<th>SNo</th>
						<th>Student Id</th>
						<th>Student Name</th>
						<th>Father Mobile </th>
						<th>Father Name</th>
						<th>Paid Fee  Month</th>
						<th>Total Pay Amount</th>
						<th>Total Paid Amount</th>
						<th>Total Due Amount</th>
						<th>Full Detail</th>
						<th>Sms Send</th>
					</tr>
				</thead>
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
					    "partition-purple"
				    );
				    $count = 1;
				    $tot=0.00;
				    $totalpaidp=0;
				    $totalduep=0;
				    $tilldatedue=0;
				    ?>
				<tbody>
				<?php 
				
				    $rowcss = "danger";
				    $count = 1;
						$tot=0.00;
						$this->db->where("id",$fsd);
						$fdate =	$this->db->get("fsd")->row()->finance_start_date;

						$sum=0;
								 //$x=0;

				    foreach($student->result() as $stuDetail):
				    	$stu_id = $stuDetail->s_no;
				    	$sfather=$stuDetail->enroll_num;
				    	//print_r($school_code);
				    	$this->db->where("student_id",$sfather);
				    	//$this->db->where("school_code",$school_code);
				    	$rows = $this->db->get("guardian_info")->row();
				    	if($this->input->post("fsd")==$this->session->userdata("fsd")){
				    		$total = $this->db->query("SELECT SUM(paid) as totalpaid, SUM(total) as totaldeposite,invoice_no from fee_deposit WHERE student_id = '$stu_id' AND finance_start_date='$fsd'")->row(); 
							$rowcss = $count % 2 == 0 ? "danger" : "warning";
						?>
					<tr class="<?php echo $rowcss;?>">
			  		<td><?php echo $count;?></td>
			  				<td><strong><?php echo $stuDetail->enroll_num;?></strong></td>
			  			<td><?php echo $stuDetail->name;?></td>
			  			<input type = "hidden" id="sname<?php echo $count;?>" value="<?php echo $stuDetail->name;?>"/>
			  			<td><strong><?php if(strlen($stuDetail->mobile) > 1) {echo $stuDetail->mobile; }else echo "N/A"; ?>
                    </strong><input type = "hidden" id="mnum<?php echo $count;?>" value="<?php echo $stuDetail->mobile;?>"/></td>
                      
                          
                          <td><strong><?php if(strlen($rows->father_full_name) > 1) {echo $rows->father_full_name; }else echo "N/A"; ?><?php //echo $rows->father_full_name;
                          
                        ?></strong><input type = "hidden" id="fname<?php echo $count;?>" value="<?php echo $rows->father_full_name;?>"/></td>
                          
                          <td>
			  			
							<?php 
							$fsdval=$this->session->userdata('fsd');

							$this->db->where('id',$fsdval);
							$fsd_id=$this->db->get('fsd')->row();
							$startdate=$fsd_id->finance_start_date;
							$enddate=$fsd_id->finance_end_date;
							 $tdate=(int)(date('m', strtotime($startdate)));

							 $endate=(int)(date('m', strtotime($enddate)));

						
								//$this->db->where("school_code",$this->session->userdata("school_code"));
								$this->db->where("student_id",$stu_id);
								$this->db->where("fsd",$fsd);
								$fee_record = $this->db->get("deposite_months");
							
			               $i=0;
							foreach($fee_record->result() as $fd):
								?>
								<span class="label label-success" style="line-height:20px;">
								<?php 
							 if($fd->deposite_month<$tdate){
								$realm=  $fd->deposite_month-$tdate+24;
					
							}else{
							 $realm= $fd->deposite_month-$tdate;
							}
							//	$realm = $fd->deposite_month-4;
								echo date('M-Y', strtotime("$realm months", strtotime($startdate)));
								//echo date("d-M-y",strtotime("$rdt1"));?>
								 </span>
									
							<?php $i++; endforeach;  ?>
						</td>
					
					
			  			<td>
			  			<?php  
			  			$cd=0;
			  			if($this->input->post("fsd")){
			  				//$this->db->where("school_code",$this->session->userdata("school_code"));
								$this->db->where("student_id",$stu_id);
								$this->db->where("finance_start_date",$fsd);
							//	$this->db->where("status",1);
								$feedue = $this->db->get("fee_deposit");
								
								foreach($feedue->result() as $fd):?>
																
								<!-- <span class="label label-success" style="line-height:20px;">
								<?php //echo date("M-y",strtotime("$fd->diposit_date"));?> 
								 </span> -->
								<?php $cd=$cd+$fd->total;?>
							 <?php  endforeach; 
			  			   }
			  		  ?>
			  			<?php $totalduep += $cd; echo $cd;?>
							</td>
							<td>
							<?php  $totalpaidp += $total->totalpaid; echo $total->totalpaid;?>
						</td>
						<td>
							
							<?php 
							
            						$depmonth=array();
            						$mbk=0;
								 	$this->db->where('invoice_no',$total->invoice_no); 
								 	$this->db->where('student_id',$stu_id);
								 	 $this->db->order_by('id',"desc")->limit(1);
                                  	$mbalance=$this->db->get('feedue');
                                  	// $mbalance = $this->db->query("SELECT * FROM feedue where invoice_no='$total->invoice_no' AND student_id='$stu_id'  ORDER BY id DESC LIMIT 1");
                                  	//print_r($mbalance);exit;

								 	//print_r($mbalance->mbalance);
								 	if($mbalance->num_rows()>0){
								 	if(strlen($mbalance->row()->mbalance) > 0){
								 	    $db=$mbalance->row()->mbalance;
									echo $mbk= "Previous Balance ".$db."<br>";
										?><input type = "hidden" id="amt1<?php echo $count;?>" value="<?php echo $mbalance->row()->mbalance;?>"/><?php
									}}
									$cdate = date("Y-m-d");
									$cmonth = date("Y-m",strtotime($cdate));
									//print_r($stu_id);
									$this->db->where("student_id",$stu_id);
									$dipom = $this->db->get("deposite_months");
									if($dipom->num_rows()>0){
										$g=0;	
    									foreach($dipom->result() as $dip):
    										$depmonth[$g]=$dip->deposite_month;
    									//	echo $depmonth[$g];
    										$g++;	
    									
    									endforeach;
    										//print_r($depmonth);
										$this->db->where_not_in("month_number",$depmonth);
										//$this->db->where("school_code",$this->session->userdata("school_code"));
										$fcd = 	$this->db->get("fee_card_detail");
										if($fcd->num_rows()>0){
							
										$searchM[]=0;	$rt=0;$month="";	
											foreach($fcd->result() as $fcg):
											if($fcg->month_number<$tdate){
												$roldm=$fcg->month_number-$tdate+24;
											}
											else{
												$roldm=$fcg->month_number-$tdate;
											}
									$oldm =  date('Y-m', strtotime("$roldm months", strtotime($fdate)));
									if($oldm<=$cmonth){
										$searchM[$rt]=$fcg->month_number;
										echo $duedate= date("M-Y",strtotime($oldm));
										$month =$month." and ".$duedate;
									
										$rt++;
										// $rt;
								//	echo $cmonth;
							}
							//echo $rt;
									endforeach;
										?><input type = "hidden" id="rem<?php echo $count;?>" value="<?php echo $month;?>"/><?php
								if($rt>0){
								$searchM[$rt]=13;
									//$this->db->distinct();
								
									$this->db->select_sum("fee_head_amount");
									//if($school_code ==1){
										//$this->db->where("cat_id",3);}
									$this->db->where("fsd",$fsd);
									$this->db->where("class_id",$stuDetail->class_id);
									
								 $this->db->where_in("taken_month",$searchM);
								 $fee_head = $this->db->get("class_fees");
								 
								 if($fee_head->num_rows()>0){
									 $fee_head =$fee_head->row()->fee_head_amount;
								 $sum=$sum + ($fee_head * $rt);
									 
								 echo "<br>".($fee_head * $rt);
										?><input type = "hidden" id="amt<?php echo $count;?>" value="<?php echo $fee_head * $rt;?>"/><?php
								 }else{
									 echo "fee Not found";								}
							 }
							}else{
								echo "Define Deposite Date in Configuration Fee section";
							}

							}else{
								//$this->db->where("school_code",$this->session->userdata("school_code"));
								$fcd = 	$this->db->get("fee_card_detail");
								$rt=0;
									$month="";
								foreach($fcd->result() as $fcg):
									if($fcg->month_number<$tdate){
										$roldm=$fcg->month_number-$tdate+24;
									}else{
									$roldm=$fcg->month_number-$tdate;
									}	$oldm =  date('Y-m', strtotime("$roldm months", strtotime($fdate)));
									if($oldm<=$cmonth){
										$searchM[$rt]=$fcg->month_number;
										echo $duedate = date("M-Y",strtotime($oldm));
							 	    $month =$month." and ".$duedate;
										$rt++;
								//	echo $fcg->month_number;
								//	echo $cmonth;
									
							}
								endforeach;
							?><input type = "hidden" id="rem<?php echo $count;?>" value="<?php echo $month;?>"/><?php
								$adable_amount=0;
						  	$searchM[$rt]=13;
								//$this->db->distinct();
								$this->db->select_sum("fee_head_amount");
								$this->db->where("fsd",$fsd);
								$this->db->where("class_id",$stuDetail->class_id);
							//	print_r($stuDetail->class_id);
							//if($school_code ==1){$this->db->where("cat_id",3);}
							    $this->db->where_in("taken_month",$searchM);
								$fee_head = $this->db->get("class_fees");
								if($fee_head->num_rows()>0){

									$this->db->where("class_id",$stuDetail->class_id);
									//	print_r($stuDetail->class_id);
								
											$this->db->where_in("taken_month",13);
										$one_all_amount = $this->db->get("class_fees");
										$one_all_amount=$one_all_amount->row()->fee_head_amount;
									
										for($ui=0;$ui<$rt;$ui++){
											if($ui>0){
												$adable_amount =$one_all_amount+$adable_amount;
											}
										}
									$fee_head =$fee_head->row()->fee_head_amount+$adable_amount;
									//$sum=$sum+$fee_head;
									$sum=$sum + $fee_head;
								echo "<br>".$fee_head;
							//print_r($searchM);
							   	?><input type = "hidden" id="amt<?php echo $count;?>" value="<?php echo $fee_head;?>"/><?php
								}else{
									echo "fee Not found";}
							}

							?>
						</td>
			  			<td>
							<a href="<?php echo base_url()?>index.php/feeControllers/feesDetail/<?php echo $stu_id;?>/<?php echo $fsd;?>" target="_blank" class="btn btn-blue">
								View Detail
							</a></td>
								<td>
							<button class="btn btn-yellow" id ="smstodew<?php echo $count;?>" >
								Send SMS
							</button></td>
							<script>
			  		
			  			$("#smstodew<?php echo $count;?>").click(function(){
			  				var smstodue = $("#rem<?php echo $count;?>").val();
			  				var sname = $("#sname<?php echo $count;?>").val();
			  				var fname = $("#fname<?php echo $count;?>").val();
			  				var mnum = $("#mnum<?php echo $count;?>").val();
							var amount = $("#amt<?php echo $count;?>").val();
							var amount1 = $("#amt1<?php echo $count;?>").val();
				// alert(amount);
				// alert(amount1);
					$.post("<?php echo site_url("index.php/feeControllers/feeRemSms") ?>",{smstodue : smstodue,sname : sname,fname : fname,mnum : mnum,amount : amount,amount1 : amount1}, function(data){
						$("#smstodew<?php echo $count;?>").html(data);
					});
				
				});
			  			</script>
			  			
			  		</tr>
			  		<?php  ?>
			  		<?php $count++; ?>
			  		<?php  }else{
	
} endforeach;?>
				</tbody>
				<tfoot>
				    <tr>
				        <td></td>
				        <td>Total Due</td>
				        <td></td>
				        <td></td>
				        <td></td>
				        <td></td>
				        <td></td>
				        <td></td>
				        <td><?php echo $sum;?></td>
				    </tr>
				</tfoot>
			</table>
		</div>
	
		
<?php }else{?>

<br/><br/>
			<div class="alert alert-block alert-danger fade in">
				<button data-dismiss="alert" class="close" type="button">
					&times;
				</button>
				<h4 class="alert-heading"><i class="fa fa-times"></i> Error! <?php echo $student->num_rows();?></h4>
				<p>
					No record found from Fee database please submit fee first of this class &amp; section... 
				</p>
			</div>
		
<?php }}else{?>
	<br/><br/>
	<div class="alert alert-block alert-danger fade in">
		<button data-dismiss="alert" class="close" type="button">
			&times;
		</button>
		<h4 class="alert-heading"><i class="fa fa-times"></i> Error! <?php echo $student->num_rows();?></h4>
		<p>
			No record found from this class and section... 
		</p>
		<p>
			Make sure students are avaliable in this class section... :)
		</p>
	</div>

<?php }}?>


<script>
	TableExport.init();
	
</script>