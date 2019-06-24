		<script type="text/javascript">
			<?php
				if($num_row1 > 0){
					for($i = 1; $i<= $num_row1; $i++){
						?>
						var abc = Number(getElementById("mark<?php echo $i; ?>").value);
						function check<?php echo $i; ?>(abc){
							var a = /^[0-9]+$/;
							if(!(mark<?php echo $i; ?>.value.match(a)))
							{
								alert("Please Input numbers only.");
								setTimeout(function() {
								  document.getElementById('mark<?php echo $i; ?>').focus();
								}, 0);
								return false;
							}
							if(mark<?php echo $i; ?>.value > Number(<?php echo $out_of; ?>)){
								alert("Marks Obtained can not be greater than Maximum Marks");
								setTimeout(function() {
								  document.getElementById('mark<?php echo $i; ?>').focus();
								}, 0);
								return false;
							}
						}
						<?php 
					}
				} 
			?>
		</script>
		
		
		<form method="post" action="./db_files/exam_entry_db.php">
            <input type="hidden" name="teacher_id" value="<?php echo $t_id; ?>" />
            <input type="hidden" name="exam_name" value="<?php echo $exam_name; ?>" />
            <input type="hidden" name="out_of" value="<?php echo $out_of; ?>" />
            <input type="hidden" name="class" value="<?php echo $class_section; ?>" />
            <input type="hidden" name="section" value="<?php echo $section; ?>" />
            <input type="hidden" name="subject" value="<?php echo $subject; ?>" />
            <input type="hidden" name="row" value="<?php echo $num_row1; ?>" />
            <table class="table table-striped table-bordered table-hover" id="datatable">
                  <tr>
                    <th><?php echo $class_section; ?> - <?php echo $section; ?> - <?php echo $subject; ?></th>
                    <th><?php 
						date_default_timezone_set("Asia/Calcutta");
						$day = date('d-m-Y');
						echo date("l jS F, Y", strtotime("$day"));  
					?>
                    </th>
                  </tr>
              </table>
              <br><br>
              <table class="table table-striped table-bordered table-hover" id="datatable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Student ID</th>
                    <th>Scholar No</th>
                    <th>Student Name</th>
                    <th>Attendance</th>
                    <th>M.M.</th>
                    <th>Marks Obtained</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>
                <?php foreach($class_info->result() as $num_row){?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                    	<input type="hidden" name="stu_id<?php echo $i; ?>" value="<?php echo $num_row->student_id; ?>" />
						<?php echo $num_row->student_id; ?>
                    </td>
                    <td>
						<input type="hidden" name="scholer_no<?php echo $i; ?>" value="<?php echo $num_row->scholer_no; ?>" />
							<?php echo $num_row->scholer_no; ?>
                    </td>
                    <td><?php echo $num_row->first_name." ".$num_row->midd_name." ".$num_row->last_name; ?></td>
                    <td class="hidden-xs text-center">
  					<label class="radio-inline">
                       <input class="radio" checked type="radio" onClick="undisableTxt(<?php echo $i; ?>);" name="Attendance<?php echo $i; ?>" id="optionsRadios1" value="P">
                   		P 
                    </label>
                    <label class="radio-inline">
                        <input class="radio" type="radio" onClick="disableTxt(<?php echo $i; ?>);" id="att<?php echo $i; ?>" name="Attendance<?php echo $i; ?>" id="optionsRadios2" value="A">
                         A
                    </label> 
                      </td>
                    <td><?php echo $out_of; ?></td>                  
                    <td><input type="text" id="mark<?php echo $i; ?>" onBlur="check<?php echo $i; ?>(); return false;" name="marks<?php echo $i; ?>" required /></td>
                  </tr> 
                  <?php $i++; } ?>                 
                </tbody>
              </table>
              <br>
              <table>              
                <tr>
                	<td>
                    	<input type="submit" class="btn btn-info btn-gradient" value="Save <?php echo $subject; ?> Marks" />
                    </td>
                </tr>
              </table>
              <br><br><br>
              </form>