<!-- start: PAGE CONTENT -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>

<div class="row">
  <div class="col-sm-12">
    <!-- start: INLINE TABS PANEL -->
    <div class="panel panel-white">
      
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="tabbable">
              <ul id="myTab" class="nav nav-tabs">
                <li class="active">
                  <a href="#myTab_example1" data-toggle="tab">
                    <i class="green fa fa-home"></i> Add Fee Category
                  </a>
                </li>
                <li>
                  <a href="#myTab_example2" data-toggle="tab">
                    <i class="green fa fa-home"></i> Configure Fees 
                  </a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade in active" id="myTab_example1">
                  <div class="alert panel-pink">
                    <button data-dismiss="alert" class="close">×</button>
                    <h3 class="media-heading text-center">Welcome to Fee Category Section</h3>
                    <a class="alert-link" href="#"></a>
                     Please type Fee Category name into the box given below the add Fee Category
                      and press <strong>Add Category </strong> Button.To <strong>Edit</strong> existing Category, edit
                      it's name and press <strong>Edit</strong> Button , And to <strong>Delete</strong> a Category, simply press <strong>Delete</strong> Button.
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="panel panel-calendar">
                        <div class="panel-heading panel-blue border-light">
                          <h4 class="panel-title">Add Fee Category</h4>
                        </div>
                        <form action="<?php echo base_url();?>index.php/configureClassControllers/addfeecategory1" method="post">
                        <div class="panel-body">
                          <div class="text-black text-large">
                            <span id="name" Style="color:red;"></span>
                            <input type="text" id="addfeecategory" name="stream" class="text-uppercase" style="border:1px solid">
                            <!-- <a href="index.php/configureClassControllers/addfeecategory1" class="btn btn-sm btn-blue" id="addfeecatButton1"><i class="fa fa-check"></i>
                              Add Category</a> -->
                                   <input type="submit" value="Add Category" class="btn btn-sm btn-light-blue">
                              <br><br><br>
                            <div class="alert alert-warning"> Type a Category name and press Add Category.If Category added
                              successfully then it show in right side panel where you can change the name and Delete it.
                            </div>
                          </div>
                        </div>
                      </form>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="panel panel-calendar">
                        <div class="panel-heading panel-green border-light">
                          <h4 class="panel-title">Category List</h4>
                        </div>
                        <div class="panel-body" id="feeList12">
                          <?php 
                        $query = $this->db->get("fee_cat");
    

if($query->num_rows()>0):
$i = 1;
  foreach ($query->result() as $row):
   
?>
    <div class="text-white text-sm pull-left space10">
      <span id="name2" Style="color:red;"></span>
      <input type="text" id="streamValue<?php echo $i;?>" size="13" value="<?php echo $row->cat_name;?>" class="text-uppercase" >
      <input type="hidden" id="streamId<?php echo $i;?>" size="13" value="<?php echo $row->id; ?>">
      <a href="#" class="btn btn-sm btn-light-green" id="edit<?php echo $i;?>"><i class="fa fa-edit"></i> Edit</a>
      <a href="#" class="btn btn-sm btn-light-green" id="delete<?php echo $i;?>"><i class="fa fa-trash-o"></i> Delete</a>
    </div>
    
<?php
  $i++;
  endforeach;
