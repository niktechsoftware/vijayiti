<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>assets/plugins/respond.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
		<!--<![endif]-->
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/blockUI/jquery.blockUI.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/moment/min/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootbox/bootbox.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery.scrollTo/jquery.scrollTo.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/ScrollToFixed/jquery-scrolltofixed-min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery.appear/jquery.appear.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/velocity/jquery.velocity.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/TouchSwipe/jquery.touchSwipe.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
		<script src="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/truncate/jquery.truncate.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/summernote/dist/summernote.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/subview.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/subview-examples.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/table-data.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE JAVASCRIPTS  -->
		<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
		<!-- end: CORE JAVASCRIPTS  -->
		<script>
	
			jQuery(document).ready(function() {
				
				$("#extQ").hide();
				$("#stud").hide();
				$("#emp").hide();
				$("#nandp").hide();
				$("#rahul23").hide();

				
				$("#itemNo").keyup(function(){
					var itemNo = $("#itemNo").val();
					//alert(itemNo);
					$.post("<?php echo site_url("index.php/enterStockController/checkStock") ?>",{itemNo : itemNo}, function(data){
						var d = jQuery.parseJSON(data);
						$("#msg").html(d.msg);
						$("#itemName").val(d.itemName);
						$("#itemCat").val(d.itemCat);
						$("#itemSize").val(d.itemsize);
						$("#price").val(d.price);
						$("#itemQuantity").val(d.itemQuantity);
						if(d.itemQuantity > 0){
							$("#extQ").show();
						}
					});
					
				});
				$("#extraQuantity").change(function(){
					var oldQt = Number($("#itemQuantity").val());
					var newQt = Number($("#extraQuantity").val());
					var add = oldQt + newQt;
					$("#itemQuantity").val(add);
				});
			

			$("#category").change(function(){
				var cat = $("#category").val();
				//alert("rahul");
				
				if(cat==01)
				{	$("#rahul23").hide();
					$("#stud").hide();
					$("#emp").hide();
					$("#nandp").hide();}
				
					if(cat=="Student Id")
				{$("#emp").hide();
						$("#nandp").hide();
						 $("#stud").show();
				$("#studID").keyup(function(){
					var cat = $("#studID").val();
					$.post("<?php echo site_url("index.php/enterStockController/checkStudID") ?>",{cat : cat}, function(data){
						
						var d = jQuery.parseJSON(data);	
							$("#validId").html(d.msg);
							if(d.indicator == "true")
							{		
								$("#rahul23").show();
							}
							$("#valid_id").val(d.balance);
						});
				});
					}else
					{
						if(cat=="Employee Id")
							{ 
								$("#stud").hide();
								$("#nandp").hide();
								$("#emp").show();
								$("#empID").keyup(function(){
									var teacherid = $("#empID").val();
									$.post("<?php echo site_url("index.php/enterStockController/checkempID") ?>",{teacherid : teacherid}, function(data){
										var d = jQuery.parseJSON(data);	
										$("#validId").html(d.msg);
										if(d.indicator == "true")
										{		
											$("#rahul23").show();
										}
										$("#valid_id").val(d.balance);
										});
									
								});
							
							}else
							{
								if(cat==04)
								{
								$("#stud").hide();
								$("#emp").hide();
								$("#nandp").show();
							
								$("#rahul23").show();
								
								}
							}
					}
			});

			
				<?php $i = 1; for($i = 1; $i<=15; $i++){ ?>

					$('select#item_no<?php echo $i; ?>').change(function(){
						var name = $('#item_no<?php echo $i; ?>').val();					
						$.post("<?php echo site_url("index.php/enterStockController/getTData") ?>", {name : name}, function(data){		
							var d = jQuery.parseJSON(data);				
							 $('#item_name<?php echo $i; ?>').val(d.itemName);
							 $('#item_cat<?php echo $i; ?>').val(d.itemCat);
							 $('#item_size<?php echo $i; ?>').val(d.itemsize);
							 $('#item_price<?php echo $i; ?>').val(d.price);
						});
					});
				
					
					$('input#item_quantity<?php echo $i; ?>').keyup(
						function(){
							var a = 0;
							var name = $('#item_price<?php echo $i; ?>').val();
							var name1 = $('#item_quantity<?php echo $i; ?>').val();
							var total = name * name1;
							document.getElementById('total_price<?php echo $i; ?>').value=total;
							document.getElementById('sub_total<?php echo $i; ?>').value=total;
					});
					
					$('input#item_discount<?php echo $i; ?>').keyup(
						function(){
							var name = $('#total_price<?php echo $i; ?>').val();
							var name1 = $('#item_discount<?php echo $i; ?>').val();
							
							var dis = (name1 * name)/100;
							var total = name - dis;
							document.getElementById('total_price<?php echo $i; ?>').value=name;
							document.getElementById('sub_total<?php echo $i; ?>').value=total;
							document.getElementById('discount<?php echo $i; ?>').value=dis;
					});
					
				<?php } ?>

				$('input#total').focusin(function(){
					
					var name = Number($('#sub_total1').val()) + Number($('#sub_total2').val()) + Number($('#sub_total3').val()) + Number($('#sub_total4').val()) + Number($('#sub_total5').val()) + Number($('#sub_total6').val()) + Number($('#sub_total7').val()) + Number($('#sub_total8').val()) + Number($('#sub_total9').val()) + Number($('#sub_total10').val()) + Number($('#sub_total11').val()) + Number($('#sub_total12').val()) + Number($('#sub_total13').val()) + Number($('#sub_total14').val()) + Number($('#sub_total15').val());				
					$("#total").val(name);
				});
				
				$('input#paid').keyup(
					function(){
						var name = $('#paid').val();
						var name1 = $('#total').val();
						var a = name1 - name;				
						document.getElementById('balance').value=a;
					});
				
				
				Main.init();
				SVExamples.init();
				TableData.init();
				
				
				});

			
		</script>