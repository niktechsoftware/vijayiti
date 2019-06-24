<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
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
		
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/autosize/jquery.autosize.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-maskmoney/jquery.maskMoney.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/commits.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jQuery-Tags-Input/jquery.tagsinput.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/ckeditor/adapters/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/form-elements.js"></script>
		
		<script src="<?php echo base_url(); ?>assets/plugins/mixitup/src/jquery.mixitup.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/lightbox2/js/lightbox.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/pages-gallery.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE JAVASCRIPTS  -->
		<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
		<!-- end: CORE JAVASCRIPTS  -->
		<script>
		
			jQuery(document).ready(function() {
				
				$("#editProfile").click(function(){
					//alert("rahul");
					var your_school_name  = $("#your_school_name").val();
					var principle_name = $("#principle_name").val();
					var language = $("#language").val();
					var attendance_type = $("#attendance_type").val();									
					var finance_start_date = $("#finance_start_date").val();
					var finance_end_date = $("#finance_end_date").val();
					var wise_principle_name = $("#wise_principle_name").val();
					var trusty_name_1 = $("#trusty_name_1").val();
					var trusty_name_2 = $("#trusty_name_2").val();
					var trusty_name_3 = $("#trusty_name_3").val();
					var trusty_name_4 = $("#trusty_name_4").val();
					var collage_registration_number = $("#collage_registration_number").val();
					var recognition_number = $("#recognition_number").val();
					var school_code = $("#school_code").val();
					var address_1 = $("#address_1").val();
					var address_2 = $("#address_2").val();
					var city = $("#city").val();
					var state = $("#state").val();
					var pincode = $("#pin").val();
					var nationality = $("#nationality").val();
					var phone_number = $("#phone_number").val();
					var mobile_number = $("#mobile_number").val();
					var fax_number = $("#fax_number").val();
					var email1 = $("#email1").val();
					var email2 = $("#email2").val();
					
					var form_data = {
						your_school_name : your_school_name,
						principle_name : principle_name,
						language : language,
						attendance_type : attendance_type,
						finance_start_date : finance_start_date,
						finance_end_date : finance_end_date,
						wise_principle_name : wise_principle_name,
						trusty_name_1 : trusty_name_1,
						trusty_name_2 : trusty_name_2,
						trusty_name_3 : trusty_name_3,
						trusty_name_4 : trusty_name_4,
						collage_registration_number : collage_registration_number,
						recognition_number : recognition_number,
						school_code : school_code,
						address_1 : address_1,
						address_2 : address_2,
						city : city,
						state : state,
						pin : pincode,
						nationality : nationality,
						phone_number : phone_number,
						mobile_number : mobile_number,
						fax_number : fax_number,
						email1 : email1,
						email2 : email2
						};
						$.ajax({
								url: "<?php echo site_url("index.php/adminController/updateAdminProfile") ?>",
								type: 'POST',
								data: form_data,
								success: function(msg){
									$("#adminProfileConfirm").html(msg);
								}
							});
						});


				$("#changePassword").click(function(){
					//alert("rahul");
					var old_password  = $("#old_password").val();
					var password = $("#password").val();
					var cPassword = $("#cPassword").val();
					var form_data = {
						old_password : old_password,
						password : password,
						cPassword : cPassword
						};
						$.ajax({
							url: "<?php echo site_url('index.php/adminController/changeAdminPassword') ?>",
							type: 'POST',
							data: form_data,
							success: function(msg){
								$("#adminPasswordAlert").html(msg);
							}
						});
					$("#old_password").val("");
					$("#password").val("");
					$("#cPassword").val("");
				});
				
				Main.init();
				SVExamples.init();
				FormElements.init();
				PagesGallery.init();
				
			});
		</script>