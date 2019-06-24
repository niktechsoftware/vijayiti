		
		
		
		<form method="post" action="<?php echo base_url();?>/index.php/examControllers/marksSave">
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
                <?php  $val=$this->db->get("general_settings")->row();
										$fsd = $val->finance_start_date;  
              $val=$this->db->query("select * from exam_info WHERE exam_name = '$exam_name' AND class1='$class_section' AND section ='$section' AND subject='$subject' AND fsd = '$fsd' ");
              		
              		?>
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
                <?php 
                if($val->num_rows()>0)
                {
                foreach ($val->result() as $v){?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    
                    <?php $this->db->where("student_id",$v->stu_id);
                 $this->db->where("status","Active");
                    $num_row=$this->db->get("student_info")->row();?>
                    <td>
                    	
						<?php echo $v->stu_id; ?>
                    </td>
                    <td>
							<?php echo $num_row->scholer_no; ?>
                    </td>
                    <td><?php echo $num_row->first_name." ".$num_row->midd_name." ".$num_row->last_name; ?></td>
                    <td class="hidden-xs text-center">
  					<?php echo $v->Attendance;?>
                      </td>
                    <td><?php echo $out_of; ?></td>                  
                    <td><?php echo $v->marks;?></td>
                  </tr> 
                  <?php $i++; } ?>
                    </tbody>
              </table>
              <br>
                  
                  <?php 
                }
                else {
                	foreach($class_info->result() as $num_row){?>
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
		             	 </form><?php 
		                }?>                 
              
            