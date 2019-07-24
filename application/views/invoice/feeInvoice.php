<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
  <title>Fee Invoice</title>
  <link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
  <link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css' />
  <link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
  <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
  <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>
  <style type="text/css">
  @media print
  {
      body * { visibility: hidden; }
      #printcontent * { visibility: visible; }
      #printcontent { position: absolute; } 
  }
  
  .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
  
  
  .button2 {
  background-color: #008CBA; 
  color: white; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #4CAF50;
  color: white;
  border: 2px solid #4CAF50;
}

  </style>
    <script>
        function convert_number(number)
        {
            if ((number < 0) || (number > 999999999))
            {
                return "Number is out of range";
            }
            var Gn = Math.floor(number / 10000000);  
            number -= Gn * 10000000;
            var kn = Math.floor(number / 100000);     /* lakhs */
            number -= kn * 100000;
            var Hn = Math.floor(number / 1000);      /* thousand */
            number -= Hn * 1000;
            var Dn = Math.floor(number / 100);       /* Tens (deca) */
            number = number % 100;               /* Ones */
            var tn= Math.floor(number / 10);
            var one=Math.floor(number % 10);
            var res = "";

            if (Gn>0){
                res += (convert_number(Gn) + " Crore");
            }
            if (kn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(kn) + " Lakhs");
            }
            if (Hn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(Hn) + " Thousand");
            }

            if (Dn){
                res += (((res=="") ? "" : " ") +
                    convert_number(Dn) + " hundred");
            }


            var ones = Array("", "One", "Two", "Three", "Four", "Five", "Six","Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen","Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen","Nineteen");
            var tens = Array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty","Seventy", "Eigthy", "Ninety");

            if (tn>0 || one>0)
            {
                if (!(res==""))
                {
                    res += " and ";
                }
                if (tn < 2)
                {
                    res += ones[tn * 10 + one];
                }
                else
                {

                    res += tens[tn];
                    if (one>0)
                    {
                        res += ("-" + ones[one]);
                    }
                }
            }

            if (res=="")
            {
                res = "zero";
            }
            return res;
        }

    </script>
</head>

<body>
    

<?php //else{?>
      <div id="printcontent" style="width:100%;">
      <h3 class="text-danger text-center text-uppercase">Student Reciept</h3>
  <div id="page-wrap" style="border:1px solid #333; width: 95%; margin: 0 auto;">
<?php 
$tdiscount=0;
//$school_code=$this->session->userdata("school_code");
  //$this->db->where("id",$school_code);
  $info =$this->db->get("general_settings")->row();

  $sid=$this->uri->segment(4);
  $this->db->where("s_no",$sid);
  $rowc =$this->db->get("student_info")->row();
  
  $this->db->where("id",$rowc->class_id);
    //$this->db->where("school_code",$school_code);
  $classname =$this->db->get("class_info")->row();
