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
<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/x-editable/js/bootstrap-editable.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/typeaheadjs/typeaheadjs.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/typeaheadjs/lib/typeahead.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-address/address.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/wysihtml5/bootstrap-wysihtml5-0.0.2/wysihtml5-0.3.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/wysihtml5/bootstrap-wysihtml5-0.0.2/bootstrap-wysihtml5.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/wysihtml5/wysihtml5.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/x-editable/demo-mock.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/x-editable/demo.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CORE JAVASCRIPTS  -->

<script src="<?php echo base_url(); ?>assets/js/ui-notifications.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<!-- end: CORE JAVASCRIPTS  -->
<script>
    jQuery(document).ready(function() {
    <?php 
    	$i = $this->db->count_all("class_info");
    ?>
		<?php for($j = 1; $j <= $i; $j++):?>
			$("#editClass<?php echo $j; ?>").click(function(){
				var id = $("#id<?php echo $j; ?>").val();
				var clName = $("#clName<?php echo $j; ?>").val();
				var stream = $("#stream<?php echo $j; ?>").val();
				var section = $("#section<?php echo $j; ?>").val();
				var teacherId = $("#teacherId<?php echo $j; ?>").val();
				//alert(id +" , "+ clName +" , "+ stream +" , "+ section +" , "+ teacherId);
				$.post("<?php echo site_url('index.php/configureClassControllers/updateClass')?>",
						{
							id : id,
							clName : clName,
							stream : stream,
							section : section,
							teacherId : teacherId
						},
						function(data){
							$("#success").html(data);
						}
				);
			});

			$("#deleteClass<?php echo $j; ?>").click(function(){
				var id = $("#id<?php echo $j; ?>").val();
				var clName = $("#clName<?php echo $j; ?>").val();
				var section = $("#section<?php echo $j; ?>").val();
				//alert(id +" , "+ clName +" , "+ section);
				$.post("<?php echo site_url('index.php/configureClassControllers/deleteClass')?>",
						{
							rowId : id,
							clName : clName,
							section : section
						},
						function(data){
							$("#success").html(data);
						}
				);
			});
		<?php endfor; ?>
    
        Main.init();
        SVExamples.init();
        
    });
</script>