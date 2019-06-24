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
					<?php if(($this->uri->segment(3) == "feeFalse")){?>
						<div class="alert alert-danger">
							<button data-dismiss="alert" class="close">
								&times;
							</button>
							<strong>Oh my god...!</strong> Somthing Wrong contact Gfinch technologies... :(
						</div>
					<?php } ?>
						<div class="panel panel-calendar">
							<div class="panel-heading panel-purple border-light">
								<h4 class="panel-title">Collect <span class="text-bold">Student Fees</span></h4>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
						                      <label for="inputStandard" class="col-lg-4 control-label">
						                      		Student ID <span style="color:#F00">*</span>
						                      </label>
						                      <div class="col-lg-7">
						                        <input type="text" id="studid" class="form-control" onkeyup="autocomplet()" />
						                        <ul style="list-style: none; padding:0px;" id="country_list_id"></ul>
						                      </div>
						                </div>	
									</div>
									<div class="col-sm-6" id="getFsd">
											
									</div>
								</div>
								
				                <div class="panel-body">
									<div id="validId"> </div>
								</div>
							</div>
							
						
						</div>		
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
									