?>
<div style="margin:5px;">
    <table style="width: 100%; border:1px solid black; ">
    <tbody>
    <tr style="background-color:#a1d657" class='text-uppercase'>
       
        <td style="border: none; text-align:center;">
          <span style="text-transform:uppercase; margin-top:0; margin-bottom:0; font-size:15px;"><b><?php echo $info->your_school_name; ?></b></span><br>
              <span style="font-variant:small-caps; margin-top:0; margin-bottom:0; font-size:12px"><?php echo $info->address_1." ,".$info->city; ?></span>
              <span style="font-variant:small-caps; margin-top:0; margin-bottom:0;font-size:12px">,<?php echo $info->state." - ".$info->pin; ?></span><br>
               <?php if(strlen($info->fax_number > 0 )){ $mno=$info->fax_number;}else{ $mno=" ";}?>
              <span style="font-variant:small-caps; margin-top:0; margin-bottom:0;font-size:12px"><?php if(strlen($info->mobile_number > 0 )){echo "Mobile Number : ".$info->mobile_number.",".$mno ;}else{echo N/A;} ?>
                 </span>
        </td>
       
      </tr>
      </tbody>
    </table>
    </div>
    <hr style="margin-top:5px; margin-bottom:0;">
    <div style="clear:both"></div>
    <div id="customer" style="margin:7px;">
          <div style="display:inline-block; background-color:#e5952d;">
            <table> 
                    <tbody style="">
          <tr class='text-uppercase'>
                      <td class="meta-head" style="padding:5px; font-size:12px;">
            <b>Student Name</b>
            <td style="padding:5px; font-size:12px;"><?php echo $rowc->name; ?></td>
                        </td>
                    </tr>
                    <tr class='text-uppercase'>
                      <td class="meta-head" style="padding:5px; font-size:12px;">
            <strong>Fathers Name</strong><td style="padding:5px; font-size:12px;"> <?php echo $pInfo->father_full_name; ?></td>
                        </td>
                    </tr>
          <tr class='text-uppercase'><?php $this->db->where('id',$classname->section);
          $section=$this->db->get('class_section')->row();
          $this->db->where('id',$classname->streem);
          $str=$this->db->get('stream')->row();

          ?>
                      <td class="meta-head" style="padding:5px; font-size:12px;">
            <strong>Shift & Unit & Trade </strong><td style="padding:5px; font-size:12px;"><?php echo $classname->class_name ;?> & <?php echo $section->section ;?> <?php echo $str->stream;?>
            </td></td>
                    </tr>
                    <tr class='text-uppercase'>
                      <td class="meta-head" style="padding:5px; font-size:12px;">
            <strong>  Address  </strong>  <td style="padding:5px; font-size:12px;"><?php echo $rowc->address1.' '.$rowc->city.' - '.$rowc->pin_code;  ?></td>
            </td>
                    </tr>
                    </tbody>
      </table>
      </div>
          
            <div style="display:inline-block; background-color:#e5952d">
            <table style="width:490px">
                <tbody>
        <tr class='text-uppercase'>
                    <td class="meta-head" style="padding: 0 5px 0 5px; font-size:12px;"><b>Reciept No</b></td>
                    <td style="padding: 0 5px 0 5px; font-size:12px;"><?php echo $rowb->invoice_no; ?></td>
                </tr>
                <tr class='text-uppercase'>
                    <td class="meta-head" style="padding: 0 5px 0 5px; font-size:12px;"> <b>Student ID </b></td>
                    <td style="padding: 0 5px 0 5px; font-size:12px;" ><?php echo $rowc->enroll_num; $id = $rowc->s_no; ?></td>
                </tr>
               <tr class='text-uppercase'>
                    <td class="meta-head" style="padding: 0 5px 0 5px; font-size:12px;"> <b>Payment Mode </b></td>
                     <td style="padding: 0 5px 0 5px; font-size:12px;"><?php if($rowb->payment_mode=="1"){echo "Cash Payment";}elseif($rowb->payment_mode=="2"){ echo "Online Transfer";}elseif($rowb->payment_mode=="3"){ echo "Bank Challan";}elseif($rowb->payment_mode=="4"){ echo "Cheque";}elseif($rowb->payment_mode=="5"){ echo "Swap Machine";}else{ echo "Cash Payment";} ?></td>
                </tr>
        <?php //$this->db->where('school_code',$school_code);
         $applymonth=$this->db->get("late_fees")->row()->apply_method;
        ?>
                <tr class='text-uppercase'>
                    <td class="meta-head"  style="padding: 0 5px 0 5px; font-size:12px;"> <b>Number Of Month </b></td>
                    <td style="padding: 0 5px 0 5px; font-size:12px;">

                      <script> document.write(convert_number(<?php echo ($rowb->deposite_month)*($applymonth); ?>)); </script>

          </td>
                </tr>
                <?php 
               if($this->uri->segment(5)>0){
        $fsd_id = $this->uri->segment(5);
          }else{
          $fsd_id=$this->session->userdata('fsd');
        }
        //$this->db->where("school_code",$school_code);
        $this->db->where("id",$fsd_id);
         $fsddate=$this->db->get("fsd")->row()->finance_start_date;?>
                <tr class='text-uppercase'>
                    <td class="meta-head" style="padding: 0 5px 0 5px; font-size:12px;"> <b>Deposite Date </b></td>
                    <td style="padding: 0 5px 0 5px; font-size:12px;">
                      <?php 
                      echo date("d-M-y",  strtotime($rowb->diposit_date));
            ?>          </td>
                </tr>
                <tr class='text-uppercase'>
                     <td class="meta-head" style="padding: 0 5px 0 5px; font-size:12px;"> <b>Fee of Month </b></td>
                    <td style="padding: 0 5px 0 5px; font-size:12px;">

                      <?php 
                        $this->db->where("invoice_no",$rowb->invoice_no);
                      //$this->db->where("school_code",$this->session->userdata("school_code"));
          $rty =  $this->db->get("deposite_months");
          $monthmk=array();
          $demont = $rty->num_rows();
                   $i=0; foreach($rty->result() as $tyu):
                       if($tyu->deposite_month<4){
                         $ffffu=  $tyu->deposite_month-4+12;
                    
                       }else{
                        $ffffu= $tyu->deposite_month-4;}
          
            echo  date('M-Y', strtotime("$ffffu months", strtotime($fsddate))).", ";
            $monthmk[$i]=$tyu->deposite_month;
                      //echo date("d-M-y", $rdt);
          $i++; endforeach;           
