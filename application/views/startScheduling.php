	<div class="row"> 
		<div class="col-sm-15">		
				<div class="panel panel-calendar">
					<div class="panel-heading panel-blue border-light">
						<h4 class="panel-title">Settings</h4>
					</div>		
					<form action="<?php echo base_url();?>index.php/examControllers/createExam" method="post">
					<div class="row"> 
                    <div class="panel-body padding-bottom-none">
                    	<div class="col-md-10 col-lg-10 col-lg-offset-1">
                       		
                       		<div class="row">
                       		
                                <table class="table" style="width:100%;">
                                	<tr>
                                        <td align="right">Number of Exam Sifts</td>
                                        <td>
                                            <select name="nos" id="nos" class="form-control" required>
                                            	<option value="">-NOS-</option>
                                                <?php for($i = 1; $i <=3; $i++){ ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                    	</td>
                                    	<td align="right">Number of Days to Complete Exam</td>
                                        <td>
                                            <select name="nod" id="nod" class="form-control" required>
                                            	<option value="">-NOD-</option>
                                                <?php for($i = 2; $i <=15; $i++){ ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                    	</td>
                                        <td> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </td>
                                    </tr>
                                </table>
                                <input type="hidden" name ="exam_name" value="<?php echo $exam_name;?>" />
                                 <input type="hidden" name ="edate" value="<?php echo $edate;?>" />
                            </div>
                            <div id="exam1"> </div> 
                    <div id="exam12"> </div> 
                    
                  	
                    </div>
                    </div>                                
            	</div>
            </form>
        	 </div>
     	   </div>
 		</div>
 		<script>
 		jQuery(document).ready(function() {
 			Main.init();
 			SVExamples.init();
 			FormElements.init();
 			<?php
 			$j = 1;
 			$k = 1;
 			while(7 >= $j){
 				?>
 							$('input#date<?php echo $j; ?>').change(
 									function(){
 										var d = $('#date<?php echo $j; ?>').val();
 										var dArray = d.split("-");
 										myDate=new Date(dArray[0],dArray[1]-1,dArray[2]);  
 										var dayCode = myDate.getDay(); // dayCode 0-6
 										var weekday = new Array(7);
 										weekday[0]=  "Sunday";
 										weekday[1] = "Monday";
 										weekday[2] = "Tuesday";
 										weekday[3] = "Wednesday";
 										weekday[4] = "Thursday";
 										weekday[5] = "Friday";
 										weekday[6] = "Saturday";
 										var a = weekday[dayCode];
 										$('#day<?php echo $j; ?>').val(a);
 									});
 						<?php 
 							$j++; 
 						}
 						?>
 						});
 						</script>
            	