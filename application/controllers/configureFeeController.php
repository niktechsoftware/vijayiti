<?php
 class ConfigureFeeController extends CI_Controller{
 	
 function __construct()
	{
		parent::__construct();
		$this->is_login();
		
	}
	
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if($is_login != "admin"){
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_login){
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_lock){
			redirect("index.php/homeController/lockPage");
		}
	}

 function getfeeheadcategory(){
        $classid = $this->input->post("classid");
      // $stream=$this->input->post("stream");
       //$section=$this->input->post("section");
       
        $this->load->model("subjectModel");
        $result = $this->subjectModel->getSubject1($classid);
        ?>
            <div class="col-sm-12">
                <!-- start: INLINE TABS PANEL -->
                <div class="panel panel-white">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="tab-pane fade in active" id="myTab_example1">
                                    <div class="row">
                                    <div class="col-sm-12">
                                            <div class="panel panel-calendar">
                                                <div class="panel-heading panel-grey border-light">
                                                    <h4 class="panel-title">select fee head and category</h4>
                                                </div>
                                                <div class="panel-body">
                                                        <table class="table table-striped table-hover center table-responsive" id="sample-table-3" style="border:3px solid green;" >
                        <thead class="text-blue text-large" style="border:3px solid green;">
                            <tr>
                                <th style="border:1px solid green;">SNo.</th>
                                <th style="border:1px solid green;">Fee Head</th>
                                <th style="border:1px solid green;">Fee Category</th>
                                <th style="border:1px solid green;">Action</th>
                            </tr>
                        </thead>
                        <tbody style="border:3px solid green;">
                        
                            <?php $i = 1;
                                                       $this->db->where("class_id",$classid);
                                                       //$this->db->where('stream',$stream);
                                                       //$this->db->where('section',$section);
                                                       $this->db->where("fsd",$this->session->userdata('fsd'));
                                                        $result =   $this->db->get("class_fees");
                                                        if($result->num_rows()>0){
                                                            foreach($result->result() as $row):
                             ?>
                            <tr><span id="name4" style="color:red;"></span>
                                <td style="border:1px solid green;"><b><?php echo $i; ?></b><input type="hidden" id="id<?php echo $i;?>" value="<?php echo $row->id; ?>"/></td>
                                <td style="border:1px solid green;"><input type="text" id="clName<?php echo $i; ?>" value="<?php echo $row->fee_head_name;?>" size="10" readonly></td>
                            <?php  
                           // $this->db->where("school_code",$this->session->userdata("school_code"));
                            $feecat = $this->db->get("fee_cat");
                            if($feecat->num_rows()>0){ 
                            ?>
                                <td style="border:1px solid green;">
                                    <select id="ccode<?php echo $i; ?>" name ="ccode<?php echo $i;?>" class="form-control">
                                        <option value="0">--select category--</option>
                                        <?php foreach($feecat->result() as $row1):  ?>
                                        
                                       <option value="<?php echo $cid= $row1->id;?>" <?php if($row1->id == $row->cat_id): echo 'selected="selected"'; endif; ?> >
                                            <?php echo $row1->cat_name;?>
                                        </option>
                                        <!--<option value="<?php echo $cid= $row1->id;?>" ><?php echo $row1->cat_name; ?></option>-->
                                        <?php endforeach; ?>
                                        </select>
            
                                        
                                </td>
                                 <?php  }else{
                                    echo "<td style='border:1px solid green;'><strong style='color:red;'>Define Category First</strong></td>";
                                 }?>
                                 
                                <td style="border:1px solid green;">
                                    <button  class="btn btn-purple btn-sm" id="editcat<?php echo $i; ?>">
                                        <i class="fa fa-edit"></i> &nbsp;Update
                                    </button>
                                    
                                    
                                    <button class="btn btn-red btn-sm" id="deletecat<?php echo $i; ?>">
                                        <i class="fa fa-trash-o"></i> &nbsp;Reset
                                    </button>
                                    
                                        <script>
                    $("#editcat<?php echo $i; ?>").click(function(){
                    var id = $("#id<?php echo $i; ?>").val();
                    var clName = $("#clName<?php echo $i; ?>").val();
                    var ccode = $("#ccode<?php echo $i; ?>").val();
                    //alert(id +" , "+ clName +" , "+ ccode);
                    $.post("<?php echo site_url('index.php/configureFeeController/updatefeecat')?>",
                            {   id : id,
                                clName : clName,
                                ccode : ccode
                            },
                            function(data){
                                $("#editcat<?php echo $i; ?>").html(data);
                            }
                    );
                });

            $("#deletecat<?php echo $i; ?>").click(function(){
                var id = $("#id<?php echo $i; ?>").val();
                var clName = $("#clName<?php echo $i; ?>").val();
                var ccode = $("#ccode<?php echo $i; ?>").val();
                alert(id +" , "+ clName +" , "+ ccode);
                $.post("<?php echo site_url('index.php/configureFeeController/resetfeecat')?>",
                        {
                            id : id,
                            clName : clName,
                            ccode : ccode
                        },
                        function(data){
                            $("#deletecat<?php echo $i; ?>").html(data);
                        });
            });             
                                    
                                </script>
                                        
                                </td>
                                
                            </tr>
                            <?php $i++; endforeach; }
                            ?>
                        </tbody>
                    </table>
                    </div>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>                                                      
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: INLINE TABS PANEL -->
            </div>
        <?php 
    }

 	
 	function schoolFeeConfigure(){
 		$data['pageTitle'] = 'Fee Configuration';
 		$data['smallTitle'] = 'Fee Configuration';
 		$data['mainPage'] = 'Fee';
 		$data['subPage'] = 'Fee Configuration';
 		
 		$this->load->model("configureFeeModel");
 		$data['column'] = $this->configureFeeModel->feeColumnLIst();
 		
 		$data['title'] = 'Fee Configuration';
 		$data['headerCss'] = 'headerCss/configureClassCss';
 		$data['footerJs'] = 'footerJs/configureFeeJs';
 		$data['mainContent'] = 'configureFee';
 		$this->load->view("includes/mainContent", $data);
 	}
 	
 	function saveFeeFields(){
 		$del_deposit = 'DROP TABLE IF EXISTS fee_deposit';
 		$fee_deposit = 'CREATE TABLE `fee_deposit` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `student_id` varchar(10) NOT NULL,';
 		foreach ($this->input->post("month") as $row):
 			$fee_deposit .= '`'.$row.'` decimal(10,2) NOT NULL,';
 		endforeach;
		$fee_deposit .= '`other_fee_reason` text NOT NULL,
					  `payment_mode` varchar(10) NOT NULL,
					  `previous_balance` decimal(10,2) NOT NULL,
					  `total` decimal(10,2) NOT NULL,
					  `paid` decimal(10,2) NOT NULL,
					  `current_balance` decimal(10,2) NOT NULL,
					  `sub_total` decimal(10,2) NOT NULL,
					  `diposit_month` int(2) NOT NULL,
					  `diposit_date` date NOT NULL,
					  `till_diposit` date NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';
//----------------------------------------------------------------------------------------------------------		
				
		$del_schdule = 'DROP TABLE IF EXISTS fee_shedule';
 		$fee_schdule = 'CREATE TABLE `fee_shedule` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `student_id` varchar(10) NOT NULL,';
		foreach ($this->input->post("month") as $row):
 			$fee_schdule .= '`'.$row.'` decimal(10,2) NOT NULL,';
 		endforeach;
		$fee_schdule .= 'PRIMARY KEY (`id`)
					) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';
 		
