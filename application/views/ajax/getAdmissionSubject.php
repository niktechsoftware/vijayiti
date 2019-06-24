<?php 
	$this->db->where("class_id",$className);
	$this->db->where("stream",$stream);
	$this->db->where("section",$section);
	$res = $this->db->get("subject");
	$i = 1;
	foreach ($res->result() as $row1):
?>
<div class="col-md-3">
	<div class="form-group">
		<label class="control-label">
			Subject <?php echo $i; ?>
		</label>
		<select class="form-control" id="subject" name="subject<?php echo $i;?>">
			<option> Select Subject <?php echo $i; ?></option>
			<?php
			foreach($res->result() as $row):
				echo '<option value="'.$row->subject.'">'.$row->subject.'</option>';
			endforeach;
			?>
		</select>
	</div>
</div>

<?php $i++; endforeach; ?>
<input type="hidden" value="<?php echo $i--;?>" name="subVal" />