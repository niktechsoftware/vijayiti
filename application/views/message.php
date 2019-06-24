
<div class="row">
	<div class="col-md-12">
		<!-- start: INBOX PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<h4 class="panel-title">Inbox</h4>
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
			<div class="panel-body messages">
				<div class="row">
		        	<div class="col-md-12">
		        		<div class="panel panel-white">
							<div class="panel-heading">
								<h5 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
									<i class="icon-arrow"></i> Compose Messege
								</a></h5>
							</div>
							<div id="collapseOne" class="panel-collapse collapse ">
								<div class="panel-body">
									<div id="sidebar-menu">
									
										<div id="msg"></div>
					          			<ul class="nav sidebar-nav">
			                        		<li> 
			                          			<ul id="sideFour" class="nav sub-nav" style="z-index:0;">
			                           	 			<li>
			                           	 				    <div class="form-group">
					                                          	<label for="inputStandard" class="col-lg-2 control-label">To</label>
					                                          	<div class="col-lg-10">
						                                            <input type="text" name="reciever" id="reciever" class="form-control" placeholder="Type Here Student/Employee...">
						                                          
					                                          	</div>
					                                        </div>
					                                        <div class="form-group">
					                                        	<label for="inputStandard" class="col-lg-2 control-label"></label>
					                                        	<div class="col-lg-10">&nbsp;</div>
					                                        </div>
					                                        <div class="form-group">
					                                          	<label for="inputStandard" class="col-lg-2 control-label">Subject</label>
					                                          	<div class="col-lg-10">
					                                            	<input type="text" name="subject" id="subject" class="form-control" placeholder="Type Here...">
					                                          	</div>
					                                        </div>
					                                        <div class="form-group">
					                                        	<label for="inputStandard" class="col-lg-2 control-label"></label>
					                                        	<div class="col-lg-10">&nbsp;</div>
					                                        </div>
					                                        <div class="form-group">
					                                        	<label for="inputStandard" class="col-lg-2 control-label">Your Message</label>
						                                        <div class="col-lg-10">
							                                        <div class="panel-body">
							                                        	<textarea  style="height:200px; width:100%;" name="message" id="message" rows="10"></textarea> 
							                                        </div>
						                                        </div>
					                                        </div>
					                                        <div >
					                                            <div >
					                                               
					                                                <button type="submit" id="submit" class="submit btn btn-blue" >Submit</button>
					                                            </div>
					                                            <div class="col-lg-2 form-group">
					                                                <input type="reset" class="submit btn btn-blue" value="Reset Message" />
					                                            </div>
					                                       </div>
			                            			</li>
			                          			</ul>
			                        		</li>
			            				</ul>
	            				
			        				</div>
								</div>
							</div>
						</div>
	            	</div>
	            </div>
<!-- --------------------------------------------------------- -->
          	<div class="row">
            	<div class="col-md-12">
            		<div class="panel">
            			<div class="panel-heading panel-visible">
		                  	<button type="button" class="btn btn-danger btn-gradient"> 
		                  		<span class="glyphicons glyphicons-inbox padding-right-sm"></span> Inbox 
		                  	</button>
                		</div>
                		<div class="panel-body">
                  			<div class="email-menu">
                  				<center><span id="del_msg"></span></center>
                    			<table class="table table-striped">
	                    			<thead>
	                    				<tr>
	                    					<td>#</td>
	                    					<td>Sender</td>
	                    					<td>Subject</td>
	                    					<td>Message</td>
	                    					<td>Date</td>
	                    					<td><span class="fa fa-trash-o"></span></td>
	                    				</tr>
	                    			</thead>
                      				<tbody>
									<?php
									$v=$this->session->userdata('username');
									$name=$this->session->userdata('name');
										$ides = $this->db->query("SELECT * FROM message WHERE reciever_id='$v'or reciever_id='$name'");
										$i=1;
									 	foreach($ides->result() as $msg):
									?>
				                        <tr>
				                        	<td> 
				                        		<?php echo $i; ?>
				                          	</td>
				                          	<td class="email-menu-date"> 
										  		<?php echo $msg->sender_id; ?>
				                          	</td>
				                          	<td class="email-menu-date"> 
										  		<?php echo $msg->subject; ?>
				                          	</td>
				                          	<td class="email-menu-date"> 
										  		<?php echo $msg->message; ?>
				                          	</td>
				                          	<td class="email-menu-date">
				                            	<input type="checkbox" id="del" value="<?php echo $msg->send_date; ?>" />
				                            </td>
				                        </tr>
											<?php $i++; endforeach; ?>
				                      </tbody>
			                      </table>
			                  </div>
			              </div>
			          </div>
			      </div>
		        <div class="col-md-8" id="msg_body"></div>
		      </div>
			</div>
		</div>
		<!-- end: INBOX PANEL -->
	</div>
</div>
	
<!-- end: PAGE CONTENT-->
					