<!--  
Niktech software Solutions,niktechsoftware.com,schoolerp-niktech.in
  <meta name="description" content="Welcome to niktech software School business ERP . we proving school management erp software. we including online attendance with biometric attendance machine and tracking student with GPS technology & many other facilities in our school management erp system">
  <meta name="keywords" content="Enterprise resource planning,school,ERP,system software,attendance,biometric,online, school management,gps,niktech software solution, online result, online admit card,omr">
  <meta name="author" content="School management System software">
-->

<?php
$i = 1;
if(isset($streamList)):
	foreach ($streamList->result() as $row):
	 
?>
		<div class="text-white text-sm pull-left space10">
			<span id="name2" Style="color:red;"></span>
			<input type="text" id="streamValue<?php echo $i;?>" size="13" value="<?php echo $row->cat_name;?>" class="text-uppercase" >
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
		    		//alert(streamId);
		    		var form_data = {
							streamId : streamId,
							streamName : streamName
						};
				$.ajax({
					url: "<?php echo site_url("index.php/configureClassControllers/updatecatforfee") ?>",
					type: 'POST',
					data: form_data,
					success: function(msg){
						$("#streamList1").html(msg);
					}
				});
		        });
	
			    $("#delete<?php echo $j; ?>").click(function(){
		    		var streamId = $('#streamId<?php echo $j; ?>').val();	
		    		//alert(streamId);
		    		$.post("<?php echo site_url('index.php/configureClassControllers/deletefeecat') ?>", {streamId : streamId}, function(data){
		                $("#streamList1").html(data);
		                //alert(data);
		    		})
		        });
	 
                       

	                  var input = document.getElementById("streamValue<?php echo $j;?>");
                         input.addEventListener("keyup", function () {
                        //  var text_value = document.getElementById("streamValue<?php echo $j;?>").value;
                        //             if (!text_value.match(/^[A-Za-z]+$/)) {
                        //                 document.getElementById("name2").innerHTML = "Only Alphabets Allow";
                        //                  $('#edit<?php echo $j;?>').attr('disabled', 'disabled');

                        //                    $(document).on('click', 'a', function(e) {
                        //                   if ($(this).attr('disabled') == 'disabled') {
                        //                      e.preventDefault();
                        //                         }
                        //                         window.location.reload();
                        //                     });
                        //                 document.getElementById("streamValue<?php echo $j;?>").focus();
                        //                 if (text_value == "") {
                        //                     document.getElementById("name2").innerHTML = " ";
                        //                      window.location.reload();
                        //                     document.getElementById("streamValue<?php echo $j;?>").focus();
                        //                 }
                        //             }
                         });

                         input.addEventListener("keyup", function () {
                          var x = document.getElementById("streamValue<?php echo $j;?>");
                             x.value = x.value.toUpperCase();
                         
                  });
                    <?php } ?>   
</script>