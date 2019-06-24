<input type="hidden" name="section" id ="section" value="<?php echo $sec;?>"/>
		<input type="hidden" name="classv" id = "classv" value="<?php echo $cla;?>"/>
		<?php $i=1;
		$this->db->where("section",$sec);
		$this->db->where("current_class",$cla);
		$check = $this->db->get("pramoted");
		if($check->num_rows() > 0){?>
			
			<table class="table table-bordered table-hover" id="sample-table-1">
		 			<thead>
			 			<tr>
							<td> S.No. </td>
							<td> Student ID </td>
							<td> Scholer No </td>
							<td> Student Name</td>
							<td> Father Name</td>
							<td> Mobile</td>
							<td> Previous Class </td>
							<td> Promoted Class </td>
							<td> Date </td>
						</tr>
					</thead>
				<tbody>
			
			<?php foreach ($check->result() as $row){	
					$this->db->where("student_id",$row->student_id);
				$this->db->where("status","Active");
				if($this->db->get("student_info")->row())
				{
				$this->db->where("student_id",$row->student_id);
				$ginfo = $this->db->get("guardian_info")->row();
				$fname = $ginfo->father_full_name;
				?>
				
				<tr>
				<td><?php echo $i;?></td>
				<td> <?php echo $row->student_id;?></td>
				<td><?php echo $studentfo->scholer_no;?></td>
				<td> <?php echo $studentfo->first_name." ".$studentfo->midd_name." ".$studentfo->last_name;?></td>
														<td><?php echo $fname;?></td>
														<td> <?php echo $studentfo->mobile;?></td>
														<td> <?php echo $row->current_class;?>
													
														</td>
														<td>
															<?php echo $row->next_class;?>
														</td>
														<td>
														<?php echo $row->date1;?>
								                    		
														</td>
													</tr>
								<?php 
												$i++;}}?></tbody>
				</table><?php 
												
												
	}
	else{
		echo "No promoted Student found in database";
	}
	
	
	?>
	
		