		<table class="table table-striped table-bordered table-hover" id="datatable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Attendance</th>
                    <th>M.M.</th>
                    <th>Marks Obtained</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>
                <?php foreach($dum as $dum1){?>
                  <tr>
                    <td><?php echo $i; ?>
                    <td>
						<?php echo $dum1->stu_id; 
						$var1=$dum1->stu_id;?>
                    </td>
                    
                    <td>
                <?php     
              
                $this->db->where("status","Active");
                	$this->db->where("student_id",$dum1->stu_id);
                	$result12 = $this->db->get("student_info")->row();
                //$this->db->query("select first_name from student_info where student_id='$var1'");
                			echo $result12->first_name;?>
                    </td>
                    <td> 
  					<?php echo $dum1->Attendance; ?>
                      </td>
                    <td><?php echo $dum1->out_of; ?></td>                  
                    <td>
                    <input type ="hidden" value=<?php echo $var1;?> name="stuid<?php echo $i;?>" id="stuid<?php echo $i;?>"/>
                    <input type="text" id="upmark<?php echo $i;?>" value="<?php echo $dum1->marks;?>" style="width: 40px;" name="upmarks<?php echo $i;?>" />
                    <input type="submit" name="update" class="btn btn-dark-purple" value ="Update Marks" id="submit<?php echo $i;?>"/>
                    <script>
                    $("#submit<?php echo $i;?>").click(function(){
                    	var marks = $("#upmark<?php echo $i;?>").val();
    					var classv = $("#classv").val();
    					var stuid= $("#stuid<?php echo $i;?>").val();
    					var exam_name = $("#exam_name").val();
    					var section = $("#sectionId").val();
    					var subject = $("#subjectIdresult").val();
    					$.post("<?php echo site_url("index.php/examControllers/resultMarks") ?>",{exam_name : exam_name,classv : classv,section : section,subject : subject, marks : marks, stuid : stuid}, function(data){
    						$("#result123").html(data);
    					});
    				});
                    </script>
                    </td>
                   </tr> 
                  <?php $i++; } ?>                 
                </tbody>
              </table>
              <br>
             
              <br><br><br>
          