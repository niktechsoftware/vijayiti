<?php
$i = 1;
if(isset($streamList)):
	foreach ($streamList->result() as $row):
?>
		<div class="text-white text-sm pull-left space10">
			<input type="text" id="streamValue<?php echo $i;?>" size="13" value="<?php echo $row->stream;?>">
			<input type="hidden" id="streamId<?php echo $i;?>" size="13" value="<?php echo $row->id; ?>">
			<a href="#" class="btn btn-sm btn-light-green" id="edit<?php echo $i;?>"><i class="fa fa-edit"></i> Edit</a>
			<a href="#" class="btn btn-sm btn-light-green" id="delete<?php echo $i;?>"><i class="fa fa-trash-o"></i> Delete</a>
		</div>
		
<?php
	$i++;
	endforeach;
endif;
?>


<script>
	    <?php for($j = 1; $j < $i; $j++){ ?>
			    $("#edit<?php echo $j; ?>").click(function(){
		    		var streamId = $('#streamId<?php echo $j; ?>').val();	
		    		var streamName = $('#streamValue<?php echo $j; ?>').val();
		    		alert(streamName+","+streamId);
		    		var form_data = {
							streamId : streamId,
							streamName : streamName
						};
				$.ajax({
					url: "<?php echo site_url("index.php/configureClassControllers/updateStream") ?>",
					type: 'POST',
					data: form_data,
					success: function(msg){
						$("#streamList1").html(msg);
					}
				});
		        });
	
			    $("#delete<?php echo $j; ?>").click(function(){
		    		var streamId = $('#streamId<?php echo $j; ?>').val();	
		    		//alert(streamName);
		    		$.post("<?php echo site_url('index.php/configureClassControllers/deleteStream') ?>", {streamId : streamId}, function(data){
		                $("#streamList1").html(data);
		                //alert(data);
		    		})
		        });
	   <?php } ?> 
</script>