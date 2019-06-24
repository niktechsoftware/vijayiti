<!-- start: PAGE CONTENT -->
<div class="row">
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
								<div class="panel panel-white">
			<div class="panel-heading">
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
				<div class="row">
					<div class="col-sm-12">
						<div class="tabbable">
							<ul id="myTab" class="nav nav-tabs">
								<li class="active">
									<a href="#myTab_example1" data-toggle="tab">
										<i class="green fa fa-money"></i> Cash Payment
									</a>
								</li>
								<li>
									<a href="#myTab_example2" data-toggle="tab">
										<i class="green fa fa-bank"></i> Bank Transaction
									</a>
								</li>
								<li>
									<a href="#myTab_example3" data-toggle="tab">
										<i class="green fa fa-user"></i> Direction Transaction
									</a>
								</li>
							</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="myTab_example1">
								<div class="row">
									<div class="col-sm-12">
				                        <form method="post" action="<?php echo base_url()?>index.php/dayBookControllers/cashPaymentDb">
				                      		<table class="table">
				                        		<tr>
				                        			<td>
							                        	<label>Employee ID <span style="color:#F00">*</span></label> 
							                            <select id="stu_emp_id" name="id_name" style="width:150px;" required>
							                                <option value="">-Item Id-</option>
							                                <option value="Employee Id"> Employee Id </option>
							                                <option value="other"> Other </option>
							                            </select>
							                       </td>
							                        <td>
							                            <label id="valid_id">Enter Valid ID</label>
							                            <input id="emp_id" name="emp_id" style="width:150px;" type="text"/>
							                        </td>
							                        <td>
							                        	<label id="Other_name">Name</label>
							                            <input id="name" name="name" style="width:200px;" type="text"/>
							                            <label id="Other_phno">Phone No</label>
							                            <input id="phone_no" name="phone_no" style="width:200px;" type="text"/>
							                        </td>
				                        			<td id="check_valid_id"></td>
				                         		</tr>
				                         	</table>
				                         	<table class="table">
				                         		<tr>
				                         			<td>
				                        				<label id="res">Reason  <span style="color:#F00">*</span></label>
				                        			</td>
				                            		<td>
				                            			<textarea name="reason" cols="60" rows="6" required></textarea>
				                            		</td>
				                            		<td>
				                            			<span id="balance"></span><br/>
							                            <label id="am">Amount <span style="color:#F00">*</span></label>
							                            <input id="amount" name="amount" style="width:150px;" type="text" required/>
				                        			</td>
				                        		</tr>
				                        	</table>
					                         <div class="form-group" style="margin-top:30px">
					                              	<div class="form-group" align="right">
					                              		<input class="submit btn btn-blue" type="submit" value="Save &amp; Print Slip" />
					                              	</div>
					                          </div>
				                       	</form>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="myTab_example2">
								<div class="row">
									<div class="col-sm-12">
										<div class="panel panel-calendar">
											<div class="panel-heading panel-blue border-light">
												<h4 class="panel-title">Section List</h4>
											</div>
											<form method="post" action="db_files/bank_transaction_db.php">
					                        <fieldset style="padding:20px; border-radius:20px;">
					                        	<legend>Bank Transaction Detail</legend>
					                            <div class="form-group">
					                              	<div class="form-group" align="center">
					                                	<table width="60%">
					                                	<tr>
					                                        <td><a href="prev_withdrawal.php" class="submit btn btn-blue">Previous Deposite</a></td>                                        <td><a href="prev_deposit.php" class="submit btn btn-blue">Privious Withdrawal</a></td>                                        <td><a href="#" class="submit btn btn-blue">Bank Register</a></td>
					                                	</tr>
					                                 	</table>
					                                 </div>
					                       	</div>
					                        
					                        </fieldset>
					                        <fieldset style="padding:20px; border-radius:20px;">
					                        	<legend>Action</legend>
					                             <table width="100%" align="center">
					                        <tr>
					                        <td>
					                        	<label>Bank Transaction</label> &nbsp;&nbsp;&nbsp; <br>
					                            <select id="stu_emp_id" name="id_name" style="width:150px;" required>
					                                <option value="">-Item transaction-</option>
					                                <option value="deposite"> Deposite </option>
					                                <option value="receive"> Received </option>
					                            </select>
					                       </td>
					                        <td>
					                            <label id="valid_id">Bank Name</label> &nbsp;&nbsp;&nbsp;<br>
					                            <input id="emp_id" name="bank_name" style="width:150px;" type="text" required/>
					                        </td>
					                        <td>
					                        	<label id="Other_name">Account No</label> &nbsp;&nbsp;&nbsp;<br>
					                            <input id="name" name="account_no" style="width:200px;" type="text" required/>
					                        </td>
					                        <td>
					                        	<span id="balance"></span><br/>
					                            <label id="Other_phno">Amount</label> &nbsp;&nbsp;&nbsp;<br>
					                            <input id="amount" name="amount" style="width:200px;" type="text" required />
					                        </td>
					                        
					                        </tr>
					                        </table>
					                        </fieldset>
					                         <div class="form-group" style="margin-top:30px">
					                              	<div class="form-group" align="right">
					                              		<input class="submit btn btn-blue" type="submit" value="Save &amp; Print Slip" />
					                        </div>
					                       </form>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="myTab_example3">
								<div class="alert alert-info">
																<center><h4 class="media-heading">Important Instructions about class creation</h4></center>
                    <p class="media-timestamp">This is class creation area. You have to provide class name (Like 1st,8th,12th etc..) and select Class stream
               (Like : Science, Arts, Commerce etc.) If stream is not applicable then select (none of these). After this select 
               select section if applicable, otherwise none. Leave the <strong>teacher's id</strong> field blank. Update the <strong>teacher's id</strong> after it has been created. You can find the teacher's id in the employee detail section. </p>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="panel panel-calendar">
											<div class="panel-heading panel-purple border-light">
												<h4 class="panel-title">Add <span class="text-bold">New Class</span></h4>
											</div>
											<div class="panel-body" id="sectionList">
												<form class="form-horizontal" action="add_class_db.php" method="post" role="form" onsubmit="return validateForm()">                    
								                    <div class="form-group">
								                      <label for="inputStandard" class="col-lg-4 control-label">Class Name <span style="color:#F00">*</span></label>
								                      <div class="col-lg-7">
								                        <input type="text" id="className" class="form-control" placeholder="like : 1st, 10th, etc..." required />
								                      </div>
								                    </div>
								                    <div class="form-group">
								                      <label for="standard-list1" class="col-md-4 control-label">Select Stream <span style="color:#F00">*</span></label>
								                      <div class="col-md-7">
								                        <select class="form-control" id="classStream" required>
									                        <option value="">-Select Class Stream-</option>
		                                                    <option value="Art">Art</option>
		                                                    <option value="BIOLOGY">BIOLOGY</option>
		                                                    <option value="Math">Math</option>
		                                                    <option value="none">None</option>
								                        </select>
								                      </div>
								                    </div>
								                    <div class="form-group">
								                      <label for="standard-list1" class="col-md-4 control-label">Select Section <span style="color:#F00">*</span></label>
								                      <div class="col-md-7">
								                        <select class="form-control" id="classSection" required>
								                          	<option value="">-Select Class Section-</option>
		                                                    <option value="A">A</option>
		                                                    <option value="B">B</option>
	                                                  	</select>
								                      </div>
								                    </div>
								                    <div class="form-group">
								                      <label for="inputStandard" class="col-lg-6 control-label">
								                      	<button class="btn btn-purple btn-sm" id="showtoast">
								                    		<i class="fa fa-save"></i> &nbsp;Save
								                    	</button>
								                        <button class="btn btn-purple btn-sm" id="classReset">
								                    		<i class="fa fa-refresh"></i> &nbsp;Reset
								                    	</button>
								                      </label>
								                      <div class="col-lg-6">
								                    	&nbsp;
								                      </div>
								                   </div>
								               	</form>
											</div>
										</div>		
									</div>
									<div class="col-sm-6">
										<div class="panel panel-white">
											<div class="panel-heading panel-pink border-light">
												<h4 class="panel-title">Class <span class="text-bold">List</span></h4>
											</div>
											<div class="panel-body">
												<div class="panel-scroll height-200">
													<table class="table table-hover" id="sample-table-1">
														<thead>
															<tr>
																<th>SNo.</th>
																<th>Class Name</th>
																<th>Section</th>
																<th>Subject Stream</th>
															</tr>
														</thead>
														<tbody id="classDetail"></tbody>
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
		</div>
		<!-- end: INLINE TABS PANEL -->
		</div>
	</div>
</div>
<!-- end: PAGE CONTENT-->