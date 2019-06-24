<form action="<?php echo base_url();?>index.php/invoiceController/printTC"  method ="post">

<div class="row">
	<div class="col-md-12">
	<!-- start: RESPONSIVE TABLE PANEL -->
		<div class="panel">
			<div class="panel-heading panel-orange">
				<i class="fa fa-external-link-square"></i>
					Transfer Certificate Window
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
								<a class="panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> <span>Configurations</span></a>
							</li>
							<li>
								<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
							</li>										
						</ul>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row space20">
					<div class="col-sm-6">
						<label class="col-sm-4 control-label">
							Enter Student ID<span class="symbol required"></span>
						</label>
							
						<div class="col-sm-8">
							<input type="text" class="form-control" name="stud_id" id="stud_id" placeholder="Enter Student Id">
						</div>
					</div>
					<div id = "rahul" class="col-sm-6">
						
					</div>
					
					
					
					
				</div>
				
			</div>
				
		</div>
	</div>
</div>
</form>