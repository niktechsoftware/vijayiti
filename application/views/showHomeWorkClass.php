<div class="table-responsive">
		<table class="table table-striped table-hover" id="sample-table-2">
			<thead>
				<tr>
					<th>S.no.</th>
					<th>Given By</th>
					<th>Assignment Title</th>
					<th>Class</th>
					<th>Section</th>
					<th>Marks & Grade</th>
					<th>Work Description</th>
					<th>Given Date</th>
					<th>Submission Date</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			    $count = 1;
			foreach($var1->result() as $lv): ?>
				<tr>
		  			<td><?php echo $count;?></td>
		  			<td><?php echo $lv->givenby;?></td>
		  			<td><?php echo $lv->workID;?></td>
		  			<td><?php echo $lv->class1;;?></td>
		  			<td><?php echo $lv->section;?></td>
		  			<td><?php echo $lv->marks_grade;?></td>
		  			<td><?php echo $lv->workDiscription;?></td>
		  			<td>
						<?php echo $lv->givenWorkDate; ?>
					</td>
					<td>
						<?php echo $lv->DueWorkDate; ?>
					</td>
		  		</tr>
		  		<?php $count++; endforeach; ?>
		  		
			</tbody>
			
		</table>
		
		</div>
		