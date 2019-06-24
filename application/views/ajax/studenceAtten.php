<input type="hidden" name="section" value="<?php echo $sec;?>"/>
		<input type="hidden" name="classv" value="<?php echo $cla;?>"/>
		<?php $i=1;
		if($check->num_rows() > 0)
		{
			?><div class="alert alert-danger">
			<?php echo "Attendance is Done for today";?>
			</div><?php 
		}
		else {	
	
		if($var->num_rows() > 0){?>
		
			<?php foreach ($var->result() as $row){	
				?>
				<tr>
				<td> <?php echo $i;?> </td>
				<td><input type="hidden" name="stuID<?php echo $i;?>" value="<?php echo $row->enroll_num;?>" /> <?php echo $row->enroll_num;?> </td>
				<td><input type="hidden" name="schno<?php echo $i;?>" value="<?php echo $row->registration_no;?>"/> <?php echo $row->registration_no;?></td>
														<td> <?php echo $row->name;?></td>
														
														<td> <?php echo $row->mobile;?></td>
														<td> <div class="form-group">
														
														
															<label class="radio-inline">
																<input type="radio" class="grey" value="P" name="gender<?php echo $i; ?>" id="gender_female" checked="checked">
																p
															</label>
															<label class="radio-inline">
																<input type="radio" class="grey" value="A" name="gender<?php echo $i; ?>"  id="gender_male">
																A
															</label>
															<label class="radio-inline">
																<input type="radio" class="grey" value="L" name="gender<?php echo $i; ?>"  id="gender_male">
																L
															</label>
													
														</div></td>	
													</tr><?php 
												$i++;}
												
				 	?><input type="hidden" value="<?php echo $i;?>" name="rows"/>
				 	<tr><td colspan="2">
				 	<button id="sonu" class="btn btn-blue next-step btn-block">
				 	Submit <i class="fa fa-arrow-circle-right"></i>
				 	</button>
				 	</td></tr><?php 
		}
		
	}