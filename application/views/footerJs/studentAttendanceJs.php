<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>assets/plugins/respond.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
		<!--<![endif]-->
		<script src="<?php echo base_url();?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
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
		<script src="<?php echo base_url();?>assets/js/subview.js"></script>
		<script src="<?php echo base_url();?>assets/js/subview-examples.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/tableExport.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jquery.base64.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/html2canvas.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jquery.base64.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jspdf/libs/sprintf.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jspdf/jspdf.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jspdf/libs/base64.js"></script>
		<script src="<?php echo base_url();?>assets/js/table-export.js"></script>
		
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE JAVASCRIPTS  -->
		<script src="<?php echo base_url();?>assets/js/main.js"></script>
	
		<!-- end: CORE JAVASCRIPTS  -->
		<script>
		
			jQuery(document).ready(function() {
				$("#sonu").hide();
				
			
				$("#classv").change(function(){
					var classv = $("#classv").val();
					//alert(teacherid);
					$.post("<?php echo site_url("index.php/teacherController/getSection") ?>",{classv : classv}, function(data){
						$("#sectionId").html(data);
						});
					});
				$("#sectionId").change(function(){
					var section = $("#sectionId").val();
					var classv = $("#classv").val();
					var teacherid = $("#teacherid").val();
				$.post("<?php echo site_url("index.php/teacherController/presentiH") ?>",{section : section,classv : classv}, function(data){
						$("#sample_rahul1").html(data);
						});
				$.post("<?php echo site_url("index.php/teacherController/presenti") ?>",{section : section,classv : classv,teacherid : teacherid}, function(data){
					$("#sample_rahul").html(data);
					});
				$("#sonu").show();
					});

//for attendance 2
			$("#classva2").change(function(){
					var classv = $("#classva2").val();
					//alert(teacherid);
					$.post("<?php echo site_url("index.php/teacherController/getSection") ?>",{classv : classv}, function(data){
						$("#sectionIda2").html(data);
						});
					});
				$("#sectionIda2").change(function(){
					var section = $("#sectionIda2").val();
					var classv = $("#classva2").val();
					var teacherid = $("#teacherid").val();
				$.post("<?php echo site_url("index.php/teacherController/presentiHa2") ?>",{section : section,classv : classv}, function(data){
						$("#sample_rahul1").html(data);
						});
				$.post("<?php echo site_url("index.php/teacherController/presentia2") ?>",{section : section,classv : classv,teacherid : teacherid}, function(data){
					$("#sample_rahul").html(data);
					});
				$("#sonu").show();
					});



//

				

				$("#edate").change(function(){
					var edate = $("#edate").val();
					var section = $("#sectionId").val();
					var classv = $("#classv").val();
					var sdate = $("#sdate").val();
					//alert(edate+","+section+","+classv+","+sdate)
					$.post("<?php echo site_url("index.php/teacherController/stuReport") ?>",{edate : edate,section : section,classv : classv,sdate : sdate}, function(data){
					$("#rahul").html(data);
						});
				});


				$("#sonu").change(function(){
					 $("#sonu").show();
				});


				$("#classv12").change(function(){
					var classv = $("#classv12").val();
					//alert(teacherid);
					$.post("<?php echo site_url("index.php/promotionControler/getSection") ?>",{classv : classv}, function(data){
						$("#sectionId12").html(data);
						});
					});
				$("#sectionId12").change(function(){
					var section = $("#sectionId12").val();
					var classv = $("#classv12").val();
					
				$.post("<?php echo site_url("index.php/promotionControler/presenti") ?>",{section : section,classv : classv}, function(data){
					$("#sample_rahul").html(data);
					});
				$("#sonu").show();
					});


				
				$("#classv123").change(function(){
					var classv = $("#classv123").val();
					//alert(teacherid);
					$.post("<?php echo site_url("index.php/promotionControler/getSection") ?>",{classv : classv}, function(data){
						$("#sectionId123").html(data);
						});
					});
				$("#sectionId123").change(function(){
					var section = $("#sectionId123").val();
					var classv = $("#classv123").val();
					
				$.post("<?php echo site_url("index.php/promotionControler/presenti12") ?>",{section : section,classv : classv}, function(data){
					$("#sample_rahul123").html(data);
					});
				$("#sonu").show();
					});
				$("#radate").change(function(){
					var radate = $("#radate").val();
					
					$.post("<?php echo site_url("index.php/teacherController/attenMsg") ?>",{radate : radate}, function(data){
						$("#showmsg1").html(data);
						});
					});
				
			
				Main.init();
				SVExamples.init();
				TableExport.init();
					
				
			});
		</script>