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
		<script src="<?php echo base_url(); ?>assets/js/studentList.js"></script>
		<!-- end: CORE JAVASCRIPTS  -->
		<script>
			jQuery(document).ready(function() {

				empList();
				function empList(){
					if($('#enroll_num:checked').val()?true:false){
						var enroll_num = $("#enroll_num").val();
					}else{
						var enroll_num = "";
					}
					
					if($('#name:checked').val()?true:false){
						var name = $("#name").val();
					}else{
						var name = "";
					}
					
					if($('#unit:checked').val()?true:false){
						var unit = $("#unit").val();
					}else{
						var unit = "";
					}
					
					if($('#address1:checked').val()?true:false){
						var address1 = $("#address1").val();
					}else{
						var address1 = "";
					}

					if($('#dob:checked').val()?true:false){
						var dob = $("#dob").val();
					}else{
						var dob = "";
					}

					if($('#registration_no:checked').val()?true:false){
						var registration_no = $("#registration_no").val();
					}else{
						var registration_no = "";
					}

					if($('#gender:checked').val()?true:false){
						var gender = $("#gender").val();
					}else{
						var gender = "";
					}

					if($('#admission_date:checked').val()?true:false){
						var admission_date = $("#admission_date").val();
					}else{
						var admission_date = "";
					}

					if($('#category:checked').val()?true:false){
						var category = $("#category").val();
					}else{
						var category = "";
					}

					if($('#religion').val()?true:false){
						var religion = $("#religion").val();
					}else{
						var religion = "";
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

					if($('#mobile:checked').val()?true:false){
						var mobile = $("#mobile").val();
					}else{
						var mobile = "";
					}

					if($('#shift:checked').val()?true:false){
						var shift = $("#shift").val();
					}else{
						var shift = "";
					}

					if($('#trade:checked').val()?true:false){
						var trade = $("#trade").val();
					}else{
						var trade = "";
					}

					if($('#father_full_name:checked').val()?true:false){
						var father_full_name = $("#father_full_name").val();
					}else{
						var father_full_name = "";
					}

					if($('#mother_name:checked').val()?true:false){
						var mother_name = $("#mother_name").val();
					}else{
						var mother_name = "";
					}

					if($('#f_mobile:checked').val()?true:false){
						var f_mobile = $("#f_mobile").val();
					}else{
						var f_mobile = "";
					}

					
					$.post("<?php echo site_url("index.php/studentController/studentList") ?>",{
						enroll_num : enroll_num,
						name : name,
						unit : unit,
						address1 :address1,
						
						dob : dob,
						registration_no : registration_no,
						gender : gender,
						admission_date : admission_date,
						
						category : category,
						religion : religion,
						shift : shift,
						city : city,
						state : state,
						pin_code : pin_code,
						trade : trade,
						mobile : mobile,
						
						father_full_name : father_full_name,
						mother_name : mother_name,
						
						f_mobile : f_mobile
						
						},function(data){
						$("#dynamicStudentList").html(data);
					});
				}

				$('input[name="chk[]"]').on("click",function(){
						var atLeastOneIsChecked = $('input[name="chk[]"]:checked').length;
						if(atLeastOneIsChecked > 15){
							alert("Maximum 15 Column are allowed at a time.");
						}
						else{
							if($('#enroll_num:checked').val()?true:false){
								var enroll_num = $("#enroll_num").val();
							}else{
								var enroll_num = "";
							}
							
							if($('#name:checked').val()?true:false){
								var name = $("#name").val();
							}else{
								var name = "";
							}
							
							if($('#unit:checked').val()?true:false){
								var unit = $("#unit").val();
							}else{
								var unit = "";
							}
							
							if($('#address1:checked').val()?true:false){
								var address1 = $("#address1").val();
							}else{
								var address1 = "";
							}

							if($('#dob:checked').val()?true:false){
								var dob = $("#dob").val();
							}else{
								var dob = "";
							}

							if($('#registration_no:checked').val()?true:false){
								var registration_no = $("#registration_no").val();
							}else{
								var registration_no = "";
							}

							if($('#gender:checked').val()?true:false){
								var gender = $("#gender").val();
							}else{
								var gender = "";
							}

							if($('#admission_date:checked').val()?true:false){
								var admission_date = $("#admission_date").val();
							}else{
								var admission_date = "";
							}

							if($('#category:checked').val()?true:false){
								var category = $("#category").val();
							}else{
								var category = "";
							}

							if($('#religion').val()?true:false){
								var religion = $("#religion").val();
							}else{
								var religion = "";
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

							if($('#mobile:checked').val()?true:false){
								var mobile = $("#mobile").val();
							}else{
								var mobile = "";
							}

							if($('#shift:checked').val()?true:false){
								var shift = $("#shift").val();
							}else{
								var shift = "";
							}

							if($('#trade:checked').val()?true:false){
								var trade = $("#trade").val();
							}else{
								var trade = "";
							}

							if($('#father_full_name:checked').val()?true:false){
								var father_full_name = $("#father_full_name").val();
							}else{
								var father_full_name = "";
							}

							if($('#mother_name:checked').val()?true:false){
								var mother_name = $("#mother_name").val();
							}else{
								var mother_name = "";
							}

							if($('#f_mobile:checked').val()?true:false){
								var f_mobile = $("#f_mobile").val();
							}else{
								var f_mobile = "";
							}

							
							$.post("<?php echo site_url("index.php/studentController/studentList") ?>",{
								enroll_num : enroll_num,
								name : name,
								unit : unit,
								address1 :address1,
								
								dob : dob,
								registration_no : registration_no,
								gender : gender,
								admission_date : admission_date,
								
								category : category,
								religion : religion,
								shift : shift,
								city : city,
								state : state,
								pin_code : pin_code,
								trade : trade,
								mobile : mobile,
								
								father_full_name : father_full_name,
								mother_name : mother_name,
								
								f_mobile : f_mobile
								
								},function(data){
								$("#dynamicStudentList").html(data);
							});
						}
				});
				Main.init();
				SVExamples.init();
			});
		</script>