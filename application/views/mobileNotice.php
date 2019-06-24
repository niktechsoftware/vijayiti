<div class="row">
	<div class="col-md-12">
	<!-- start: RESPONSIVE TABLE PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<i class="fa fa-external-link-square"></i>
				Send Message:
			</div>
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
							<a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a>
						</li>
						<li>
							<a class="panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> <span>Configurations</span></a>
						</li>
						<li>
							<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
						</li>										
					</ul>
				</div>
			</div>
			<div class="panel-body"  >
<!-- -------------------------------------------------------- Msg part ------------------------------------------------ -->
                  <?php
if($this->uri->segment(3) == 'Notice'){ ?>
                     <p class="alert alert-info"> This is the area you can send message to one pirticular Parent or Mobile number. If you want to add more than one number Please use Comma. <br>
                    <strong>For Example: (9889599---,898900---,78000-----)</strong></p>
                     <form method="post" action="<?php echo base_url();?>index.php/smsAjax/sendNotice">
                     <table class="table">
                     	<tr>
                     		<td>Mobile Number : </td>
                     		<td>
                            	<input type="hidden" name="section" value="Notice" />
                            	<input type="text" name="m_number" id="inputStandard" class="form-control" placeholder="Mobile Number"/>
                            </td>
                     	</tr>
                     	<tr>
                     		<td>Message : </td>
                     		<td><textarea name="meg" class="form-control" id="textArea" rows="5"></textarea></td>
                     	</tr>
                     	<tr>
                     		<td colspan="2">
                     			<input type="submit" name="Send_Message" value="Send Message" class="btn btn-default margin-right" />
                     		</td>
                     	</tr>
		     		</table>
                    </form>
<?php }
elseif($this->uri->segment(3) == 'Parent%20Message'){ ?>
			<p class="alert alert-info"> This is the area you are able to send message to all parents. Type the message in textbox and press send.</p>
            <?php
					// if(!($auth->parent_message == 'yes')){
						//echo '<font color=" color="#FF0000">Parent Message Not Activated. Please activat it first, from SMS setting.</font>';
					// }
					 ?>
            <form method="post" action="<?php echo base_url();?>index.php/smsAjax/sendallParent">
          <?php $totmsg=$this->uri->segment(4);
          if($totmsg)
          		{
					echo "you Have Sent ".$totmsg." total Sms";
          		}
          			?>  
                     <table class="table">
                     	<tr>
                     		<td>Message : </td>
                     		<td>
                            	<input type="hidden" name="section" value="Parent Message" />
                            	<textarea name="meg" class="form-control" id="textArea" rows="5"></textarea>
                             </td>
                     	</tr>
                     	<tr>
                     		<td colspan="2">
                     			<input type="submit" name="Send_Message" value="Send Message" class="btn btn-default margin-right" />
                     		</td>
                     	</tr>
		     </table>
             </form>
<?php } 
elseif($this->uri->segment(3) == 'Announcement'){ ?>
			<p class="alert alert-info"> This is the area you are able to send Announcement to all Employee and Teacher. Type the message in textbox and press send.</p>
            <?php
					 //if(!($auth->announcement == 'yes')){
						// echo '<font color=" color="#FF0000">Announcement Not Activated. Please activat it first, from SMS setting.</font>';
					 //}
					 ?>
             <form method="post" action="<?php echo base_url();?>index.php/smsAjax/sendAnnuncement">
                    
                      <?php $totmsg=$this->uri->segment(4);
          if($totmsg)
          		{
					echo "you Have Sent ".$totmsg." total Sms";
          		}
          			?> 
                     <table class="table">
                     	<tr>
                     		<td>Message : </td>
                     		<td>
                            	<input type="hidden" name="section" value="Announcement" />
                            	<textarea name="meg" class="form-control" id="textArea" rows="5"></textarea>
                            </td>
                     	</tr>
                     	<tr>
                     		<td colspan="2">
                     			<input type="submit" name="Send_Message" value="Send Message" class="btn btn-default margin-right" />
                     		</td>
                     	</tr>
		     </table>
             </form>
<?php } 
elseif($this->uri->segment(3) == 'Greeting'){ ?>
			<p class="alert alert-info"> This is the area you are able to send Greeting to all Student and Employee and Parents. Type the message in textbox and press send.</p>
            <?php
					 //if(!($auth->greeting == 'yes')){
						 //echo '<font color=" color="#FF0000">Greeting Not Activated. Please activat it first, from SMS setting.</font>';
					 //}
					 ?>
            <form method="post" action="<?php echo base_url();?>index.php/smsAjax/sendGreeting">
                     <?php $totmsg=$this->uri->segment(4);
          if($totmsg)
          		{
					echo "you Have Sent ".$totmsg." total Sms";
          		}
          			?> 
                     <table class="table">
                     	<tr>
                     		<td>Message : </td>
                     		<td>
                            	<input type="hidden" name="section" value="Greeting" />
                            	<textarea name="meg" class="form-control" id="textArea" rows="5"></textarea>
                            </td>
                     	</tr>
                     	<tr>
                     		<td colspan="2">
                     			<input type="submit" name="Send_Message" value="Send Message" class="btn btn-default margin-right" />
                     		</td>
                     	</tr>
		     </table>
            </form>
<?php } 
elseif($this->uri->segment(3) == 'classwise'){ ?>
			<p class="alert alert-info"> This is the area you are able to send Message Class Wise to Student . select the class and Type the message in textbox and press send.</p>
            <?php
					 //if(!($auth->greeting == 'yes')){
						 //echo '<font color=" color="#FF0000">Greeting Not Activated. Please activat it first, from SMS setting.</font>';
					 //}
					 ?>
            <form method="post" action="<?php echo base_url();?>index.php/smsAjax/classwise">
                     <?php $totmsg=$this->uri->segment(4);
          if($totmsg)
          		{
					echo "you Have Sent ".$totmsg." total Sms";
          		}
          			?> 
                     <table class="table">
                     	<tr>
                     	
                     	<tr>
                     		<td>Select Class </td>
                     		<td> <?php $classname = $this->db->query("SELECT DISTINCT class_name FROM class_info")->result();
																	 ?>
													<select class="form-control" id="class" name="class" style="width: 160px;">
												<option value="no">-Select Class-</option>
												<?php foreach($classname as $row):?>
													<option value="<?php echo $row->class_name;?>"><?php echo $row->class_name;?></option>
													<?php endforeach; ?>
												</select>		
														</td>
														
							<td>Select Session </td>
                     		<td id="section"> <?php $classname = $this->db->query("SELECT DISTINCT fsd FROM student_info")->result();
																	 ?>
													<select class="form-control" id="section" name="section" style="width: 160px;">
												<option value="no">-Select Session-</option>
												<?php foreach($classname as $row):?>
													<option value="<?php echo $row->fsd;?>"><?php echo $row->fsd;?></option>
													<?php endforeach; ?>
												</select>		
														</td>							
                     	</tr>
                     	<tr>
                     		<td>Message : </td>
                     		<td>
                            	
                            	<textarea name="meg" class="form-control" id="textArea" rows="5"></textarea>
                            </td>
                     	</tr>
                     	<tr>
                     		<td colspan="2">
                     			<input type="submit" name="Send_Message" value="Send Message" class="btn btn-default margin-right" />
                     		</td>
                     	</tr>
		     </table>
            </form>
<?php } 



?>
<!-- -------------------------------------------------------- End msg part -------------------------------------------- -->
                   <table>
          <tr>
          <td>Number Of Character=</td>
          <td id="totalCharacter" style="color: green"></td>
          </tr>
          </table> 
		     </div>
		</div>
	</div>
</div>
</form>