//----------------------------------------------------------------------------------------------------------
 		$del_one_time_fee = 'DROP TABLE IF EXISTS one_time_fee';
 		$one_time_fee = 'CREATE TABLE `one_time_fee` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `student_id` varchar(10) NOT NULL,';
 		foreach ($this->input->post("annual") as $row):
 			$one_time_fee .= '`'.$row.'` decimal(10,2) NOT NULL,';
 		endforeach;
			
			$one_time_fee .= '`diposit_date` date NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1';
 		
		
		$this->db->query($del_deposit);
 		$this->db->query($fee_deposit);
 		$this->db->query($del_schdule);
 		$this->db->query($fee_schdule);
 		$this->db->query($del_one_time_fee);
 		$this->db->query($one_time_fee);
 		
 		$this->schoolFeeConfigure();
 	}

 	 function resetapply_method()
   {

      $applymethod = $this->input->post("applymethod");
      // $this->db->where('school_code',$this->session->userdata("school_code"));
      // $this->db->where('apply_method',$applymethod);
       $this->db->delete('late_fees');

      
      // $this->db->where('school_code',$this->session->userdata("school_code"));
       $this->db->delete('fee_card_detail');
        $this->db->where('fsd',$this->session->userdata("fsd"));
       $this->db->delete('class_fees');

   }
    
    // function schoolFeeConfigure(){
    //     $data['pageTitle'] = 'Fee Configuration';
    //     $data['smallTitle'] = 'Fee Configuration';
    //     $data['mainPage'] = 'Fee';
    //     $data['subPage'] = 'Fee Configuration';
        
    //     $this->load->model("configureFeeModel");
    //     $data['column'] = $this->configureFeeModel->feeColumnLIst();
        
    //     $data['title'] = 'Fee Configuration';
    //     $data['headerCss'] = 'headerCss/configureClassCss';
    //     $data['footerJs'] = 'footerJs/configureFeeJs';
    //     $data['mainContent'] = 'configureFee';
    //     $this->load->view("includes/mainContent", $data);
    // }
    
    
    
    function update_fee_deposit(){
        //$month_name = $this->input->post("month_name");
        $month_number = $this->input->post("month_number");
        //$data['month_name']       =   $this->input->post("month_name");
        $data['month_number']   =   $this->input->post("month_number");
        $data['deposite_date']  =   $this->input->post("dddate");
        //$data['late_fee']     =   $this->input->post("latefee");
       // $data['school_code']    =   $this->session->userdata("school_code");
        $data['fsd']            =   $this->session->userdata("fsd");
        $data['update_date']    =   date('Y-m-d');
        $this->load->model("configurefeemodel");
        $updatedate = array(
            "should_deposite"=>$this->input->post("dddate")
            
        );
        $this->configurefeemodel->save_fee_deposit($data,$month_number,$updatedate);
        redirect("login/configureFee/success");
    }
    
    
    function addfeeDetails(){
        $classid = $this->input->post("classid");
       // $stream = $this->input->post("stream");
       // $section = $this->input->post("section");
        $addfeehead = $this->input->post("addfeehead");
        $addamount = $this->input->post("addamount");
        $addMonth = $this->input->post("addMonth");
        
        $data = array(
            "class_id" => $classid,
           // "stream" => $stream,
           // "section" => $section,
            "taken_month" => $addMonth,
            "fee_head_name" =>$addfeehead,
            "fee_head_amount" =>$addamount,
            "fsd"        =>$this->session->userdata("fsd"),
            "update_date"=> date('Y-m-d h:i:s'),
            //"school_code" =>$this->session->userdata("school_code")
        );
        
        $this->load->model("configurefeemodel");
        $result = $this->configurefeemodel->addfeeDetails($data);
        if($result)
        {
            $this->getFeeHead();
        }
        else
        {
            
            echo "Something wrong!please try to after sometime";
        }
    }
    
    function getFeeHead(){
        $classid = $this->input->post("classid");
          // $stream = $this->input->post("stream");
        // $section = $this->input->post("section");
        $this->load->model("configurefeemodel");
        $result = $this->configurefeemodel->getfeeDetails($classid);
        ?><div class="col-sm-12">

    <!-- start: INLINE TABS PANEL -->
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Add Fee Head & Amount</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="tab-pane fade in active" id="myTab_example1">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="panel panel-warning">
                                    <div class="panel-heading panel-grey border-light">
                                        <h4 class="panel-title">Fee Head & Amount Name</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-sm-12">
                                            <div class="row-form">

                                                <div class="col-md-5"><strong>Fee Head Name:</strong></div>
                                                <div class="col-md-7"><input type="text" class="form-control"
                                                        id="addfeehead" onkeyup="function()" onkeyup="function1()" />
                                                        <input type="hidden" class="form-control"
                                                        id="classshow" value="<?php echo $classid; ?>" />
                                                        <!--  <input type="hidden" class="form-control"
                                                        id="streamListfee" value="<?php echo $stream; ?>" />
                                                         <input type="hidden" class="form-control"
                                                        id="sectionfee" value="<?php echo $section; ?>" /> --> 
                                                    <span id="name" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="row-form">
                                                <div class="col-md-5"><strong>Fee Amount:</strong></div>
                                                <div class="col-md-7"><input type="text" class="form-control"
                                                        id="addamount" onkeypress="return isNumber(event)" /></div>
                                            </div>
                                            <div class="row-form">
                                                <div class="col-md-5"><strong>Deposite Month:</strong></div>
                                                <div class="col-md-7">
                                                    <select class="form-control" id="addMonth">

                                                        <?php //$this->db->where('school_code',$this->session->userdata('school_code'));
                                                
                                             $row=   $this->db->get('late_fees');
                                                if($row->num_rows()>0)
                                                {
                                                $row =$row->row();
                                                $mgap=$row->apply_method;
                                                $fsdval=$this->session->userdata('fsd');

                                                $this->db->where('id',$fsdval);
                                                $fsd_id=$this->db->get('fsd')->row();
                                                $startdate=$fsd_id->finance_start_date;
                                                $enddate=$fsd_id->finance_end_date;
                                                 $tdate=(int)(date('m', strtotime($startdate)));

                                                 $edate=(int)(date('m', strtotime($enddate)));

 
                                                 ?>
                                                        <?php 
                                                 $ft=$tdate;  $loop = 12/$mgap; 

                                             for($j = 1 ; $j<= $loop; $j++)
                                             {
                                                if($ft>12){
                                                 $ft=$ft-12;}
                                                $month_name = date("F",mktime(0,0,0,$ft,1,date("Y")));?>
                                                        <option value="<?php echo $ft; ?>"><?php echo  $month_name;?>
                                                        </option>
                                                        <?php
                                                 $ft = $mgap+$ft;
                                                 } 
                                                    ?>
                                                        <?php
                                                     
                                                        
                                                          }?>
                                                        <option value="13">All</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row-form">

                                                <a href="#" class="btn btn-primary" id="addfeeButton"><i
                                                        class="fa fa-check"></i> Add Fee Details</a>

                                            </div>
                                        </div>
                                        <div class="text-blue text-small">This is Fee Head & Amount Name area.First you define fee head name (like:- Admission fee,exam fee,monthly fee)
                                        and after that define amount for that fee haed name,and select month in which you want to collect that fee.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                           
                            $("#addfeeButton").click(function() {
                              
                                var classid = $("#classshow").val();
                               
                                 //  var stream = $("#streamListfee").val();
                                   
                                // var section = $("#sectionfee").val();

                                var addfeehead = $("#addfeehead").val();
                                var addamount = $("#addamount").val();
                                var addMonth = $("#addMonth").val();
                                //alert(clname+","+stream+","+section+","+subject);
                                $.post("<?php echo site_url('configureFeeController/addfeeDetails') ?>", {
                                    classid: classid,
                                   // stream: stream,
                                    //section:section,
                                    addfeehead: addfeehead,
                                    addamount: addamount,
                                    addMonth: addMonth
                                }, function(data) {
                                    $("#feeBox").html(data);
                                    //alert(data);
                                });
                            });
                            var input = document.getElementById("addfeehead");
                            input.addEventListener("keyup", function() {
                                // var text_value = document.getElementById("addfeehead").value;
                                // if (!text_value.match(/^[A-Za-z]+$/)) {
                                //     document.getElementById("name").innerHTML = "Only Character Allow";
                                //     $('#addfeeButton').attr('disabled', 'disabled');

                                //     $(document).on('click', 'a', function(e) {
                                //         if ($(this).attr('disabled') == 'disabled') {
                                //             e.preventDefault();
                                //         }
                                //         window.location.reload();
                                //     });
                                //     document.getElementById("addfeehead").focus();
                                //     if (text_value == "") {
                                //         document.getElementById("name").innerHTML = " ";
                                //         document.getElementById("addfeehead").focus();
                                //         window.location.reload();
                                //     }
                                // }
                            });




                            input.addEventListener("keyup", function() {
                                var x = document.getElementById("addfeehead");
                                x.value = x.value.toUpperCase();

                            });


                            function isNumber(evt) {
                                evt = (evt) ? evt : window.event;
                                var charCode = (evt.which) ? evt.which : evt.keyCode;
                                if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                                    return false;
                                }
                                return true;
                            }
                            </script>
                            <div class="col-sm-7">
                                <div class="panel panel-calendar">
                                    <div class="panel-heading panel-dark border-light">
                                        <h4 class="panel-title">Fee List</h4>
                                    </div>
                                    <div class="panel-body" id="feeList">
                                        <div class="row">
                                            <table class="table table-hover text-nowrap table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Sno</th>
                                                        <th>Fee Name</th>
                                                        <th>Fee Amount</th>
                                                        <th>Month</th>
                                                        <th>Update</th>
                                                        <th> Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                            if(isset($result)){
                                            $i = 1;
                                            foreach ($result->result() as $row){?>

                                                    <tr>
                                                        <td>
                                                            <?php echo $i;?> </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                id="feeName<?php echo $i;?>" size="12"
                                                                value="<?php echo $row->fee_head_name;?>" />
                                                            <span id="name1" style="color:red;"></span>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                id="feeAmount<?php echo $i;?>" size="12"
                                                                value="<?php echo $row->fee_head_amount;?>"
                                                                onkeypress="return isNumber(event)" />
                                                        </td>
                                                        <td>
                                                            <select class="form-control" id="month<?php echo $i;?>">
                                                                <?php 


                                                                 $fsdval=$this->session->userdata('fsd');

                                                $this->db->where('id',$fsdval);
                                                $fsd_id=$this->db->get('fsd')->row();
                                                $startdate=$fsd_id->finance_start_date;
                                                $enddate=$fsd_id->finance_end_date;
                                                 $tdate=(int)(date('m', strtotime($startdate)));

                                                 $edate=(int)(date('m', strtotime($enddate)));

 
                                                 
                                                      $ft=$tdate;  $loop = 12/$mgap; 
                                                   for($s = 1 ; $s <= $loop; $s++)
                                                 {
                                                     if($ft>12){
                                                      $ft=$ft-12;}        
                                        $month_name = date("F",mktime(0,0,0,$ft,1,date("Y"))); ?>
                                                                <option value="<?php echo $ft; ?>"
                                                                    <?php if($ft == $row->taken_month): echo ' selected="selected"'; endif; ?>>
                                                                    <?php echo $month_name;?></option>
                                                                <?php
                                          $ft = $mgap+$ft;
                                              }
                                              ?>
                                                                <option value="13"
                                                                    <?php if("13" == $row->taken_month): echo 'selected="selected"'; endif; ?>>
                                                                    All</option>
                                                            </select>
                                                        </td>
                                                        <td> <input type="hidden" id="rowSno<?php echo $i;?>" size="20"
                                                                value="<?php echo $row->id;?>">

                                                            <a href="#" class="btn btn-primary"
                                                                id="editfee<?php echo $i;?>"><i class="fa fa-edit"></i>
                                                                Edit</a></td>
                                                        <td> <a href="#" class="btn btn-danger"
                                                                id="deletefee<?php echo $i;?>"><i
                                                                    class="fa fa-trash-o"></i> Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                            $i++;
                                    }?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                <?php for($j = 1; $j < $i; $j++){ ?>

                                $("#editfee<?php echo $j; ?>").click(function() {
                                    var classid = $("#classshow").val();
                                    //   var stream = $("#streamListfee").val();
                                    //  var section = $("#sectionfee").val();
                                    var feeName = $("#feeName<?php echo $j; ?>").val();
                                    var feeAmount = $('#feeAmount<?php echo $j; ?>').val();
                                    var month = $('#month<?php echo $j; ?>').val();
                                    var rowSno = $('#rowSno<?php echo $j; ?>').val();
                                   // alert(classid + feeName + feeAmount + rowSno);
                                    $.post("<?php echo site_url('configureFeeController/updatefee') ?>", {
                                        feeName: feeName,
                                        feeAmount: feeAmount,
                                        classid: classid,
                                        month: month,
                                        rowSno: rowSno
                                    }, function(data) {
                                        $("#feeBox").html(data);
                                        //alert(data);
                                    })
                                });

                                $("#deletefee<?php echo $j; ?>").click(function() {
                                    var classid = $("#classshow").val();
                                    //var stream = $("#streamList").val();
                                    //  var section = $("#section").val();
                                    var feeName = $("#feeName<?php echo $j; ?>").val();
                                    var feeAmount = $('#feeAmount<?php echo $j; ?>').val();
                                    var month = $('#month<?php echo $j; ?>').val();
                                    var rowSno = $('#rowSno<?php echo $j; ?>').val();
                                    //alert(streamName);
                                    $.post("<?php echo site_url('configureFeeController/deletefee') ?>", {
                                        feeName: feeName,
                                        feeAmount: feeAmount,
                                        classid: classid,
                                        month: month,
                                        rowSno: rowSno
                                    }, function(data) {
                                        $("#feeBox").html(data);
                                        //alert(data);
                                    })
                                });


                                var input = document.getElementById("feeName<?php echo $j; ?>");
                                input.addEventListener("keyup", function() {
                                    // var text_value = document.getElementById("feeName<?php echo $j; ?>").value;
                                    // if (!text_value.match(/^[A-Za-z]+$/)) {
                                    //     document.getElementById("name1").innerHTML = "Only Character Allow";
                                    //     $('#editfee<?php echo $j; ?>').attr('disabled', 'disabled');

                                    //     $(document).on('click', 'a', function(e) {
                                    //         if ($(this).attr('disabled') == 'disabled') {
                                    //             e.preventDefault();
                                    //         }
                                    //         window.location.reload();
                                    //     });
                                    //     document.getElementById("feeName<?php echo $j; ?>").focus();
                                    //     if (text_value == "") {
                                    //         document.getElementById("name1").innerHTML = " ";
                                    //         document.getElementById("feeName<?php echo $j; ?>").focus();
                                    //         window.location.reload();
                                    //     }
                                    // }
                                });

                                input.addEventListener("keyup", function() {
                                    var x = document.getElementById("feeName<?php echo $j; ?>");
                                    x.value = x.value.toUpperCase();

                                });


                                function isNumber(evt) {
                                    evt = (evt) ? evt : window.event;
                                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                                    if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                                        return false;
                                    }
                                    return true;
                                }
                                <?php } ?>
                                </script>
                                <?php
            }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end: INLINE TABS PANEL -->
