<?php
if(isset($sectionList)){
	$i = 1;
	foreach ($sectionList->result() as $row){
		echo '<div class="text-white text-large pull-left space10">';
		echo '<input type="text" id="sectionValue'.$i.'" size="10" value="'.$row->section.'">';
		echo '<input type="hidden" id="sectionId'.$i.'" size="10" value="'.$row->id.'">';
		echo ' <a href="#" class="btn btn-sm btn-light-blue" id="editSection'.$i.'"><i class="fa fa-edit"></i> Edit</a>';
		echo ' <a href="#" class="btn btn-sm btn-light-blue" id="deleteSection'.$i.'"><i class="fa fa-trash-o"></i> Delete</a>';
		echo '</div>';
		$i++;
	}
	?>
		<script>
			    <?php for($j = 1; $j < $i; $j++){ ?>
			    $("#editSection<?php echo $j; ?>").click(function(){
		    		var sectionId = $('#sectionId<?php echo $j; ?>').val();	
		    		var sectionName = $('#sectionValue<?php echo $j; ?>').val();
		    		$.post("<?php echo site_url('index.php/configureClassControllers/updateSection') ?>", {sectionId : sectionId, sectionName : sectionName}, function(data){
		                $("#sectionList").html(data);
		    		})
		        });

			    $("#deleteSection<?php echo $j; ?>").click(function(){
		    		var sectionId = $('#sectionId<?php echo $j; ?>').val();	
		    		$.post("<?php echo site_url('index.php/configureClassControllers/deleteSection') ?>", {sectionId : sectionId}, function(data){
		                $("#sectionList").html(data);
		    		})
		        });
			    <?php } ?> 
		</script>
<?php
	}
?>