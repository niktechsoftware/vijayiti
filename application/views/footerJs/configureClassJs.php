<!-- start: MAIN JAVASCRIPTS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->

<!--<![endif]-->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
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
        $.post("<?php echo site_url('index.php/configureClassControllers/addStream') ?>", {streamName : ''}, function(data){
        	
            $("#streamList1").html(data);
		});

        $.post("<?php echo site_url('index.php/configureClassControllers/addSection') ?>", {sectionName : ''}, function(data){
            $("#sectionList").html(data);
            //alert(data);
		});

        $.post("<?php echo site_url('index.php/configureClassControllers/addClass') ?>",{
    				className : '',
    				classStream : '',
    				classSection : ''
	    			}, function(data){
            $("#classDetail").html(data);
            //alert(data);
		});
		
        $("#addStreamButton").click(function(){
        	
    		var streamName = $('#addStream').val();	
    		//alert(streamName);
    		$.post("<?php echo site_url('index.php/configureClassControllers/addStream') ?>", {streamName : streamName}, function(data){
                $("#streamList1").html(data);
                //alert(data);
    		});
    		$('#addStream').val("");
        });

        $("#addSectionButton").click(function(){
    		var sectionName = $('#addSection1').val();	
    		//alert(sectionName);
    		$.post("<?php echo site_url('index.php/configureClassControllers/addSection') ?>", {sectionName : sectionName}, function(data){
                $("#sectionList").html(data);
                //alert(data);
    		});
    		$('#addSection1').val("");
        });

        $("#classSave").click(function(){
    		var className = $("#className").val();
    		var classStream = $("#classStream").val();
    		var classSection = $("#classSection").val();
    		
    		if(!(className == "" || classStream == "" || classSection == "")){
    			$.post("<?php echo site_url('index.php/configureClassControllers/addClass') ?>", 
    	    		{
    				className : className,
    				classStream : classStream,
    				classSection : classSection
	    			}, 
	    				function(data){
                    $("#classDetail").html(data);
                    //alert(data);
        		});
    		}
    		$("#className").val("");
    		$("#classStream").val("");
    		$("#classSection").val("");
        });

         $("#createfsd").click(function(){
          
        var startdate = $('#startdate').val();
         var enddate = $('#enddate').val(); 
       alert("Your fsd is successfully created");

        $.post("<?php echo site_url('index.php/configureClassControllers/addfsd') ?>", {startdate : startdate,enddate:enddate}, function(data){
            $("#showfsd").html(data);
                //alert(data);
        });
        $('#startdate').val("");
         $('#enddate').val("");
        });

           $("#Applyfsd").click(function(){
          
        var fsdid = $('#fsdselect').val();
       // conformbox('Your want to Apply new fsd');
        alert("Your fsd is successfully Apply");
        $.post("<?php echo site_url('index.php/allFormController/updatefsd') ?>", {fsdid : fsdid,}, function(data){
            $("#showfsd1").html(data);
               // alert(data);
        });
        $('#fsdselect').val("");
        //  $('#enddate').val("");
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
            $.post("<?php echo site_url('index.php/configureFeeController/getfeeheadcategory') ?>", {className : clname, stream : stream, section : section}, function(data){
                $("#subjectBox").html(data);
               // alert(data);
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
                
              $.post("<?php echo site_url('configureFeeController/getfeeheadcategory') ?>",{classid : classid}, function(data){
               //alert(data);
                      $("#subjectBox").html(data);
                       
                    });
                });

          $("#addfeecatButton").click(function(){
            
            var streamName = $('#addfeecategory').val();
            alert("Fee Category successfully created");
            $.post("<?php echo site_url('index.php/configureClassControllers/addfeecategory') ?>", {streamName : streamName}, function(data){
                $("#feeList1").html(data);
                //alert(data);
            });
            $('#addfeecategory').val("");


        });




           
        
        
        Main.init();
        SVExamples.init();
    });
</script>

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