$monthmk[$i]=13;?>
                </td></tr>
            </tbody></table>
            </div>
    
    </div>
    <div style="margin:5px;">
    <table id="items" style="margin: 5px 0 0 0;">
      <tbody style=" background-color:#ffff99">
          <tr class='text-uppercase'>
                <td colspan="3" align="center" style="background-color:green; color:white;" ><b>Admission Fee Detail</b></td>
          </tr>
      <tr class='text-uppercase'>
           <th class="col-sm-1 text-center">No.</th>
               <th class="col-sm-8">Fee Name</th>
               <th class="col-sm-3 text-center">Fee Amount</th>
      </tr>
  
          <?php 
          $this->db->where("s_no",$rowc->s_no);
          $stuid_details = $this->db->get("student_info")->row();
          $feecata[0] = $rowb->feecat;
          $feecata[1]=0;
          $this->db->distinct();
          $this->db->select("*"); 
          $this->db->where_in("cat_id",$feecata);
          $this->db->where_in('taken_month',$monthmk);
           $this->db->where('fsd',$rowb->finance_start_date);
          $this->db->where("class_id",$stuid_details->class_id);
          $fee_head = $this->db->get("class_fees");
          $total=0;
          if($fee_head->num_rows()>0)
          { $i=1;
                    
              foreach($fee_head->result() as $feeh):
              
              if($feeh->fee_head_name!= NULL){?>                      
          <tr class='text-uppercase'>
          <td class="col-sm-1 text-center"><b> <?php echo $i;?></b></td>
          <td class="col-sm-8"><b><?php echo $feeh->fee_head_name;?></b></td>
          <td class="col-sm-3 text-center"><?php  if($feeh->taken_month==13){ $total+=$feeh->fee_head_amount*$demont; echo $feeh->fee_head_amount*$demont;}else{ $total+=$feeh->fee_head_amount; echo $feeh->fee_head_amount;}?></td>
          </tr>
          <?php $i++; }
           endforeach;}?>
                                
        

             <tr class='text-uppercase'>
              <td class="col-sm-1 text-center"><b><?php echo $i;?></b></td>
          <td class="col-sm-8"><b><?php echo "LATE FEE"; ?></b></td>
          <td class="col-sm-3  text-center"><?php echo $lfee=$rowb->late; $i++;?></td>
        </tr>
         <tr class='text-uppercase'>
              <td class="col-sm-1 text-center"><b><?php echo $i;?></b></td>
          <td class="col-sm-8"><b><?php echo "DISCOUNT"; ?></b></td>
          <td class="col-sm-3  text-center"><?php echo $discount=$discount->discount_rupee; $i++;?></td>
        </tr>
         <?php  $this->db->where("student_id",$rowb->student_id);
      $this->db->where("invoice_no",$rowb->invoice_no);
      $this->db->where("school_code",$rowb->school_code);
      $mbalance=$this->db->get('feedue');
      ?> 
        <tr class='text-uppercase'>
              <td class="col-sm-1 text-center"><b><?php echo $i;?></b></td>
          <td class="col-sm-8"><b><?php echo "PREVIOUS MONTH BALANCE"; ?></b></td>
          <td class="col-sm-3 text-center"><?php  echo $prbalanace=$rowb->previous_balance; $i++;?></td>
        </tr> 
        <!--<hr style="margin-top:5px; margin-bottom:0;">-->
        
        </tbody>
          </table>

          <table style="width:100%; margin-top:2px; background-color:#4286f4">
      
          <tr class='text-uppercase'>
          <?php $this->db->where("student_id",$rowb->student_id);
      $this->db->where("invoice_no",$rowb->invoice_no);
     // $this->db->where("school_code",$rowb->school_code);
      $mbalance=$this->db->get('feedue');
      
       // $this->db->where('id',$school_code);
      $schoolname=$this->db->get('general_settings')->row()->your_school_name;
      ?>
          <td class="col-sm-7" rowspan="3" style="color:white;" >
          <strong>   Recieved by :</strong><?php echo $schoolname; ?> &nbsp <strong>Paid By :</strong> <?php echo $rowc->enroll_num;?><br>
          <strong>Paid Amount in Words : </strong><script> document.write(convert_number(<?php echo $rowb->paid; ?>)); </script> Only /-<br>
This is computer generated copy it not require any signature or stamp.
          
          </td>
        
          <td class="col-sm-2 text-center"  style="background-color:#caf441" > <strong>Total</strong> </td>
          <td class="col-sm-3 text-center"  style="background-color:#caf441"   ><?php echo sprintf('%0.2f',$total+$lfee+$prbalanace); ?> </td>
          </tr>
        
          <tr class='text-uppercase'>
          <td class="text-center text-nowrap"  style="background-color:#caf441" > <strong>Amount Paid</strong></td>
          <td class="text-center" style="background-color:#caf441" ><?php echo $rowb->paid; ?></td>
          </tr>
          <tr class='text-uppercase'>
          <td class="text-center text-nowrap"  style="background-color:#caf441" ><strong>Balance Due</strong></td>
          
          <td class="text-center"  style="background-color:#caf441" ><?php if($mbalance->num_rows()>0) { echo sprintf('%0.2f',$mbalance->row()->mbalance);}else{ echo '0.00';} ?></td>
          </tr>
          </table>
  
    </div>
  </div>
  </div>
</div>
    <?php //} ?>
</body><div class="invoice-buttons" style="text-align:center;">
 
 <button class="button button2" type="button"  onclick="window.print();">
     Print Reciept
    </button>  
  </div>

<!--  -->
</html>