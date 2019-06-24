<div class="row">
	<div class="col-md-12">
		<!-- start: RESPONSIVE TABLE PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<h4 class="panel-title">Home Work <span class="text-bold"> Detail</span></h4>
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
			<div class="panel-body">
				<div class="form-group">
					
				<div class="col-sm-12">				
					
			<br/><br/>
			<div class="row">
				<div class="col-md-12 space20">
				<div class="btn-group pull-right">
				<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
					Export <i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu dropdown-light pull-right">
					<li>
						<a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="3,4">
							Export to Excel
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div><?php if($this->uri->segment(3)=="success")
					{
						echo "successfully Added Homework";
					}
					if($this->uri->segment(3)=="fail")
					{
						echo "something went to wrong";
					}?>
		</div>
								
	<div class="table-responsive">
		<table class="table table-striped table-hover" id="sample-table-2">
			<thead>
				<tr>
					<th>S.no.</th>
					<th >Given By</th>
					<th>Assignment Title</th>
					<th>class</th>
					<th>Section</th>
					<th>Work Description</th>
					<th>Marks $ Grade</th>
					<th>Given Date</th>
					<th>Submission Date</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody>
			<?php 
			    $count = 1;
			foreach($var1->result() as $lv): ?>
			<form method="post" action ="<?php echo base_url();?>/index.php/studentHWControllers/updateHomeWork1">
				<tr>
		  			<td><?php echo $count;?></td>
		  			<td><input type="text" style="width: 70px;" name = "givenby" value="<?php echo $lv->givenby;?>"/></td>
		  			<td><input type="text" style="width: 90px;" name = "workID" value="<?php echo $lv->workID;?>"/></td>
		  			<td><input type="text" style="width: 50px;" name = "class1" value="<?php echo $lv->class1;?>"/></td>
		  			<td><input type="text" style="width: 50px;" name = "section" value="<?php echo $lv->section;?>"/></td>
		  			<td><input type="text" style="width: 140px;" name = "workDiscription" value="<?php echo $lv->workDiscription;?>"/></td>
		  			<td><input type="text" style="width: 50px;" name = "marks" value="<?php echo $lv->marks_grade;?>"/></td>
		  			<td>
						<input type="text" style="width: 90px;" name = "givenWorkDate" value="<?php echo $lv->givenWorkDate; ?>"/>
					</td>
					<td>
						<input type="text" style="width: 90px;" name = "DueWorkDate" value="<?php echo $lv->DueWorkDate; ?>"/>
						<input type="hidden" style="width: 50px;" name = "s_no" value="<?php echo $lv->s_no;?>"/>
					</td>
					<td><button type="submit" id="updateHome" class="btn btn-blue">Update</button>
					<button type="submit" id="deleteHome" class="btn btn-green">Delete</button></td>
					
		  		</tr>
		  		</form>
		  		<?php $count++; endforeach; ?>
		  		
			</tbody>
			
		</table>
		
		</div>
	</div>		
	</div>
			</div><!-- end: panel Body -->
		</div><!-- end: panel panel-white -->
		
	</div><!-- end: MAIN PANEL COL-SM-12 -->
</div><!-- end: PAGE ROW-->
	</div>				