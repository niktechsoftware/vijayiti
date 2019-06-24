<div class="row">
	<div class="col-md-12">
		<!-- start: RESPONSIVE TABLE PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<h4 class="panel-title">All <span class="text-bold">Notice Detail</span></h4>
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
			
	<div class="table-responsive">
		<table class="table table-striped table-hover" id="sample-table-2">
			<thead>
				<tr>
					<th>S.no.</th>
					
					<th>Subject</th>
					<th>Message</th>
					<td>date</td>
					<th>time</th>
					
				</tr>
			</thead>
			<tbody>
			<?php 
			$n=$this->uri->segment(3);
			if($n)
			{
				$r = $this->db->query("select * from notice where id= '$n'")->result();
				$count = 1;
							foreach($r as $lv): ?>
								<tr>
						  			<td><?php echo $count;?></td>
						  		
						  			<td><?php echo $lv->subject;?></td>
						  			<td><?php echo $lv->message;?></td>
						  			<td><?php echo $lv->date;?></td>
						  			<td>
										<?php echo $lv->time; ?>
									</td>
						  			
						  		</tr>
						  		<?php $count++; endforeach; }
				
			else 
			{
			$r = $this->db->query("select * from notice  ");
			    $count = 1;
			    if($r->num_rows()>0)
			    {
			foreach($r->result() as $lv): ?>
				<tr>
		  			<td><?php echo $count;?></td>
		  			
		  			<td><?php echo $lv->subject;?></td>
		  			<td><?php echo $lv->message;?></td>
		  			<td><?php echo $lv->date;?></td>
		  			<td>
						<?php echo $lv->time; ?>
					</td>
		  			
		  		</tr>
		  		<?php $count++; endforeach; }
			    else {echo "No Record Found";}
			     }?>
		  		
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