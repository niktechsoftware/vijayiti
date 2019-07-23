<?php
class feeControllers extends CI_Controller{
	function checkID1(){
		$studID=$this->input->post("teacherid");
		$myString=$this->input->post("fsd");
		if(strlen($myString) > 0){
			$myArray = explode(',', $myString);
			$fsd = $myArray[0];
			$month = $myArray[1];
			
			$this->load->model("feeModel");
			$var=$this->feeModel->getStudData($studID);
			
			
			$data['month'] = $month;
			$data['fsd'] = $fsd;
			$data['var'] = $var;
		
			$this->load->view("ajax/feeDetail",$data);
		}
		else{
			?>
				<div class="alert alert-block alert-danger fade in">
					<button data-dismiss="alert" class="close" type="button">
						&times;
					</button>
					<p>
						Please select Finance Start Date for further fee collect proccess.... :)
					</p>
				</div>
			<?php
		}
	}

	 function checkID(){
		$studID=$this->input->post("studid");
		$fsd=$this->input->post("fsd");
            $this->load->model("feemodel");
            $var=$this->feemodel->getStudData($studID);
           if( $var->num_rows()>0){
           	redirect("login/collectFee/$studID/$fsd");
		}else{
			redirect("login/collectFee/feeFalse");
		}
	}
	
	function getFsd1(){
		
		$studid=$this->input->post("teacherid");
		
				$this->db->select("finance_start_date as fsd");
				$fsd1 = $this->db->get("general_settings")->row()->fsd;
				$count = 0;
				$studID = $this->input->post("teacherid");
				$detail = $this->db->query("SELECT SUM(diposit_month) as month,finance_start_date FROM `fee_deposit` WHERE student_id='$studID' GROUP BY finance_start_date");
				if($detail->num_rows() > 0){
					?>
								<div class="form-group">
				                      <label for="inputStandard" class="col-lg-4 control-label">
				                      		Select FSD <span style="color:#F00">*</span>
				                      </label>
				                      <div class="col-lg-7">
				                      		<select id="fsd12" class="form-control">
				                      			<option value="">-select FSD-</option>
                      			<?php foreach($detail->result() as $row):?>
	                      			<?php if($row->month<24)
	                      			{?><option value="<?php echo $row->finance_start_date.",$row->month"; ?>">
	                      			<?php echo date("d-M-y", strtotime($row->finance_start_date)); 
	                      			$count++;
	                      			}else{ if($row->month==24){}?>
	                      		<?php }  ?>
	                      			
	                      		<?php  ?>
                      			<?php endforeach;?>
                      			<?php if($count == 0): ?>
                      					<option value="<?php echo $fsd1.",0"; ?>">
	                      					<?php echo date("d-M-y", strtotime($fsd1));?>
	                      				</option>
	                      		<?php endif; ?>
				                      		</select>
				                      </div>
				                      <script>
				                      $("#fsd12").change(function(){
				      					var teacherid = $("#studid").val();
				      					var fsd = $("#fsd12").val();
				      					//alert(teacherid+" -> "+fsd);
				      					//alert(teacherid)checkID,validId;
					      					if(fsd != ""){
					      						$('#studid').prop('disabled',true);
						      					$.post("<?php echo site_url("index.php/feeControllers/checkID") ?>",{teacherid : teacherid, fsd : fsd}, function(data){
						      						$("#validId").html(data);
						      						});
						                      }
						                      else{
						                    	  $('#studid').prop('disabled',false);
						                    	  $.post("<?php echo site_url("index.php/feeControllers/checkID") ?>",{teacherid : teacherid, fsd : fsd}, function(data){
							      						$("#validId").html(data);
							      						});
						                      }
				    					});
				                      </script>
				                </div>
							<?php
						}
						else{
							$this->load->model("feeModel");
							$var=$this->feeModel->getStudData($studID);
								if($var->num_rows()>0):
									$this->db->select("finance_start_date as fsd");
									$fsd = $this->db->get("general_settings")->row()->fsd;
									?>
										<input type="hidden" value="<?php echo $fsd.",0"; ?>" id="fsd12" />
										<button class="btn btn-info btn-squared btn-lg" id="fee">
				                        	Proceed for Fee <i class="fa fa-arrow-circle-right"></i>
				                        </button>
				                        <script>
					                      $("#fee").click(function(){
					                     
					      					var teacherid = $("#studid").val();
					      					var fsd = $("#fsd12").val();
					      					//alert(teacherid+" -> "+fsd);
					      					//alert(teacherid)checkID,validId;
					      					$.post("<?php echo site_url("index.php/feeControllers/checkID") ?>",{teacherid : teacherid, fsd : fsd}, function(data){
					      						$("#validId").html(data);
					      						});
					      					});
				                      </script>
									<?php
								else:
								?>
									<div class="alert alert-block alert-danger fade in">
										<button data-dismiss="alert" class="close" type="button">
											&times;
										</button>
										<h4 class="alert-heading"><i class="fa fa-times"></i> Error!</h4>
										<p>
											This student id <b><?php echo $studID;?></b> is not avaliable in database try another.....
										</p>
									</div>
								<?php
								endif;
						}
				
	}

	function getFsd(){
		//$school_code=$this->session->userdata('school_code');
		//$this->db->where('school_code',$school_code);
		$fsd1 = $this->db->get("general_settings")->row()->fsd_id;
		//echo $fsd1;
		$stud_id=$this->input->post("studentid");
		//print_r($this->session->userdata('fsd'));
		$this->db->where('fsd',$fsd1);
		$this->db->where("enroll_num",$stud_id);
		$check = $this->db->get("student_info");
		if($check->num_rows() > 0)
		{
				$this->db->where('id',$fsd1); 
				$start_date=$this->db->get('fsd')->row()->finance_start_date;
							?>	<div class="form-group">
				                      <label for="inputStandard" class="col-lg-3 control-label">
				                      		Select FSD <span style="color:#F00">*</span>
				                      </label>
				                      <div class="col-lg-5">
				                      		<select id="fsd12" name="fsd" class="form-control">
				                      			<option value="<?php echo $fsd1 ?>"><?php echo $start_date ?></option>
								            </select>
									   </div>
									   <div class="col-sm-4" id="subbox">
										 <button  class="btn btn-dark-green">Get Record <i class="fa fa-arrow-circle-right"></i></button>
									</div>
								</div>
	<?php	}else{?>
			<div class="alert alert-block alert-danger fade in">
				<button data-dismiss="alert" class="close" type="button">
					&times;
				</button>
				<h4 class="alert-heading"><i class="fa fa-times"></i> Error!</h4>
				<p>
					This student id <b><?php echo $stud_id;?></b> is not avaliable in database try another.....
				</p>
			</div><?php
		}
	}

	function payFee(){
	    
		$school_code = $this->session->userdata("school_code");
		$fsddate=$this->input->post('fsdid');
// 		print_r($fsddate);
// 		exit;
		// Calculate naxt month start	
		$feecat = $this->input->post("feecat");
		//invoice number logic start
		//$this->db->where("school_code",$school_code);
		$invoice = $this->db->count_all("invoice_serial");
		$invoice1=6000+$invoice;
		$invoice_number ="I".$invoice1;
		$invoiceDetail = array(
				"invoice_no" => $invoice_number,
				"reason" => "Fee Deposit",
				"invoice_date" => $this->input->post("subdate"),
				//"school_code"=>$school_code
		);
		$this->db->insert("invoice_serial",$invoiceDetail);
		
		$months = $this->input->post("diposit_month");
		
		//echo "<pre>";
		//print_r($this->session->all_userdata());
		//echo "</pre>";
		
		$this->load->model("studentModel");
		$student = $this->studentModel->getStudentDetail($this->input->post('stuId'))->row();
		
		$cmnum=0;
		foreach($months as $g):
	
		$cmnum++;
		endforeach;
		
		$updata['student_id']=$this->input->post('stuId');
		$updata['late']=$this->input->post("latefee");
		//$updata['discount']=$this->input->post("discountv");
		//$updata['transport']=$this->input->post("transport_fee");
		$updata['deposite_month ']=	$cmnum;
		$updata['feecat']=$feecat;
		$updata['description']=$this->input->post("disc");
		$updata['previous_balance']=$this->input->post("pb");
		//$updata['discounter_id']=$this->input->post("discounterID");
		$updata['total']=$this->input->post("total1");
		$updata['paid']=$this->input->post("paid");
		//$updata['current_balance']=$this->input->post("cb");
		$updata['diposit_date']=$this->input->post("subdate");
		//$updata['status']="paid";
		$updata['payment_mode']=$this->input->post("payment_mode");
		$updata['invoice_no']=$invoice_number;
		//$updata['school_code']=$school_code;
		$updata['finance_start_date']=$fsddate;


//echo $this->input->post('fsdid');
//exit;//start 
		$stuid=$this->input->post('stuId');
		//insert data in feedue table
		$mdata['student_id']=$this->input->post('stuId');
		$mdata['description']=$this->input->post("disc");
		$mdata['mbalance']=$this->input->post("cb");
		$mdata['depositedate']=$this->input->post("subdate");
		$mdata['invoice_no']=$invoice_number;
		//$mdata['school_code']=$school_code;
		
		$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row();
		$balance = $op1->closing_balance;
		$close1 = $balance + $this->input->post("paid");
		$dayBook = array(
				"paid_to" =>$this->session->userdata("username"),
				"paid_by" =>$this->input->post("stuId"),
				"reason" => "Fee Deposit",
				"dabit_cradit" => "1",
				"amount" => $this->input->post("paid"),
				"closing_balance" => $close1,
				"pay_date" => date("Y-m-d H:s:i"),
				"pay_mode" => $this->input->post("payment_mode"),
				"invoice_no" => $invoice_number,
				//"school_code"=>$school_code
		);
		
		$otptable=array(
			"invoice_number"=>$invoice_number
			);
		$this->db->where('otp',$this->input->post("discounterOTPv"));
                      //$this->db->where('school_code',$school_code);
					  $this->db->update("dis_den_tab",$otptable);
					  $this->db->where("s_no",$this->input->post("stuId"));
					$studd=  $this->db->get("student_info")->row();
				
		$discountv = array(
			"discount_rupee"=>  $this->input->post("discount_start"),
			//"discounter_id"=>$studd->discount_id,
			"invoice_number"=>$invoice_number,
			"otp"=>5,
			"generate_date"=>date("Y-m-d"),
			//"school_code"=>$school_code
		);	
		$mbalance = array(
			"mbalance"=>$this->input->post("cb"),
			"description"=>$this->input->post("disc"),
			//"depositedate"=>date('y-m-d'),
			"updatedate"=>date('y-m-d'),
			);
			//$this->db->where("student_id",$this->input->post("stuId"));
			$this->db->where("invoice_no",$invoice_number);
			//$this->db->where("school_code",$school_code);
		   $this->db->update("feedue",$mbalance);
		$this->db->insert("dis_den_tab",$discountv);
		if( $this->db->insert('day_book',$dayBook) && $this->db->insert("fee_deposit",$updata) && $this->db->insert("feedue",$mdata)){
			foreach($months as $g):
				

                      
		    $fee_deposite_m = array(
		    "student_id"=>$this->input->post('stuId'),
		    "deposite_month"=>$g,
		    "invoice_no"=>$invoice_number,
		    "fsd"=>$this->input->post("fsdid")
		    );
		    $this->db->where("student_id",$this->input->post("stuId"));
		    $this->db->where("deposite_month",$g);
		   $checkdeposite= $this->db->get("deposite_months");
		   if($checkdeposite->num_rows()>0){
		       $checkdeposite = $checkdeposite->row();
		       $this->db->where("id",$checkdeposite ->id);
		$this->db->update("deposite_months",$fee_deposite_m);
		   }else{
		       $this->db->insert("deposite_months",$fee_deposite_m);
		   }
		endforeach;
		//---------------------------------------------- Opening Colsing Balance Start -----------------------------------------
		$bal = array(
				"closing_balance" => $close1
		);
		//$this->db->where("school_code",$school_code);
		$this->db->where("opening_date",date('Y-m-d'));
		$this->db->update("opening_closing_balance",$bal);
		//---------------------------------------------- Opening Colsing Balance End -------------------------------------------
			
		
		//---------------------------------------------- CHECK SMS SETTINGS -----------------------------------------
		$totfee = $this->input->post("total1");
		$paid = $this->input->post("paid");
		$current_balance = $this->input->post("cb");
		//$this->load->model("smsmodel");
		//$sender = $this->smsmodel->getsmssender($school_code);
		//$sende_Detail =$sender;
		//$isSMS = $this->smsmodel->getsmsseting($school_code);
		 //$sende_Detail1=$sende_Detail->row();
			  			
		//---------------------------------------------- END CHECK SMS SETTINGS -----------------------------------------
		//if($isSMS->fee_submit){
		
			//echo $student->student_id.'sss';
			//$this->db->where("school_code",$school_code);
			$this->db->where("student_id",$student->enroll_num);
			$var=$this->db->get("guardian_info")->row();
			$fmobile=$student->mobile;
			
		//get fee details
	         	$this->db->where("invoice_no",$invoice_number);
                    	//$this->db->where("school_code",$this->session->userdata("school_code"));
					$rty = 	$this->db->get("deposite_months");
					$monthmk=array();
					$this->db->where('id',$fsddate);
					$fsd1=$this->db->get('fsd')->row();
					$demont = $rty->num_rows();
                   $i=0;$printMonth=""; foreach($rty->result() as $tyu):
                        $ffffu= $tyu->deposite_month-4;
					
						$printMonth= $printMonth."".date('M-Y', strtotime("$ffffu months", strtotime($fsd1->finance_start_date))).", ";
						$monthmk[$i]=$tyu->deposite_month;
                    	//echo date("d-M-y", $rdt);
					$i++; endforeach;	
			//end get fee details
			
			
			$stuname=$student->name;
			//$msg = "Dear Parent your child ".$stuname.",Fee of Month ".$printMonth.",is deposited of Rs.".$paid."/-with due balance Rs.".$current_balance."/-.For more info visit: ".$sende_Detail1->web_url;
		//echo $msg;exit;
			//sms($fmobile,$msg,$sende_Detail1->uname,$sende_Detail1->password,$sende_Detail1->sender_id);
			// $this->db->where("id",$school_code);
		    // $admin_mobile = $this->db->get('school')->row();
		    // if($admin_mobile->id==1){
			// $msg1 = "Dear School Manager your Student ".$stuname.",Fee of Month ".$printMonth.",is deposited of Rs.".$paid."/-with due balance Rs.".$current_balance."/-.For more info visit: ".$sende_Detail1->web_url;
			// //sms($admin_mobile->mobile_no,$msg1,$sende_Detail1->uname,$sende_Detail1->password,$sende_Detail1->sender_id);
			// 	$msg2 = "Dear School Principle your Student ".$stuname.",Fee of Month ".$printMonth.",is deposited of Rs.".$paid."/-with due balance Rs.".$current_balance."/-.For more info visit: ".$sende_Detail1->web_url;
			// //sms(7398863503,$msg2,$sende_Detail1->uname,$sende_Detail1->password,$sende_Detail1->sender_id);
		    // }
			//$this->db->where("school_code",$school_code);
			$this->db->where("student_id",$this->input->post('stuId'));
			$this->db->where("invoice_no",$invoice_number);
		    $mode = $this->db->get('fee_deposit')->row()->payment_mode;
		    //print_r($mode);exit;
			if($mode==1){
			redirect("index.php/invoiceController/fee/$invoice_number/$stuid/$fsddate/yes");
			}
			elseif($mode==2){
				$amt_paid=$this->input->post('paid');
				// exit;
				redirect("index.php/paytm/pgRedirect/$invoice_number/$stuid/$fsddate/$amt_paid/2/");
				}
	//	}
		else{
			//$this->db->where("school_code",$school_code);
			$this->db->where("student_id",$this->input->post('stuId'));
			$this->db->where("invoice_no",$invoice_number);
		    $mode = $this->db->get('fee_deposit')->row()->payment_mode;
		    //print_r($mode);exit;
			if($mode==1){
			redirect("index.php/invoiceController/fee/$invoice_number/$stuid/$fsddate/");
			}
			elseif($mode==2){
				$amt_paid=$this->input->post('paid');
				// exit;
				redirect("index.php/paytm/pgRedirect/$invoice_number/$stuid/$fsddate/$amt_paid/2/");
				}
		}
		}else{
		redirect("login/collectFee/feeFalse");
	
		}
			
	}
	
	
	
	function payFee1(){
		$v12=0.00;
		// Calculate naxt month start	
		$oneTime = $this->input->post("one_time");
		$studentId = $this->input->post("stuId");
		
		$diposit_month = sizeof($this->input->post("diposit_month"));
		$month = $this->input->post("month");
		$fsd = $this->input->post("fsd");
		$totalMonth = $diposit_month + $month;
		$till_date = date("Y-m-d",strtotime("$fsd + $totalMonth month"));
		//echo $till_date;
		// Calculate naxt month end
		
		//invoice number logic start
			$invoice = $this->db->count_all("invoice_serial");
			$invoice_number = $invoice + 1000;
			$invoiceDetail = array(
					"invoice_no" => $invoice_number,
					"reason" => "Fee Deposit",
					"invoice_date" => date("Y-m-d")
			);
			$this->db->insert("invoice_serial",$invoiceDetail);
		//invoice number logic end
		
		// Fee detail insert Start	
		$fields = $this->db->list_fields('fee_shedule');
		foreach($fields as $field):
			if($field != "id" && $field != "student_id"):
				$fee["$field"] = $_POST["$field"];
			endif;
		endforeach;
		$stock_balenc = $this->db->query("SELECT Total_Admission_Fee,Paid_Admission_Fee,id FROM one_time_fee WHERE student_id='$studentId'");
		if($stock_balenc->num_rows() > 0){       
		$admin_bal = $stock_balenc->row();
		$paid1 = $admin_bal->Paid_Admission_Fee;
		
		
		$id1 = $this->input->post("stockId");
		$v12 = $this->input->post("previous_stock_balance");
		
		$actualremain = $paid1+$v12;
		
		
		$arr = array(
				'Paid_Admission_Fee' => $actualremain,
				'id' =>$this->input->post("stockId")
		);
		
		$this->db->where("id",$id1);
		$this->db->update("one_time_fee",$arr);
		
	}
	
		
		
		$fee["student_id"] = $this->input->post("stuId");
		$fee["payment_mode"] = $this->input->post("payment_mode");
		$fee["other_fee_reason"] = $this->input->post("other_fee_reason");
		$fee["previous_balance"] = $this->input->post("pb");
		
		$fee["total"] = $this->input->post("total");
		$fee["paid"] = $this->input->post("paid");
		$fee["current_balance"] = $this->input->post("cb");
		$fee["sub_total"] = $this->input->post("sub_total");
		$fee["diposit_month"] = $diposit_month;
		$fee["diposit_date"] = date('Y-m-d');
		$fee['till_diposit'] = $till_date;
		
		$fee['invoice_no'] = $invoice_number;
		$fee['finance_start_date'] = $fsd;
		$this->db->insert("fee_deposit",$fee);
		// Fee detail insert Start
		
		if($this->input->post("one_time")){
		// Fee Schudling fee start
		$feeSehedule["student_id"] = $this->input->post("stuId");
		foreach($fields as $field):
			if($field != "id" && $field != "student_id"):
				$feeSehedule["$field"] = $_POST["$field"];
	        endif;
        endforeach;
        
        $this->db->where("student_id",$studentId);
        $isStudent = $this->db->get("fee_shedule")->num_rows();
        
	        if($isStudent > 0){
	        	$this->db->where("student_id",$studentId);
	        	$this->db->update("fee_shedule",$feeSehedule);
	        }else{
	        	$this->db->insert("fee_shedule",$feeSehedule);
	        }
		//  Fee Schudling End
		
        //one_time_fee fee code Start
        $fields1 = $this->db->list_fields('one_time_fee');
        $oneTimeFee["student_id"] = $this->input->post("stuId");
        $oneTimeFee["diposit_date"] = date("Y-m-d");
        if(isset($_POST["one_time"])){
        	foreach($fields1 as $field):
        	if($field != "id" && $field != "student_id" && $field != "diposit_date"):
        	$oneTimeFee["$field"] = $_POST["$field"];
        	endif;
        	endforeach;
        }
	       $this->db->insert("one_time_fee",$oneTimeFee);
	       $this->db->where("enroll_num",$this->input->post("stuId"));
	       $val123 = $this->db->get("student_info")->row();
	       $data12=array(
	       		'student_id'=>$this->input->post("stuId"),
	       'student_name'	=>$val123->name,
	       'total_due'=>$this->input->post("Total_Admission_Fee")-$this->input->post("Paid_Admission_Fee"),
	       'paid'=>$this->input->post("Paid_Admission_Fee"),
	       'remain'=>$this->input->post("Total_Admission_Fee")-$this->input->post("Paid_Admission_Fee"),
	       'description'=>"first Time Entered By Appril Month fee",
	       'ddate'=>date("Y-m-d"),
	       'invoice_no'=>$invoice_number,
	       );
	       $this->db->insert("feedue",$data12);
        //one_time_fee fee code end
		} // End onetime fee condition
		
//-----------------------------------------------------------------------------------------------
		
		// Fee bank Detail  code
		if($this->input->post("dipositorName1")){
			$dipositerName = $_POST["dipositorName1"];
		}
		elseif($this->input->post("dipositorName2")){
			$dipositerName = $_POST["dipositorName2"];
		}
		elseif($this->input->post("dipositorName3")){
			$dipositerName = $_POST["dipositorName3"];
		}
		else{
			$dipositerName = $_POST["dipositorName"];
		}
		//echo $dipositerName."Pushpendra tum topa ho...";
		
		
		if($this->input->post("transactionNumber")){
			$transactionNumber = $_POST["transactionNumber"];
		}
		else{
			$transactionNumber = $_POST["transactionNumber1"];
		}
		

		if(isset($_POST["diposit_date1"])){
			$diposit_date = $_POST["diposit_date1"];
		}
		else if(isset($_POST["diposit_date2"])){
			$diposit_date = $_POST["diposit_date2"];
		}
		else{
			$diposit_date = date("Y-m-d");
		}
		$bank_detail = array(
			"student_id" => $this->input->post("stuId"),
			"school_ac" => $this->input->post("schoolAC"),
			"depositor_name" => $dipositerName,
			"fee_amount" => $this->input->post("paid"),
			"cheque_bank" => $this->input->post("chequebank"),
			"cheque_number" => $this->input->post("chequeNumber"),
			"challan_number" => $this->input->post("challanNumber"),
			"deposit_date" => $diposit_date,
			"transaction_no" => $transactionNumber,
			"invoice_no" => $invoice_number
		);
		// end Fee bank detail code
		$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row();
		$balance = $op1->closing_balance;
		$close1 = $balance + $this->input->post("paid");
		$dayBook = array(
				"paid_to" =>$this->input->post("stuId"),
				"paid_by" =>$this->session->userdata("username"),
				"reason" => "Fee Deposit",
				"dabit_cradit" => "Credit",
				"amount" => $this->input->post("paid"),
				"closing_balance" => $close1,
				"pay_date" => date('Y-m-d'),
				"pay_mode" => $this->input->post("payment_mode"),
				"invoice_no" => $invoice_number
		);
				
		if($this->db->insert("fee_bank_detail",$bank_detail) && $this->db->insert('day_book',$dayBook)):
		
			//---------------------------------------------- Opening Colsing Balance Start -----------------------------------------
			$bal = array(
					"closing_balance" => $close1
			);
			$this->db->where("opening_date",date('Y-m-d'));
			$this->db->update("opening_closing_balance",$bal);
		
			$this->db->where("opening_date",date('Y-m-d'));
			$this->db->update("opening_closing_balance",$bal);
			//---------------------------------------------- Opening Colsing Balance End -------------------------------------------
			
			$psbd = array(
					"balance" => "0.00"
			);
			
			$this->db->where("sno",$this->input->post("stockId"));
			$this->db->update("sale_info",$psbd);
			
			//---------------------------------------------- CHECK SMS SETTINGS -----------------------------------------
			$totfee = $this->input->post("total");
			$paid = $this->input->post("paid");
			$current_balance = $this->input->post("cb");
			
			$isSMS = $this->db->get("sms")->row()->fee_submit;
			
			//---------------------------------------------- END CHECK SMS SETTINGS -----------------------------------------
			if($isSMS == 'yes'){
				$this->db->where("enroll_num",$this->input->post("stuId"));
				$stu1=$this->db->get("student_info");
				if($stu1->num_rows>0)
				{
				$stu = $stu1->row();
				$stuname=$stu->name;
				$mobile = $stu->mobile;
				
				$msg = "Dear ".$stuname.",Fee of Month ".date("M",strtotime("$till_date - 1 month")).",is diposited of Rs.".$paid."/-with balance Rs.".$current_balance."/-.For more Contact Ramdoot ITI";
				sms($mobile,$msg);
				}
				redirect(base_url()."invoiceController/fee/$invoice_number/$studentId/$oneTime/yes");
			}
			else{
				redirect(base_url()."invoiceController/fee/$invoice_number/$studentId/$oneTime");
			}
		else:
			redirect("base_url().login/collectFee/feeFalse");
		endif;
	}
	function transReport(){
		$data['fsd'] = $this->input->post("fsd");
		$data['cla'] = $this->input->post("classv");
		$data['sec'] = $this->input->post("section");
		$this->load->view("ajax/transport",$data);
	}
	function feeReport(){
		//$data['fsd'] = $this->db->get("general_setting");
		$fsd = $this->input->post("fsd");
		$data['fsd']=$fsd;
		$classv = $this->input->post("classv");
		$section1 = $this->input->post("section");

		if($classv == "all" && $section1 == "all"){
		$this->db->where("status","Active");
		$this->db->where("fsd",$fsd);
		$data['student'] = $this->db->get("student_info");
		}else{
			if($classv != "all" && $section1 == "all"){
		$this->db->where("status","Active");
		$this->db->where("fsd",$fsd);
		$this->db->where("trade",$classv);
		$data['student'] = $this->db->get("student_info");
			}else{
	
		$this->db->where("status","Active");
		$this->db->where("fsd",$fsd);
		$this->db->where("trade",$classv);
		$this->db->where("unit",$section1);
		$data['student'] = $this->db->get("student_info");
			}}
		$this->load->view("ajax/feeReport",$data);
	}
				  			
		function fullDetail(){
		 	$v = $this->uri->segment(3);
		 	$this->load->model("feeModel");
		 	$da=$this->feeModel->fulldetail($v);
		 	$data['request']=$da->result();
		 	$data['pageTitle'] = 'Fee Report';
		 	$data['smallTitle'] = 'Fee Report';
		 	$data['mainPage'] = 'Fee';
		 	$data['subPage'] = 'Fee Report';
		 	$data['title'] = 'Fee Report';
		 	$data['headerCss'] = 'headerCss/feeCss';
		 	$data['footerJs'] = 'footerJs/feeJs';
		 	$data['mainContent'] = 'personal';
		 	$this->load->view("includes/mainContent", $data);
		}	

		function enterDeufee(){
			
			$invoice = $this->db->count_all("invoice_serial");
			$invoice_number = $invoice + 1000;
			$invoiceDetail = array(
					"invoice_no" => $invoice_number,
					"reason" => "Fee Due",
					"invoice_date" => date("Y-m-d")
			);
			$this->db->insert("invoice_serial",$invoiceDetail);
			$studid=$this->input->post("studentId");
		$feeDueData = array(
				"student_id" => $this->input->post("studentId"),
				//"student_name" => $this->input->post("studentName"),
				"mbalance" => $this->input->post("remain"),
				//"paid" => $this->input->post("paid"),
				//"remain" => $this->input->post("remain"),
				"description" => $this->input->post("desc"),
				"depositedate" => date("Y-m-d"),
				'invoice_no'=>$invoice_number
		);
		$pri =0;
		$paid=$this->input->post("paid");
		$this->load->model("feeduemodel");
		$var = $this->feeduemodel->enterDetail($feeDueData,$studid);
		$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row();
		$Clbalance = $op1->closing_balance;
		$amount=$this->input->post("paid");
		$cbal=$Clbalance+$amount;
		$bal = array(
				"closing_balance" => $cbal
		);
		$this->db->where("opening_date",date('Y-m-d'));
		$this->db->update("opening_closing_balance",$bal);
		
		$daybookdata=array(
				'paid_to'=>$this->input->post("studentId"),
				'paid_by'=>"Admin",
				'reason'=>$this->input->post("desc"),
				'dabit_cradit'=>"Cradit",
				'amount'=>$this->input->post("paid"),
				'closing_balance'=>$cbal,
				'pay_date'=>date('Y-m-d'),
				'pay_mode'=>"Cash",
				'invoice_no'=>$invoice_number
		);
		$this->db->insert("day_book",$daybookdata);
		$isSMS = $this->db->get("sms")->row()->fee_submit;
		$amount1=$this->input->post("paid");
		$totdue=$this->input->post("totdue");
		$balance=$this->input->post("remain");
		$val=$this->db->get("sms_setting")->row();
		$senderiD=$val->sender_id;
		$authkey=$val->auth_key;
		//---------------------------------------------- END CHECK SMS SETTINGS -----------------------------------------
		if($isSMS == 'yes'){
			$this->load->helper("sms");
			$student_id = $this->input->post("studentId");
			$this->db->where("student_id",$student_id);
			$var=$this->db->get("guardian_info")->row();
			$fmobile=$var->f_mobile;
			$this->db->where("status","Active");
			$this->db->where("enroll_num",$student_id);
			$stu=$this->db->get("student_info")->row();
			$stuname=$stu->first_name;
			$msg = "Dear Parent ".$amount1.",is diposited of total.".$totdue."/-with balance Rs.".$balance."/-.Ramdoot ITI";
			sms($authkey, $msg,$senderiD,$fmobile);
		}
		redirect(base_url()."invoiceController/printDueFee/".$invoice_number);
	}		
		
		public function checkDetails(){
			$msg = '<div class="alert alert-info"><button data-dismiss="alert" class="close">&times;</button><strong>New Entry :) </strong></div>';
			$studentId = $this->input->post("studentId");
			$this->load->model("feeduemodel");
			$var = $this->feeduemodel->checkStock($studentId);
			if($var->num_rows() > 0){
				foreach ($var->result() as $row){
					 $sname = $row->student_name;
					 $tdue =$row->total_due;
						$itemData = array(
							"student_id" =>$row->student_id,
							"studentName" =>$sname,
							"totdue" =>$tdue,
							"msg" => ""
					);
				}
			}
			else{
				$var = $this->feeduemodel->checkStock2($studentId);
				if($var->num_rows() > 0){
					foreach ($var->result() as $row){
						$sname = $row->name;
						$tdue =0.00;
						$itemData = array(
							"student_id" =>$row->enroll_num,
							"studentName" =>$sname,
							"totdue" =>$tdue,
							"msg" => $msg
						);
				}
			}
			}
			echo (json_encode($itemData));
		}
		
		
		function printDueById(){
			$var= $this->input->post("billNo");
			$this->db->where("student_id",$var);
			$filter=$this->db->get("feedue2");
			if($filter->num_rows()>0)
			{
				?><table class="table table-bordered table-striped">
				<tr> 
					<th>S.no</th>
					<th>Student Id</th>
					<th>Student Name</th>
					<th>Total due</th>
					<th>Paid</th>
					
					<th>Date</th>
					<th>Invoice No</th>
				</tr>
				<?php $i =1 ;foreach($filter->result() as $f):?>
				<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $f->student_id;?></td>
				<td><?php echo $f->student_name;?></td>
				<td><?php echo $f->total_due;?></td>
				<td><?php echo $f->paid;?></td>
				<td><?php $inv = $f->invoice_no; echo $f->ddate;?></td>
				<td>
				<a href="<?php echo base_url()?>index.php/invoiceController/printDueFee/<?php echo $inv;?>" target="_blank" class="btn btn-blue">
								Print Invoice
							</a>
				</td>
				</tr>
				<?php $i++; endforeach;?>
				</table><?php 
		}
		else{
		echo "No Value Found In table";
		}
		}
		
		function deleteFee(){
			$invoiceNo = $this->uri->segment(3);
			$student_id = $this->uri->segment(4);
			$fristfee = $this->uri->segment(5);
			$this->db->where('invoice_no', $invoiceNo);
			$val = $this->db->get("day_book")->row();
			$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row();
			$balance = $op1->closing_balance;
			$close1 = $balance - $val->amount;
			$data = array(
					'paid_to' => "student",
					'paid_by' => "admin",
					'reason' => " Wrong Fee Entered",
					'dabit_cradit' => "Debit",
					'amount' => $val->amount,
					'closing_balance' => $close1,
					'pay_date' => date("Y-m-d"),
					'pay_mode' => "Software",
					'invoice_no' => "Delete Fee"
					
			);
			$bal = array(
					"closing_balance" => $close1
			);
			$this->db->where("opening_date",date('Y-m-d'));
			$this->db->update("opening_closing_balance",$bal);
			$this->db->insert("day_book",$data);
			$this->db->where('invoice_no', $invoiceNo);
			$this->db->where('student_id', $student_id);
			$this->db->delete('fee_deposit');
			if($fristfee=="true"){
				$this->db->where('student_id', $student_id);
				$this->db->delete('fee_shedule');
				$this->db->where('student_id', $student_id);
				$this->db->delete('one_time_fee');
			}
			redirect(base_url()."index.php/feeControllers/fullDetail/".$student_id); 
			
		}
		function deleteFeedue2(){
			$invoiceNo = $this->uri->segment(3);
			$student_id = $this->uri->segment(4);
			$fristfee = $this->uri->segment(5);
			$this->db->where('invoice_no', $invoiceNo);
			if($val = $this->db->get("day_book")->row()){
			$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row();
			$balance = $op1->closing_balance;
			$close1 = $balance - $val->amount;
			$data = array(
					'paid_to' => "student",
					'paid_by' => "admin",
					'reason' => " Wrong Fee Entered",
					'dabit_cradit' => "Debit",
					'amount' => $val->amount,
					'closing_balance' => $close1,
					'pay_date' => date("Y-m-d"),
					'pay_mode' => "Software",
					'invoice_no' => "Delete Fee"
			
			);
			$bal = array(
					"closing_balance" => $close1
			);
			
			
			$this->db->where("opening_date",date('Y-m-d'));
			$this->db->update("opening_closing_balance",$bal);
			
			$this->db->insert("day_book",$data);
			}
			$this->db->where('invoice_no', $invoiceNo);
			$this->db->where('student_id', $student_id);
			$this->db->delete('feedue2');
			//$data1 = array(
					//"current_balance" => $val->amount
			///); 
			
			//$sno = $this->db->query("SELECT * FROM fee_deposit WHERE student_id ='".$student_id."' ORDER BY ID DESC limit 1")->row();
			//$this->db->where("id",$sno->id);
			//if($this->db->update("fee_deposit",$data1)){
			redirect(base_url()."index.php/feeControllers/fullDetail/".$student_id);
			//}
			//else{
			//	echo "Wrong Value";
			//}
		}
		
			
		function updateFeeS(){
			$stuid = $this->input->post("stuid");
			$tutionfee = $this->input->post("tutionfee");
			$computer_fee = $this->input->post("computer_fee");
			$transport_fee = $this->input->post("transport_fee");
			$other_fee = $this->input->post("other_fee");
			$data = array(
					'Tution_Fee'	=> $tutionfee,
					'Library_Fee'	=> $computer_fee,
					'Practical_Fee' => $transport_fee,
					'Examination_Fee' => $transport_fee,
					'Others_Fee' => $other_fee
			);
			$this->db->where("student_id",$stuid);
			
			if($this->db->update("fee_shedule",$data))
			{	
				echo "Updated";
			}
			else
			{
				echo "Error";
			}	
		}
		function feeRemSms(){
			
			$sdue=$this->input->post("smstodue");
			$mnum=$this->input->post("mnum");
			$sname=$this->input->post("sname");
			$fname=$this->input->post("fname");
			$msg =	"Dear Parent ".$fname." your Ward's (".$sname.") school fee ".$sdue." is remain to deposit. Please deposit soon.Ramdoot ITI";
			sms($mnum,$msg);
			echo "Success";
						
		}

		function getFeeDetails(){
		    //$school_code = $this->session->userdata("school_code");
		   $month =  $this->input->post("month");
		   $stuid =  $this->input->post("stuId");
		   $scatid =  $this->input->post("catId");
		   $fsdid =  $this->input->post("fsdid");
		 //print_r($month);
		 //exit;
		   //$this->feeModel->getperfeerecord($stuid);
		 
		   //echo $fsdid."rahuk";
		 
		 
		$i=0; foreach($month as $mtable):
		     $searchM[$i] = $mtable;
		    $i++; endforeach;
		     $searchM[$i]=13;
		   $this->db->where("s_no",$stuid);
		   $stuid_details = $this->db->get("student_info")->row();
		   $feecata[0]=$scatid;
		      $feecata[1]=0;
		   $this->db->distinct();
		   $this->db->select("*");
		   $this->db->where("fsd",$fsdid);
		   $this->db->where("class_id",$stuid_details->class_id);
		    $this->db->where_in("cat_id",$feecata);
			$this->db->where_in("taken_month",$searchM);
			
		   $fee_head = $this->db->get("class_fees");
		    $totfees=0;
		  ?>
		  
		  <table><tr>
		  <td valign="top" width="50%">
	                            <div class="col-sm-12">
	                                <div class="panel panel-white">
	                                    <div class="panel-heading panel-red text-uppercase">Payment Mode Detail</div>
	                                      <input type="hidden" name ="feecat" id="feecat" value="<?php echo $scatid; ?>" class="form-control">             	
	                                    <div class="row" id="cheque">
	                                        <div class="col-sm-12">
	                                            <br/>
	                                            <div class="row space15">
	                                                <div class="col-sm-12">
	                                                    <div class="col-sm-5 text-uppercase">Depositor Name</div>
	                                                    <div class="col-sm-7">
	                                                        <input type="text" name ="dipositorName1" id="ac" class="form-control text-uppercase" onkeyup="depositorname();">
	                                                    </div>
	                                                </div>
	                                            </div>									
	                                          
	                                            <!-- <div class="row space15">
	                                                <div class="col-sm-12">
	                                                    <div class="col-sm-5 text-uppercase">Enter Discount</div>
	                                                    <div class="col-sm-7">
	                                                       <input type="text" name ="discountv" id="discountv" value="0.00" class="form-control" onkeyup="amount();">
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div class="row space15">
	                                                <div id = "discountprint">
	                                                 <div  class="col-sm-12">
	                                                    <div class="col-sm-5 text-uppercase">Enter Discounter ID</div>
	                                                    <div class="col-sm-7">
	                                                        <input type="text" name ="discounterID" id="discounterID"  class="form-control text-uppercase">
	                                                    </div>
	                                                </div>
	                                               </div>
	                                           </div>  -->
	                                
	                                             <!-- <div class="row space15">
	                                                <div id = "discounterOTP">
	                                                 <div  class="col-sm-12">
	                                                    <div class="col-sm-5 text-uppercase">Enter OTP</div>
	                                                    <div class="col-sm-7">
	                                                        <input type="text" name ="discounterOTPv" id="discounterOTPv"  class="form-control" onkeyup="OTP();">
	                                                    </div>
	                                                </div>
	                                            </div>
	                                           </div>  -->
	                                            <!-- <div class="row space15">
	                                                <div id = "discounterOTP">
	                                                 <div  class="col-sm-12">
	                                                    <div class="col-sm-12" id ="rahul1"></div>
	                                                   
	                                                </div>
	                                            </div> 
	                                           </div> -->
	                                            <!-- <div class="row space15">
	                                                <div class="col-sm-12">
	                                                    <div class="col-sm-12" id="rahul"></div>
	                                                   
	                                                </div>
												</div> -->
												<?php $disc=0;$disc1 =0;
												//if($stuid_details->discount_id>0){
													//$this->db->where("id",$stuid_details->discount_id);
													//$studdiscount = $this->db->get("discounttable");
													//if($studdiscount->num_rows()>0){
														//$discountRow = $studdiscount->row();
													//$this->db->where("school_code",$school_code);
													//print_r($discountRow->applied_head_id);
													//print_r($stuid_details->class_id);
													$this->db->where("fsd",$stuid_details->fsd);
													//$this->db->where("fee_head_name",$discountRow->applied_head_id);
													$this->db->where("class_id",$stuid_details->class_id);
													$damount=$this->db->get("class_fees");
													
													if($damount->num_rows()>0){
													$dmo = ($damount->row()->fee_head_amount);
													// if($discountRow->discount_persent>0){
													// $disc1 = ($dmo * $discountRow->discount_persent)/100;
													// }
													
													
													?>
												<!-- <div class="row space15">
	                                                <div class="col-sm-12">
														<div class="col-sm-5 text-uppercase">Discount</div>
														<?php  //$disc=0 ; foreach($month as $mtable):
														//$disc+=$disc1;
															//endforeach;?>
															
														<div class="col-sm-7"> <input type="text" name ="discount_start" id="discount_start" value ="<?php echo $disc;?>" class="form-control"></div>
	                                                </div>
												</div> -->
												<?php } 
												//}else{
													?>
                                                <input type="hidden" name ="discount_start" id="discount_start" value ="<?php echo 0.00;?>" class="form-control">
												<?php //} ?>
												<div class="row space15">
	                                                <div class="col-sm-12">
	                                                    <div class="col-sm-5 text-uppercase">Late Fee</div>
	                                                    <div class="col-sm-7">
	                                                    <?php 
	                                                   /*  $latef=0;
	                                                    $vt=1;
	                                                    foreach($val->result() as $row):
	                                                    if($vt==1){
	                                                    $date1 = $row->should_deposite;
	                                                    $date2 = date("Y-m-d");
	                                                    if($date2 >= $date1){
	                                                   $diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$totlatedays = ($years*12*30)+($months*30)+$days;
	                                                    $vt++;
	                                                    $this->db->select("late_fee");
	                                                    $this->db->where("month_number",$row->month_number);
	                                                    $this->db->where("school_code",$school_code);
	                                                    $yh = $this->db->get("fee_card_detail")->row();
	                                                   
	                                                   $dh= $yh->late_fee;
	                                                 
	                                                     if($dh != 0){
	                                                     	
	                                                    	
	                                                       $latef	=	$dh*$totlatedays;
	                                                      
	                                                      
	                                                      // $latef=0;
	                                                    }else{
	                                                        $latef=0;
	                                                   }
	                                                    
	                                                    }
	                                                    }
	                                                    endforeach; 
	                                                      */
	                                                    
	                                                    //$sno = $this->db->query("SELECT * FROM fee_deposit WHERE student_id ='".$student_id."' ORDER BY ID DESC limit 1")->row();
	                                                    		
	                                                    
	                                                  $latefee1='0.00';
	                                                   
											  			?> 
	                                                   
	                 <input type="text" value="<?php echo $latefee1; ?>" name ="latefee" id="latefee2" class="form-control" onkeyup="fee();">
						
														</div>
	                                                </div>
	                                            </div>
	                                             <input type='hidden' value='<?= json_encode($month) ;?>' name='arrvalue'>    
	                                           
	                                           
	                                            <?php 
	                                            
	        //                                    $transfee=0;
	                                          
	        //                                     if(($stuid_details->transport)){
	        //                                         $this->db->where("id",$stuid_details->vehicle_pickup);
	        //                                       $tffee=  $this->db->get("transport_root_amount");
	        //                                       if($tffee->num_rows()>0){
	        //                                           $tffee=$tffee->row();
	        //                                            foreach($month as $mtable):
		   
		    //  if(($school_code == 1) || ($school_code == 8) || ($school_code == 14)){
	        //                                     if($mtable!=6){
	        //                                         $transfee  +=$tffee->transport_fee;
	        //                                     }}else{
	        //                                         $transfee  +=$tffee->transport_fee;
	        //                                     } endforeach;
	                                            	?>
	                                             <!-- <div class="row space15">
	                                                <div class="col-sm-12">
	                                                    <div class="col-sm-5 text-uppercase">Transport Fee</div>
	                                                    <div class="col-sm-7">
	                                                   
	                                                        <input type="hidden" name ="transport_fee" id="transport_fee" value ="<?php echo $transfee;?>" class="form-control">
	                                                         <input type="text" name ="dtransport_fee" id="dtransport_fee" value="<?php echo $transfee;?>" class="form-control" disabled="disabled"> -->
	                                                    <?php //$totfees+=$transfee;?>
	                                                    <!-- </div>
	                                                </div>
	                                            </div> -->
	                                            <?php //}}?>
	                                             <div class="row space15">
	                                                <div class="col-sm-12">
	                                                    <div class="col-sm-5 text-uppercase">Discription</div>
	                                                    <div class="col-sm-7">
	                                                       <textarea rows="5" cols="6" class="form-control" id="disc" name="disc" placeholder="Text Field"></textarea>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div class="row space15">
	                                                <div class="col-sm-12">
	                                                    <div class="col-sm-12" id="rahul"></div>
	                                                   
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    
	                                   
	                                    
	                                </div>
	                            </div>
	                           
	                            </td>
	                            <td>
	<!-- ------------------------------------------------- Payment mode Column End ------------------------------------------------------ -->					
	<!-- ------------------------------------------------- Fee Detail Column ------------------------------------------------------ -->
	                            <div class="col-sm-12">
	                                <div class="panel panel-white">
	                                    <div class="panel-heading panel-red text-uppercase">Fee Detail</div>
	                                    <div class="row" id="no1">
	                                        <div class="col-sm-12">
	                                           
	                                        </div>
	                                    </div>
	                            
	                                    <div id="feeDetail">
	                                        <div class="row space15">
	                                            <div class="col-sm-12"></div>
	                                        </div>
	                                     <?php  
	                                   
	                                  $i=1;
	                                  if($fee_head->num_rows()>0){
	                                     foreach($fee_head->result() as $feeh):
	                                         
	                                     if($feeh->fee_head_name!= NULL){
											
	                                     ?>
	                                        <div class="row space15">
	                                                        <div class="col-sm-12">
	                                                           
	                                                           
	                                                            <?php $name =  $feeh->fee_head_name;
	                                                            if($feeh->taken_month==13){
	                                                                $fhamount=0;
	                                                                foreach($month as $m):
	                                                                    $fhamount=$fhamount+$feeh->fee_head_amount;
	                                                           
	                                                                 $totfees+=$feeh->fee_head_amount;
	                                                                 endforeach;?>
	                                                                  <div class="col-sm-6"> <?php echo $feeh->fee_head_name; ?>
	                                                            <input type="hidden" id="h<?= $feeh->fee_head_name; ?>"  value="<?= $fhamount;?>" class="form-control"/>
	                                                            </div>
	                                                             <div class="col-sm-6">
	                                                                <input type="hidden" id="<?php echo $name ?>"  value="<?php echo $fhamount;?>" class="form-control"/>
	                                                                 <input type="text" id="d<?php echo $name; ?>" value="<?php echo $fhamount;?>" class="form-control" disabled="disabled"/>
	                                                               </div> 
	                                                               
	                                                              <!--  <div class="col-sm-3">
	                                                                Skip <input type="checkbox" id="skip--<?= $name; ?>" onchange="skip('skip--<?= $name ?>')" />
	                                                                <input type="hidden" id="skipValue--<?= $name; ?>" value="0" />
	                                                                </div>-->
	                                                                 
	                                                               <?php  }else{ ?>
	                                                             <div class="col-sm-6"> <?php echo $feeh->fee_head_name; ?>
	                                                            <input type="hidden" id="h<?= $feeh->fee_head_name; ?>"  value="<?= $feeh->fee_head_amount;?>" class="form-control"/>
	                                                            </div>
	                                                             <div class="col-sm-6">
	                                                                 <input type="hidden" id="<?php echo $name ?>"  value="<?php echo $feeh->fee_head_amount;?>" class="form-control"/>
	                                                                 <input type="text" id="d<?php echo $name; ?>"  value="<?php echo $feeh->fee_head_amount;?>" class="form-control" disabled="disabled"/>
	                                                               </div> 
	                                                               
	                                                             <!--   <div class="col-sm-3">
	                                                                Skip <input type="checkbox" id="skip--<?= $name; ?>" onchange="skip('skip--<?= $name ?>')" />
	                                                                <input type="hidden" id="skipValue--<?= $name; ?>" value="0" />
	                                                               </div>-->
	                                                               
	                                                                 <?php 
	                                                                 $totfees+=$feeh->fee_head_amount;
	                                                            }
	                                     //$count =$count+ $field->fee_head_amount;
	                                                                // if($disValue->num_rows()>0){
	                                                                    // $fg=$disValue->row();
	                                                                   //  if($field->fee_head_name==$fg->mannual){
	                                                                // if(strpos($discountCheck, '%')==true){
	                                                                   //  $name = str_replace('%', '0', $discountCheck);
	                                                                  //   $adcount = ($field->fee_head_name*$name)/100;
	                                                                  //   $count =$count-$adcount;
	                                                                // }else{
	                                                                   //  $count=$count-$discountCheck;
	                                                                // }
	                                                                 
	                                                                // }
	                                                                // }  
	                                                                 ?>
	                                                                 
	                                                           
	                                                      
	                                                    </div>
	                                        </div>
	                                        <?php } endforeach;}else{
	                                            echo "define Class Fee First";}
	                                            ?>
	                                        
	                                        
	                                        
	                                        <div class="row space15">
	                                            <div class="col-sm-12">
	                                                <div class="col-sm-6 text-uppercase">Previous Balance</div>
	                                                <div class="col-sm-6">
	                                                	<?php 
	                                                	$paid12 = "paid";
	                                                	$pb = $this->db->query("SELECT mbalance FROM feedue WHERE student_id='$stuid' ORDER BY id DESC LIMIT 1"); 
	                                                	
	                                                		if($pb->num_rows() > 0){
	                                                			$pBalance = $pb->row()->mbalance;
	                                                		}else{
	                                                			$pBalance = 0.00;
	                                                		}
	                                                		$totfees+=$pBalance;
	                                                	?>
	                                                	<input type="hidden" id="pb" name="pb" value="<?php echo $pBalance; ?>" class="form-control"/>
	                                                    <input type="text" id="pb1" name="pb1" value="<?php echo $pBalance; ?>" class="form-control" disabled="disabled"/>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        	<?php $totfees=$totfees-$disc ;?>
										
	                                        <div class="row space15">
	                                            <div class="col-sm-12">
	                                                <div class="col-sm-6 text-uppercase">Total</div>
	                                                <div class="col-sm-6">
	                                                    <input type="hidden" id="total1"  value="<?php echo $totfees;?>" name="total1" />
	                                                    <input type="hidden" value="<?php echo $totfees;?>" id="tempValue"/>
	                                                    <input type="text" id="total"  value="<?php echo $totfees+$latefee1;?>" class="form-control" readonly/>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="row space15">
	                                            <div class="col-sm-12">
	                                                <div class="col-sm-6 text-uppercase">Paid</div>
	                                                <div class="col-sm-6">
	                                                    <input type="text" id="paid" name="paid" class="form-control" required="required" />
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="row space15">
	                                            <div class="col-sm-12">
	                                                <div class="col-sm-6 text-uppercase">Remaining Balance</div>
	                                                <div class="col-sm-6">
	                                                    <input type="hidden" id="cb1" name="cb" value="0.00" />
	                                                    <input type="text" id="cb" value="0.00" class="form-control" disabled="disabled"/>
	                                                </div>
	                                            </div>
	                                        </div>
	                                       
	                                    
	                                        <div class="row space15">
	                                            <div class="col-sm-12">
	                                                <div class="col-sm-6"></div>
	                                                <div class="col-sm-6">
	                                                    <button type="submit" class="btn btn-info btn-squared btn-lg text-uppercase">
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
	                            </td>
	                           </tr> 
							  </table>                      
	                                                <?php //$count=0;
	                                   //$count=$count+ $totfees;
	                 	
?>
	<script>
	$("#discountprint").hide();
	$("#discounterOTP").hide();
	
	
	$("#paid").keyup(function(){
		var c = Number($("#total").val()) - $("#paid").val();
		
		$("#cb").val(c);
		$("#cb1").val(c);
	});
	$("#discountv").keyup(function(){
		$("#discountprint").show();
	});
	
	$("#discounterID").keyup(function()
	{
		var discounterID = $("#discounterID").val();
		var discountv=$("#discountv").val();
		$.post("<?php echo site_url("index.php/teacherController/checkIDOTP") ?>",{discounterID : discounterID,discountv : discountv}, function(data){
			$("#rahul").html(data);
		});
		
	});
	$("#discounterOTPv").keyup(function(){
		
		var discounterIDv = $("#discounterOTPv").val();
		var discountv=$("#discountv").val();	
		var total1=$("#total1").val();	
	
		$.post("<?php echo site_url("index.php/teacherController/checkIDOTPc") ?>",{discounterIDv : discounterIDv}, function(data){
			
			var d = jQuery.parseJSON(data)
			if(d.sms == "yes")
		    {	
			    var  totg=Number(total1) - Number(d.dis);
				$("#total1").val(totg);
				$("#tempValue").val(totg);
				$("#total").val(totg);
			}
		});
	});
	
	function skip(id) {
		if(document.getElementById(id).checked) {
			//alert("checked => " + id)
			let skipFieldID = id.split("--")
			let fieldID = skipFieldID[1]
			let fieldValue = parseFloat($(`#${fieldID}`).val())
			let total = parseFloat($("#total").val())
			
			$(`#skipValue--${fieldID}`).val(fieldValue)
			$(`#${fieldID}`).val(0)
			$(`#d${fieldID}`).val(0)
			$("#total").val(total - fieldValue)
			$("#total1").val(total - fieldValue)
			$("#tempValue").val(total - fieldValue)
			$("#paid").val(parseFloat($("#paid").val()) - fieldValue)
			$("#sub_total1").val(parseFloat($("#sub_total1").val()) - fieldValue)
			$("#sub_total").val(parseFloat($("#sub_total").val()) - fieldValue)
			var c = Number($("#total1").val()) - $("#paid").val();
			
			$("#cb").val(c);
			$("#cb1").val(c);
		}
	else {
		// alert("unchecked => " + id)
		let skipFieldID = id.split("--")
		let fieldID = skipFieldID[1]
		let fieldValue = parseFloat($(`#skipValue--${fieldID}`).val())
		let total = parseFloat($("#total").val())
		
		$(`#skipValue--${fieldID}`).val(0)
		
		$(`#${fieldID}`).val(fieldValue)
		$(`#d${fieldID}`).val(fieldValue)
		$("#tempValue").val(total + fieldValue)
		$("#total").val(total + fieldValue)
		$("#total1").val(total + fieldValue)
		$("#paid").val(parseFloat($("#paid").val()) + fieldValue)
		$("#sub_total1").val(parseFloat($("#sub_total1").val()) + fieldValue)
		$("#sub_total").val(parseFloat($("#sub_total").val()) + fieldValue)
		var c = Number($("#total").val()) - $("#paid").val();
		
		$("#cb").val(c);
		$("#cb1").val(c);
	}
		
		
		
	}
	
		$("#latefee2").keyup(function(){
		    	let fieldValue = parseFloat($(`#latefee2`).val())
		    	if(fieldValue>0){
		    	    	let total=0;
		    total = parseFloat($("#tempValue").val())
		   // alert(total);
		$("#total").val(total + fieldValue)
		$("#total1").val(total + fieldValue)
		$("#paid").val(fieldValue + total)
		$("#sub_total1").val(fieldValue + total)
		$("#sub_total").val( fieldValue + total )
		    	}else{
		    	    	let total=0;
		    total = parseFloat($("#tempValue").val())
		    //alert(total);
		    fieldValue=0;
		$("#total").val(total + fieldValue)
		$("#total1").val(total + fieldValue)
	$("#paid").val(fieldValue + total)
		$("#sub_total1").val(fieldValue + total)
		$("#sub_total").val( fieldValue + total )
		    	}
	});
	
	</script>                   
	<?php 	}
}?>
	}