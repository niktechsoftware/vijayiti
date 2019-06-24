<input type="hidden" name="section" id ="section" value="<?php echo $sec;?>"/>
		<input type="hidden" name="classv" id = "classv" value="<?php echo $cla;?>"/>
		<?php $i=1;
		
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
							<td> Select Class </td>
							<td> Pramote </td>
							<td> Status </td>
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
				<td><input type="hidden" id="stuID<?php echo $i;?>" name="stuID<?php echo $i;?>" value="<?php echo $row->student_id;?>" /> <?php echo $row->student_id;?> </td>
				<td><input type="hidden" id="schno<?php echo $i;?>" name="schno<?php echo $i;?>" value="<?php echo $row->scholer_no;?>"/> <?php echo $row->scholer_no;?></td>
														<td> <?php echo $row->first_name." ".$row->midd_name." ".$row->last_name;?></td>
														<td><?php echo $fname;?></td>
														<td> <?php echo $row->mobile;?></td>
														<td> <?php $classname = $this->db->query("SELECT DISTINCT class_name FROM class_info")->result();
																	 ?>
													<select class="form-control" id="changeClass<?php echo $i;?>" name="class<?php echo $i;?>" style="width: 90px;">
												<option value="no">-Select Class-</option>
												<?php foreach($classname as $row):?>
													<option value="<?php echo $row->class_name;?>"><?php echo $row->class_name;?></option>
													<?php endforeach; ?>
												</select>		
														</td>
														<td>
															<button id = "pro<?php echo $i;?>" class="btn btn-dark-purple">
				 												Pramote <i class="fa fa-arrow-circle-right"></i>
				 											</button>
				 											
														</td>
														<td>
														<input type ="button" value = " Good Day" class="btn btn-success btn-sm" id="msg1<?php echo $i;?>">
								                    		
														</td>
													</tr>
								<?php 
												$i++;}}?></tbody>
				</table><?php 
												
												
	}?>
	<script> 
	<?php for($j=1;$j<=$i;$j++){?>
		$("#pro<?php echo $j;?>").click(function(){
			var class1 = $("#classv").val();
			var section = $("#section").val();
			var student_id = $("#stuID<?php echo $j;?>").val();
			var changeClass = $("#changeClass<?php echo $j;?>").val();
				$.post("<?php echo site_url("index.php/promotionControler/pramoteClass") ?>",{section : section,class1 : class1,student_id : student_id, changeClass : changeClass}, function(data){
				$("#msg1<?php echo $j;?>").val(data);
				});
			
		});
		<?php }
		?>
	</script>
	
		