endif;
?>

                        </div>
												<div class="container">
                        <div class="alert alert-success">
                          You can <strong>Edit </strong> or <strong>Delete </strong>
                          Category by press concern Button .</div>
                      </div>
											</div>
                    </div>
                  </div>
                </div>
                
                
                
                <div class="tab-pane fade" id="myTab_example2">
                  <!-- start: PAGE CONTENT -->
						<div class="row">
							<div class="col-sm-12">
								<!-- start: INLINE TABS PANEL -->
								<div class="panel panel-white">
									<div class="panel-body">
										<div class="alert alert-info">
											<center><h3 class="media-heading"><b>Welcome To  Configure Fees section</b></h3></center>
                    						<p class="media-timestamp">
                    						    This is the Second Phase of Fee Category where we can see and update Fee Category by Class Wise. firstly you must need to select Trade ,Unit,
                    						    Shift respectively.after then you can see the list of Fees Category to update.
                    						<p class="media-timestamp">
                    						For	Update Fee Category  given in the chart below, press <strong>edit </strong>button And to <strong>Delete</strong> a Fee Category simply press <strong>delete</strong> button below the chart.
                    						</p>
										</div>
                    <div class="row">
                       <div class="col-sm-4">
                       <div class="panel">
                            <div class="panel-heading btn-dark-green">
                              <h3 class="panel-title">Trade</h3>
                            </div>
                            <div class="panel-body">
                              <div class="form-group">
                                <select id="streamListshow" class="form-control">
                                  <option value="">Select Trade Name</option>
                                  <?php
                                          $this->load->model("configurefeemodel");
                                        $result = $this->configurefeemodel->getStreamList();
                                        $streamList = $result->result();
                                        if(isset($streamList)):?>
                                  <?php foreach ($streamList as $row):?>
                                  <?php //$this->db->where("school_code",$this->session->userdata("school_code"));
                                                                    $this->db->where('id',$row->streem);
                                                          $row1=$this->db->get('stream');
                                                          if($row1->num_rows()>0){
                                                              $row2 =$row1->row();
                                                                    ?>

                                  <option value="<?php echo $row2->id;?>">
                                    <?php echo $row2->stream;?></option>
                                  <?php } endforeach; endif;?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>

                      

                       <div class="col-sm-4">
                          <div class="panel">
                            <div class="panel-heading btn-dark-red">
                              <h3 class="panel-title">Unit</h3>
                            </div>
                            <div class="panel-body">
                              <div class="form-group">
                                <select id="sectionshow" class="form-control">

                                </select>
                              </div>
                            </div>
                          </div>
                        </div>

                      <div class="col-sm-4">
                          <div class="panel">
                            <div class="panel-heading btn-dark-purple">
                              <h3 class="panel-title">Shift</h3>
                            </div>
                            <div class="panel-body">
                              <div class="form-group">
                                <select id="classshow" class="form-control">

                                </select>
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
						
		<div class="row" id="subjectBox">
		</div>
						
					
						<!-- end: PAGE CONTENT-->
                    </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end: INLINE TABS PANEL -->
    </div>
  </div>
</div>
<!-- end: PAGE CONTENT-->
<script>
        <?php for($j = 1; $j < $i; $j++){ ?>
                $("#edit<?php echo $j; ?>").click(function(){
                    var streamId = $('#streamId<?php echo $j; ?>').val();   
                    var streamName = $('#streamValue<?php echo $j; ?>').val();
                    //alert(streamId);
                    var form_data = {
                            streamId : streamId,
                            streamName : streamName
                        };
                $.ajax({
                    url: "<?php echo site_url("index.php/configureClassControllers/updatecatforfee") ?>",
                    type: 'POST',
                    data: form_data,
                    success: function(msg){
                        $("#streamList1").html(msg);
                    }
                });
                });
    
                $("#delete<?php echo $j; ?>").click(function(){
                    var streamId = $('#streamId<?php echo $j; ?>').val();   
                    alert("Are You Sure , You want to delete your fee category");
                    $.post("<?php echo site_url('index.php/configureClassControllers/deletefeecat') ?>", {streamId : streamId}, function(data){
                        $("#streamList1").html(data);
                        //alert(data);
                    })
                });
     
                    var input = document.getElementById("streamValue<?php echo $j;?>");
                         input.addEventListener("keyup", function () {
                     
                         });

                         input.addEventListener("keyup", function () {
                          var x = document.getElementById("streamValue<?php echo $j;?>");
                             x.value = x.value.toUpperCase();
                         
                  });
                    <?php } ?>   
</script>