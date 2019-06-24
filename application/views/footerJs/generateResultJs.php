<!-- end: EXPORT DATA TABLE PANEL -->
				<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>assets/plugins/respond.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script>
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
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/tableExport.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jquery.base64.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/html2canvas.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jquery.base64.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jspdf/libs/sprintf.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jspdf/jspdf.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jspdf/libs/base64.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/table-export.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE JAVASCRIPTS  -->
		<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
		<!-- end: CORE JAVASCRIPTS  -->
		<script>
		jQuery(document).ready(function() {
			function empList(){
					if($('#name2:checked').val()?true:false){
						var name = $("#name2").val();
					}else{
						var name = "";
					}
					if($('#emp_no:checked').val()?true:false){
					var emp_no = $("#emp_no").val();
					}else{
						var emp_no = "";
					}

					if($('#job_title:checked').val()?true:false){
					var job_title = $("#job_title").val();
					}else{
						var job_title = "";
					}

					if($('#mobile:checked').val()?true:false){
					var mobile = $("#mobile").val();
					}else{
						var mobile = "";
					}

					if($('#address:checked').val()?true:false){
					var address = $("#address").val();
					}else{
						var address = "";
					}

					if($('#email:checked').val()?true:false){
					var email = $("#email").val();
					}else{
						var email = "";
					}

					if($('#category:checked').val()?true:false){
					var category = $("#category").val();
					}else{
						var category = "";
					}

					if($('#dob:checked').val()?true:false){
					var dob = $("#dob").val();
					}else{
						var dob = "";
					}

					if($('#job_category:checked').val()?true:false){
					var job_category = $("#job_category").val();
					}else{
						var job_category = "";
					}

					if($('#qualification:checked').val()?true:false){
					var qualification = $("#qualification").val();
					}else{
						var qualification = "";
					}

					if($('#experiance:checked').val()?true:false){
					var experiance = $("#experiance").val();
					}else{
						var experiance = "";
					}

					if($('#status:checked').val()?true:false){
					var status = $("#status").val();
					}else{
						var status = "";
					}

					if($('#city:checked').val()?true:false){
					var city = $("#city").val();
					}else{
						var city = "";
					}

					if($('#state:checked').val()?true:false){
					var state = $("#state").val();
					}else{
						var state = "";
					}

					if($('#pin_code:checked').val()?true:false){
					var pin_code = $("#pin_code").val();
					}else{
						var pin_code = "";
					}

					if($('#phone:checked').val()?true:false){
					var phone = $("#phone").val();
					}else{
						var phone = "";
					}

					if($('#join_date:checked').val()?true:false){
					var join_date = $("#join_date").val();
					}else{
						var join_date = "";
					}

					if($('#gender:checked').val()?true:false){
					var gender = $("#gender").val();
					}else{
						var gender = "";
					}
				
					var form_data = {
							name : name,
							emp_no : emp_no,
							job_title : job_title,
							mobile : mobile,
							address : address,
							email : email,
							category : category,
							dob : dob,
							job_category : job_category,
							qualification : qualification,
							experiance : experiance,
							status : status,
							city : city,
							state : state,
							pin_code : pin_code,
							phone : phone,
							join_date : join_date,
							gender : gender
					};
					$.ajax({
							url: "<?php echo site_url("index.php/employeeController/employeeList") ?>",
							type: 'POST',
							data: form_data,
							success: function(msg){
								$("#dynamicEmployeeList").html(msg);
							}
						});
			}
		
				$('input[name="chk[]"]').on("click",function(){
					empList();	
				});

				$("#student_id").keyup(function(){
					var student_id = $("#student_id").val();
					//alert(teacherid);
					$.post("<?php echo site_url("index.php/studentController/checkID") ?>",{student_id : student_id}, function(data){
						$("#validId").html(data);
						});
					});
				Main.init();
				SVExamples.init();
			});
		</script>