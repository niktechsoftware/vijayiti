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
		<!-- end: CORE JAVASCRIPTS  -->
		<script>
			jQuery(document).ready(function() {
				$('input[name="month[]"]').on("click",function(){
					<?php for($i = 1; $i <= 18; $i++):?>
						if(($('#month<?php echo $i;?>:checked').val()?true:false) && ($('#annual<?php echo $i;?>:checked').val()?true:false)){
							$('#month<?php echo $i;?>').attr('checked', false);
							alert("Same feetype can not be both Monthly & annual.");
						}
					<?php endfor;?>
				});
				$('input[name="annual[]"]').on("click",function(){
					<?php for($i = 1; $i <= 18; $i++):?>
						if(($('#month<?php echo $i;?>:checked').val()?true:false) && ($('#annual<?php echo $i;?>:checked').val()?true:false)){
							$('#annual<?php echo $i;?>').attr('checked', false);
							alert("Same feetype can not be both Monthly & annual.");
						}
					<?php endfor;?>
				});

			
						   
			
                                $("#reset").click(function(){
            
            var applymethod = $('#applymethod').val(); 
           
        if (confirm("Are you sure that you want to change your fee apply method ...If you click on RESET Button then all Your Fee Head is also Deleted")) {
        $.post("<?php echo base_url('configureFeeController/resetapply_method') ?>", {applymethod : applymethod}, function(data){
                $("#demo").html(data);
                //alert(data);
            });
            $('#demo').val("");
         } 

        });


		

  $("#head").change(function(){
        var post_url = '<?php echo base_url() ?>configureFeeController/apply_method'
    $.ajax({
   type: "POST",
   url: post_url,
  data : { "hid" : $(this).val() },
   success: function(response){
	$.each(response, function(value, key) {
	 $("#trtrtr").html(data);
	})
}

});
});
  
        $("#clname").change(function(){
            var clname = $("#clname").val();
            //alert(clname);
            $.post("<?php echo site_url('index.php/configureClassControllers/getStream') ?>", {className : clname}, function(data){
                $("#streamList").html(data);
                //alert(data);
    		});
        });

        $("#streamList").change(function(){
            var clname = $("#clname").val();
            var stream = $("#streamList").val();
            //alert(clname);
            $.post("<?php echo site_url('index.php/configureClassControllers/getSection') ?>", {className : clname, stream : stream}, function(data){
                $("#section").html(data);
                //alert(data);
    		});
        });

        $("#section").change(function(){
            var clname = $("#clname").val();
            var stream = $("#streamList").val();
            var section = $("#section").val();
            //alert(clname);
            $.post("<?php echo site_url('index.php/configureFeeController/getFeeHead') ?>", {className : clname, stream : stream, section : section}, function(data){
                $("#subjectBox").html(data);
                //alert(data);
    		});
        });

         $("#streamListshow").change(function(){
    	            var streamid = $("#streamListshow").val();
    	        
    	          // alert(streamid);
    	            $.post("<?php echo site_url('configureClassControllers/getSectionbyStream') ?>", {streamid : streamid}, function(data){
    	            	// alert(data);
    	                $("#sectionshow").html(data);

    	               
    	    		});
    	        });

          $("#sectionshow").change(function(){
        			
     	            var sectionid = $("#sectionshow").val();
     	             var streamid = $("#streamListshow").val();
     	           // alert(sectionid);
     	             // alert(streamid);
     	            $.post("<?php echo site_url('configureClassControllers/getclass') ?>", {sectionid : sectionid,streamid:streamid}, function(data){
     	            	//alert(data);
     	                $("#classshow").html(data);
     	                //  alert(data);
     	    		});
     	        });

           $("#classshow").change(function(){
    	            var classid = $("#classshow").val();
    	           // var streamid = $("#streamListshow").val();
    	          //  var sectionid = $("#sectionshow").val();
    	          //alert(classid);
    	        
    	      $.post("<?php echo site_url('configureFeeController/getFeeHead') ?>",{classid : classid}, function(data){
    	       //alert(data);
    	              $("#subjectBox").html(data);
    	               
    	    	    });
    	        });








  
  
                    		Main.init();
				SVExamples.init();
				TableExport.init();
			});
		

		</script>