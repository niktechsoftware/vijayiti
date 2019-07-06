<!-- start: PAGE CONTENT -->
<div class="row">
  <div class="col-sm-12">
    <!-- start: INLINE TABS PANEL -->
    <div class="panel panel-white">
     
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="tabbable">
              <ul id="myTab" class="nav nav-tabs">
                <li class="active">
                  <a href="#myTab_example1" data-toggle="tab">
                    <i class="green fa fa-home"></i>FSD(Financial Start Date) Section
                  </a>
                </li>
                <li>
                  <a href="#myTab_example2" data-toggle="tab">
                    <i class="green fa fa-home"></i> Class Fees Update
                  </a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade in active" id="myTab_example1">
                  <div class="alert alert-danger">
                    <button data-dismiss="alert" class="close">×</button>
                    <h3 class="media-heading text-center">Welcome to FSD Section</h3>
                    <a class="alert-link" href="#"></a>
                   This is very Important to Create FSD(Financial Start Date) First because School or College requires a Financial Start Date and Financial End Date .You Can not change Financial Start Date and Financial End Date after creating and declare the FSD.
                  If You change its may affect Your Fee Structure and Other Section.
                  </div>
                 <div class="row">
                    <div class="col-sm-6">
                      <div class="panel panel-calendar">
                        <div class="panel-heading panel-blue border-light">
                          <h4 class="panel-title text-center">Create FSD Section</h4>
                        </div>
                        <div class="panel-body">
                        <div class="text-black text-large">
                         Start Date <input type="date"   id="startdate" name="startdate" required>
                         End Date  <input type="date" id="enddate" required><br><br>
                         <center><a href="#" class="btn btn-sm btn-blue" id="createfsd"><i class="fa fa-check">
                            
                            </i>
                              Create FSD </a> </center>
                              </<br><br><br>
                            <div class="alert alert-warning">Select  Financial Start  Date and Financial End Date.
                             If FSD Successfully  added then it Shows in right side panel where You can not change Any of the Date.
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="panel panel-calendar">
                        <div class="panel-heading panel-green border-light">
                          <h4 class="panel-title text-center">Old/Current FSD Section </h4>
                        </div>
                        <div class="panel-body">
                        <?php 
                        $fsd=$this->db->get('fsd')->result();
                         ?>
                         <div class="panel-body panel-scroll height-450" >
                        <table class="table table-bordered table-hover ">
                        <thead>
                        <tr class="text-center">
                         <th>FSD ID </th>
                        <th>Financial Start Date</th>
                        <th>Financial End Date</th>
                        </tr>
                      </thead>
                       <tbody>
                        <?php foreach($fsd as $row){?>
                         <tr>
                        <td class="text-center"><?php echo $row->id;?> </td>
                          <td class="text-center"><?php echo date("d-M-Y", strtotime($row->finance_start_date));?></td>
                          <td class="text-center"><?php echo date("d-M-Y", strtotime($row->finance_end_date));?></td>
                        </tr>
                       <?php   }?>
                        </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
 
          </div>
       
                <div class="tab-pane fade" id="myTab_example2">
                  <div class="alert alert-info">
                    <button data-dismiss="alert" class="close">
                      ×
                    </button>
                    <h3 class="media-heading text-center">Welcome to  Update Class Fee Area </h3>
                    <a class="alert-link" href="#"></a>
                    This is important to Update Class Fee  after Creating  Financial Start  Date and Financial End Date and update the class fees with new FSD.
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="panel panel-calendar">
                        <div class="panel-heading panel-red border-light">
                          <h4 class="panel-title">Current Class Fees</h4>
                        </div>
                        <div class="panel-body">
                          <div class="text-black text-large">
                             <div class="panel-body panel-scroll height-250" >
                           <?php 
                         $this->db->where('fsd',$this->session->userdata('fsd'));
                           $data=$this->db->get('class_fees')->result();
                          ?>     
                        <table class="table table-bordered table-hover ">
                        <thead>
                        <tr class="text-center">
                         <th>FSD ID </th>
                        <th>Fee Head Name</th>
                        <th>Fee Amount</th>
                        </tr>
                      </thead>
                       <tbody>
                        <?php foreach($data as $row1){?>
                         <tr>
                           <td class="text-center"><?php echo $row1->fsd;?> </td>
                          <td class="text-center"><?php echo $row1->fee_head_name;?></td>
                          <td class="text-center"><?php echo $row1->fee_head_amount;?></td>
                        </tr>
                       <?php   }?>
                        </tbody>
                      </table>
                      </div> 
                      </div>
                         <div class="alert alert-danger">
                         <p>This panel shows the class fee with current FSD .
                         Here You can not  update or change any anything.</p>
                        </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="panel panel-calendar">
                        <div class="panel-heading panel-blue border-light">
                          <h4 class="panel-title">New FSD Update</h4>
                        </div>
                        <div class="panel-body">
                          <select  id="fsdselect" class="form-control">
                          <option value="">-Select FSD -</option>
                          <?php
                              foreach($fsd as $v):?>
                              <option value="<?php echo $v->id;?>">
                              <?php echo $v->id."[".$v->finance_start_date."]";?></option>
                                  <?php endforeach;?>
                                </select>  <br></br>  
                             <center><a href="#" class="btn btn-sm btn-blue" id="Applyfsd"><i class="fa fa-check">
                            
                            </i>
                              Apply FSD </a> </center>
                              <br></br>
                        </div>
                        <div id="showfsd1">
                          
                        </div>
                    
                        <div class="alert alert-success">
                        <p>Select FSD from the dropdown  and Press Apply FSD Button.which is new FSD for Your School or College.</p>
                        </div>
                      </div>
                    </div>
                 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end: INLINE TABS PANEL -->
    </div>
  </div>
</div>
<!-- end: PAGE CONTENT-->