</div>
<?php
}

            function updatefee()
            {
                $clName = $this->input->post("classid");
                //$stream = $this->input->post("stream");
                //$section = $this->input->post("section");
                $feeName =$this->input->post("feeName");

                $feeAmount = $this->input->post("feeAmount");
                $month = $this->input->post("month");
                $rowSno = $this->input->post("rowSno");
                    if($month=="All")
                    {
                        $month=13;
                    }
                $data = array(
                        "taken_month" => $month,
                        "fee_head_name" => $feeName,
                        "fee_head_amount" => $feeAmount,
                        "update_date"=> date('Y-m-d h:i:s')
                    //  "school_code"=>$this->session->userdata("school_code")
                );

                $this->load->model("configurefeemodel");
                $result = $this->configurefeemodel->updatefeedetail($data,$rowSno);
                if($result)
                {
                $this->getFeeHead();
                }
                else
                {

            echo "Something Error In Update Class Fee!please try to after sometime";

                }

            }
                // $tablename = "class_fees";


                // $this->db->select("student_id");
                // $this->db->where("school_code",$this->session->userdata('school_code'));
                // $this->db->where("class_id",$clName);
                // $this->db->where("section",$section);
                // //$this->db->where("stream",$stream);
                // $getdata = $this->db->get("student_info");
                // if($getdata->num_rows()>0){
                //  $getelement = $getdata->result();
                //  foreach($getelement as $row):
                //  $this->db->where("school_code",$this->session->userdata('school_code'));
                //  $this->db->where("student_id",$row->student_id);
                //  $this->db->where("status","pending");
                //  $getrowfee  = $this->db->get("fee_deposit");
                //  if($getrowfee->result()>0){
                //      $upfeedata =  $getrowfee->result();

                //      foreach($upfeedata as $ty):
                //      for($m=1;$m<13;$m++){
                //          $temname = "fee_head_name".$m;
                //          if($ty->$temname == $feeName){
                //              $tempamount = "fee_head_amount".$m;
                //              $diffamount  = $feeAmount - $ty->$tempamount;
                //              $dataf = array(
                //                  $tempamount   =>  $feeAmount,
                //                  'total'  =>$ty->total+$diffamount
                //              );
                //              $this->db->where("id",$ty->id);
                //              $this->db->update("fee_deposit",$dataf);
                //          }
                //      }
                //      endforeach;
                //  }
                //  endforeach;
                // }else{


            function deletefee(){
                $clName = $this->input->post("classid");
            //  $stream = $this->input->post("stream");
            //  $section = $this->input->post("section");
                ///$feeName = $this->input->post("feeName");

                ///$feeAmount = $this->input->post("feeAmount");
                //$month = $this->input->post("month");
                $rowSno = $this->input->post("rowSno");
                //$tablename = "class_fees";
                $this->load->model("configurefeemodel");
                $result = $this->configurefeemodel->deletefeedetail($rowSno);
                if($result)
                {
                $this->getFeeHead();
                }
            else
                {
                     echo "Something Error In Delete Class Fee!please try to after sometime";

                 }
            }

         function insertdiscount(){
            if(strlen($this->input->post("dhead"))>0){
            $data['discount_head']  =   $this->input->post("dhead");}
            else{
            $data['discount_head']  =   $this->input->post("dtype");
            }
            $data['discount_amount']    =   $this->input->post("damount");
            $data['discount_persent']   =   $this->input->post("dper");
            $data['applied_date']   =   $this->input->post("applied_date");
            $data['applied_head_id']    =   $this->input->post("mannual");
            $data['school_code']    =   $this->session->userdata("school_code");
            $this->db->insert("discounttable",$data);
            echo "Success";
        }

        function updatediscount(){
            $sno= $this->input->post("sno");
            $data=array(
              'discount_head'=>$this->input->post("dhead"),
              'discount_amount'=>$this->input->post("damount"),
            'discount_persent'=>$this->input->post("dper"),
            'applied_date'=>$this->input->post("applied_date"),
            'applied_head_id'=>$this->input->post("mannual"),
            //'school_code'=>$this->session->userdata('school_code')
                 );
             // $this->db->where("school_code",$this->session->userdata('school_code'));    
              $this->db->where("id",$sno); 
             $this->db->update("discounttable",$data);
               echo "Edited";
           
        }
        function deletediscount(){

            $sno    =   $this->input->post("sno");
            $this->load->model("configurefeemodel");
            $tablename = "discounttable";
            $result = $this->configurefeemodel->delete1($tablename,$sno);
        echo "Deleted";
        }

        function insertVehicle(){
           
           // $this->load->model("configurefeemodel");
             $data['vehicle_name']        =    $this->input->post("vehicle_name");
             $data['vehicle_numnber']    =    $this->input->post("vehicle_number");
             $data['driver_name']        =    $this->input->post("driver_name");
             $data['driver_mn']        =    $this->input->post("dr_mobile");
             $data['conductor_name']        =    $this->input->post("conductor_name");
             $data['school_code']        =    $this->session->userdata("school_code");
             $this->load->model("configurefeemodel");
             if((strlen($this->input->post("vehicle_name"))>0) && (strlen($this->input->post("vehicle_number"))>0)){
             $this->configurefeemodel->insert_transport($data);}
            $result= $this->configurefeemodel->getvehicle();
            if($result->num_rows()>0){?>

            <div class="panel-body">
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="driver">
							   
								<thead>
								<tr>
                                    <th>Sno</th>
                                    <th>Vehicle</th>
                                    <th>Number</th>
                                    <th>Driver</th>
                                    <th>Driver Mobile</th>
                                    <th>Conductor</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
								</thead>
								<tbody>
                                <?php $i=1; $j=1; foreach($result->result() as $row):?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><input type="text" value="<?php echo $row->vehicle_name;?>" class="form-control"
                                            id="vname<?php echo $i;?>" onkeyup="function1()" onkeyup="function2()" /></td>
                                    <td><input type="text" value="<?php echo $row->vehicle_numnber;?>" class="form-control text-uppercase"
                                            id="vnumber<?php echo $i;?>" /></td>
                                    <td><input type="text" value="<?php echo $row->driver_name;?>" class="form-control"
                                            id="dname<?php echo $i;?>" onkeyup="function1()" onkeyup="function2()" /></td>
                                    <td><input type="number" value="<?php echo $row->driver_mn;?>" class="form-control"
                                            id="dmobile<?php echo $i;?>" maxlength="10"/></td>
                                    <td><input type="text" value="<?php echo $row->conductor_name;?>" class="form-control"
                                            id="cname<?php echo $i;?>" onkeyup="function1()" onkeyup="function2()" /></td>
                                    <td> <input type="hidden" id="rowSno<?php echo $i;?>" size="20" value="<?php echo $row->id;?>">

                                        <a href="#" class="btn btn-primary" id="editvehicle<?php echo $i;?>"><i class="fa fa-edit"></i>
                                            Edit</a></td>
                                    <td> <a href="#" class="btn btn-danger" id="deletevehicale<?php echo $i;?>"><i
                                                class="fa fa-trash-o"></i>
                                            Delete</a>
                                    </td>
                                </tr>
							
    <script>
            $("#editvehicle<?php echo $i; ?>").click(function() {
                var vname = $("#vname<?php echo $i;?>").val();
                var vnumber = $("#vnumber<?php echo $i;?>").val();
                var dname = $("#dname<?php echo $i;?>").val();
                var dmobile = $("#dmobile<?php echo $i;?>").val();
                var cname = $("#cname<?php echo $i;?>").val();
                var rowSno = $('#rowSno<?php echo $i;?>').val();
                //alert(vname+rowSno+vnumber+dname+cname);

                $.post("<?php echo site_url('index.php/configureFeeController/editVehicle') ?>", {
                    cname: cname,
                    dname: dname,
                    dmobile: dmobile,
                    vnumber: vnumber,
                    vname: vname,
                    rowSno: rowSno
                }, function(data) {
                    $("#editvehicle<?php echo $i;?>").html(data);
                    //alert(data);
                })
            });

            $("#deletevehicale<?php echo $i; ?>").click(function() {

                var rowSno = $('#rowSno<?php echo $i; ?>').val();
                //alert(rowSno);
                $.post("<?php echo site_url('configureFeeController/deleteVehicle') ?>", {
                    rowSno: rowSno
                }, function(data) {
                    $("#editvehicle<?php echo $i;?>").html(data);
                    //alert(data);
                })
            });

            var input = document.getElementById("vname<?php echo $i;?>");
            input.addEventListener("keyup", function() {

            });

            input.addEventListener("keyup", function() {
                var x = document.getElementById("vname<?php echo $i;?>");
                x.value = x.value.toUpperCase();

            });
            var input = document.getElementById("cname<?php echo $i;?>");
            input.addEventListener("keyup", function() {

            });

            input.addEventListener("keyup", function() {
                var x = document.getElementById("cname<?php echo $i;?>");
                x.value = x.value.toUpperCase();

            });

            var input = document.getElementById("dname<?php echo $i;?>");
            input.addEventListener("keyup", function() {

            });

            input.addEventListener("keyup", function() {
                var x = document.getElementById("dname<?php echo $i;?>");
                x.value = x.value.toUpperCase();

            });
            	
            </script>
            <?php $i++; $j++; endforeach;?>
            	</tbody>
							</table>
						</div>
					</div>
                </div>
<?php

            }else{
                ?>
<table>
    <tr>
        <th>Vehicle Name</th>
        <th>Number</th>
        <th>Driver</th>
        <th>Mobile</th>
        <th>Conductor</th>
    </tr>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>

</table>
<?php

            }
        }


    function editVehicle(){
            $data['vehicle_name']        =    $this->input->post("vname");
            $data['vehicle_numnber']    =    $this->input->post("vnumber");
            $data['driver_name']        =    $this->input->post("dname");
            $data['driver_mn']        =    $this->input->post("dmobile");
            $data['conductor_name']        =    $this->input->post("cname");
            $data['school_code']        =    $this->session->userdata("school_code");
            $uprow = $this->input->post("rowSno");
            $this->load->model("configurefeemodel");
            $tablename = "transport";
            if($this->configurefeemodel->update1($tablename,$data,$uprow)){
        echo "Edited";
            }
        }

        function deleteVehicle(){
            $sno    =    $this->input->post("rowSno");
            $this->load->model("configurefeemodel");
            $tablename = "transport";
            $result = $this->configurefeemodel->deletetransport($tablename,$sno);
            echo "deleted";
        }
        function insert_root(){
            $data['v_id']        =    $this->input->post("vehicle_number");
            $data['pickup_points']    =    $this->input->post("vehicle_pickup");
            $data['drop_points']        =    $this->input->post("drop_points");
            $data['root']        =    $this->input->post("vahicle_root");
            $data['transport_fee']        =    $this->input->post("transport_fee");

            if((strlen($this->input->post("vehicle_number"))>0)&&(strlen($this->input->post("vehicle_pickup"))>0)&&(strlen($this->input->post("transport_fee"))>0)){
            $this->db->insert("transport_root_amount",$data);}
            $this->load->model("configurefeemodel");
            $result = $this->configurefeemodel->getroot();
            if($result->num_rows()>0){?>
             <div class="panel-body">
					<div class="table-responsive">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="transportsearch">
						    <thead>
							<tr>
                            <th>Sno</th>
                            <th>Vehicle Name</th>
                            <th>Number</th>
                            <th>Driver Name</th>
                            <th>Conductor Name</th>
                            <th>Pickup Points</th>
                            <th>Drop Points</th>
                            <th>Root</th>
                            <th>Transport Fee</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            </tr>
							</thead>
					<tbody>
                    <?php $i=1;foreach($result->result() as $res):
                    $this->db->where("v_id",$res->id);
                    $fdata = $this->db->get("transport_root_amount");
                    if($fdata->num_rows()>0){
                    foreach($fdata->result() as $row):
                    ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $res->vehicle_name;?></td>
                <td><?php echo $res->vehicle_numnber;?></td>
                <td><?php echo $res->driver_name;?></td>
                <td><?php echo $res->conductor_name;?></td>
                <td><?php echo $row->pickup_points;?></td>
                <td><?php echo $row->drop_points;?></td>
                <td><?php echo $row->root;?></td>
                <td><input type="text" value="<?php echo $row->transport_fee;?>" class="form-control" id="trans_fee<?php echo $i;?>" /></td>
                <td><input type="hidden" id="rowSno1<?php echo $i;?>" size="20" value="<?php echo $row->id;?>">
                    <a href="#" class="btn btn-primary" id="editroot1<?php echo $i;?>"><i class="fa fa-edit"></i>Edit</a>
                </td>
                <td>
                    <input type="hidden" id="rowSno1<?php echo $i;?>" size="20" value="<?php echo $row->id;?>">
                    <a href="#" class="btn btn-danger" id="deleteroot1<?php echo $i;?>"><i class="fa fa-delete"></i>Delete</a>
                </td>
            </tr>
            <script>
                $("#editroot1<?php echo $i; ?>").click(function() {
                    var transfee = $("#trans_fee<?php echo $i;?>").val();
                    var rowSno = $('#rowSno1<?php echo $i;?>').val();
                    $.post("<?php echo site_url('configureFeeController/edittransfee') ?>", {
                        transfee: transfee,
                        rowSno: rowSno
                    }, function(data) {
                        $("#editroot1<?php echo $i;?>").html(data);
                        //alert(data);
                    })
                });
                $("#deleteroot1<?php echo $i; ?>").click(function() {
                    var rowSno = $('#rowSno1<?php echo $i;?>').val();
                    $.post("<?php echo site_url('configureFeeController/deletetransfee') ?>", {
                        rowSno: rowSno
                    }, function(data) {
                        $("#deleteroot1<?php echo $i;?>").html(data);
                        //alert(data);
                    })
                });
                </script>
                <?php $i++; endforeach; }?>
           
     
                
                <?php   endforeach; ?>
            
								</tbody>
							</table>
						</div>
					</div>
                </div>
        </div>
        
        <?php }
            
        }


        function edittransfee(){
            $data = array(
                    'transport_fee' =>$this->input->post("transfee")
            );
            // $updatedfee = $this->input->post("transfee");
            // $cdate=date("Y-m-d");
            // $rt=0;
            $this->db->where("id",$this->input->post("rowSno"));
            $this->db->update("transport_root_amount",$data);
            echo "Updated";
            ?><script>
           alert("Student fee Record updated successfully");
           </script><?php


         }
            function apply_method()
    {
        $hid = $this->input->post("head");
        $lfee = $this->input->post("latefee");
        $latef = $this->input->post("lateamt");
        $data1=array(
            'apply_method'=>$hid,
            'apply_cat'=>$lfee,
            //'late_fee'=>$latef,
           // 'school_code'=>$this->session->userdata('school_code')
            );
        $this->load->model('configurefeemodel');
        $modelList = $this->configurefeemodel->apply_method($data1);
        //echo(json_encode($modelList));
        if($modelList){
            redirect('login/configureFee');
        }

    }
    
            
            function getfeeheadcat(){
		$classid = $this->input->post("classid");
		$this->load->model("subjectModel");
		$result = $this->subjectModel->getSubject($classid);
		?>
			<div class="col-sm-12">
				<!-- start: INLINE TABS PANEL -->
				<div class="panel panel-white">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="tab-pane fade in active" id="myTab_example1">
									<div class="row">
									<div class="col-sm-12">
											<div class="panel panel-calendar">
												<div class="panel-heading panel-grey border-light">
													<h4 class="panel-title">select fee head and category</h4>
												</div>
												<div class="panel-body">
														<table class="table table-striped table-hover center table-responsive" id="sample-table-3" style="border:3px solid green;" >
						<thead class="text-blue text-large" style="border:3px solid green;">
							<tr>
								<th style="border:1px solid green;">SNo.</th>
								<th style="border:1px solid green;">Fee Head</th>
								<th style="border:1px solid green;">Fee Category</th>
							    <th style="border:1px solid green;">Action</th>
							</tr>
						</thead>
						<tbody style="border:3px solid green;">
						
							<?php $i = 1;
							                           $this->db->where("class_id",$classid);
							                           $this->db->where("fsd",$this->session->userdata('fsd'));
														$result = 	$this->db->get("class_fees");
														if($result->num_rows()>0){
														    foreach($result->result() as $row):
							 ?>
							<tr><span id="name4" style="color:red;"></span>
								<td style="border:1px solid green;"><b><?php echo $i; ?></b><input type="hidden" id="id<?php echo $i;?>" value="<?php echo $row->id; ?>"/></td>
								<td style="border:1px solid green;"><input type="text" id="clName<?php echo $i; ?>" value="<?php echo $row->fee_head_name;?>" size="10" readonly></td>
							<?php  
							$this->db->where("school_code",$this->session->userdata("school_code"));
							$feecat = $this->db->get("fee_cat");
							if($feecat->num_rows()>0){ 
							?>
								<td style="border:1px solid green;">
								    <select id="ccode<?php echo $i; ?>" name ="ccode<?php echo $i;?>" class="form-control">
								        <option value="0">--select category--</option>
								        <?php foreach($feecat->result() as $row1):  ?>
								        
								       <option value="<?php echo $cid= $row1->id;?>" <?php if($row1->id == $row->cat_id): echo 'selected="selected"'; endif; ?> >
											<?php echo $row1->cat_name;?>
										</option>
								        <!--<option value="<?php echo $cid= $row1->id;?>" ><?php echo $row1->cat_name; ?></option>-->
								        <?php endforeach; ?>
								        </select>
			
								        
								</td>
								 <?php  }else{
								    echo "<td style='border:1px solid green;'><strong style='color:red;'>Define Category First</strong></td>";
								 }?>
								 
								<td style="border:1px solid green;">
									<button  class="btn btn-purple btn-sm" id="editcat<?php echo $i; ?>">
			                    		<i class="fa fa-edit"></i> &nbsp;Update
			                    	</button>
			                    	
			                    	
			                        <button class="btn btn-red btn-sm" id="deletecat<?php echo $i; ?>">
			                    		<i class="fa fa-trash-o"></i> &nbsp;Reset
			                    	</button>
			                    	
			                    		<script>
    				$("#editcat<?php echo $i; ?>").click(function(){
    				var id = $("#id<?php echo $i; ?>").val();
    				var clName = $("#clName<?php echo $i; ?>").val();
    				var ccode = $("#ccode<?php echo $i; ?>").val();
    				//alert(id +" , "+ clName +" , "+ ccode);
    				$.post("<?php echo site_url('index.php/configureFeeController/updatefeecat')?>",
    						{   id : id,
    							clName : clName,
    							ccode : ccode
    						},
    						function(data){
    							$("#editcat<?php echo $i; ?>").html(data);
    						}
    				);
    			});

			$("#deletecat<?php echo $i; ?>").click(function(){
				var id = $("#id<?php echo $i; ?>").val();
				var clName = $("#clName<?php echo $i; ?>").val();
				var ccode = $("#ccode<?php echo $i; ?>").val();
				alert(id +" , "+ clName +" , "+ ccode);
				$.post("<?php echo site_url('index.php/configureFeeController/resetfeecat')?>",
						{
							id : id,
							clName : clName,
							ccode : ccode
						},
						function(data){
							$("#deletecat<?php echo $i; ?>").html(data);
						});
			});			    
								    
								</script>
								        
								</td>
								
							</tr>
							<?php $i++; endforeach; }
							?>
						</tbody>
					</table>
					</div>
										</div>
										</div>
										</div>
									</div>
								</div>														
							</div>
						</div>
					</div>
				</div>
				<!-- end: INLINE TABS PANEL -->
			</div>
		<?php 
	}
	public function updatefeecat(){
	    $rowId = $this->input->post("id");?>
	   
	    <?php
	    //echo $rowId;
					$data = array(
						
							"cat_id" => $this->input->post("ccode")
					);
					$this->load->model('configureClassModel');
					if($this->configureClassModel->updatefeecat($data,$rowId)){
					echo "Success";
					}
				}
				
			public function resetfeecat(){
                $rowId = $this->input->post("id");
               // echo $rowId;
                $data = array(
                    "cat_id" => 0
            				);
				$this->load->model('configureClassModel');
				if($this->configureClassModel->updatefeecat($data,$rowId)){
				echo "Reset Done!!";
				}
			}
				//---------------------------------------------//
	
	
	


        function deletetransfee(){

           // $this->db->where("school_code",$this->session->userdata('school_code'));
            $this->db->where("id",$this->input->post("rowSno"));
            $this->db->delete("transport_root_amount");
            echo "Deleted";

        }
        function getDiscountd(){
            $this->db->where("school_code",$this->session->userdata('school_code'));
            $discountRow = $this->input->post("discountBox");
            $this->db->where("sno",$discountRow);
            $try = $this->db->get("discounttable")->row();



            if(($try->discount_amount > 0.00)||($try->discount_persent > 0.00)){

                $data = array(
                    "discountValue" => $try->discount_amount > 0.00 ?  $try->discount_amount : $try->discount_persent,
                    "isPercent" => $try->discount_amount > 0.00 ?  false : true,
                    "discountColumn" => $try->mannual
               );

                echo json_encode($data);

            }
            else{
                $data = array(
                    "discountValue" => 0.00,
                    "isPercent" => false,
                    "discountColumn" => ''
                );

                echo json_encode($data);
            }
        }
 	
 }?>