
<form action="<?php echo base_url();?>index.php/enterStockController/enterStock"  method ="post" role="form" class="smart-wizard form-horizontal" id="form">
<div class="row">
							<div class="col-md-12">
								<!-- start: RESPONSIVE TABLE PANEL -->
								<div class="panel panel-white">
									<div class="panel-heading">
										<i class="fa fa-external-link-square"></i>
										Enter Stocks here:
										<div class="panel-tools">										
											<div class="dropdown">
											<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
												<i class="fa fa-cog"></i>
											</a>
											<ul class="dropdown-menu dropdown-light pull-right" role="menu">
												<li>
													<a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
												</li>
												<li>
													<a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a>
												</li>
												<li>
													<a class="panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> <span>Configurations</span></a>
												</li>
												<li>
													<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
												</li>										
											</ul>
											</div>
										</div>
									</div>
									<div class="panel-body">
										<div class="alert alert-info">
											<h4 class="center"><b>Important Instructions about Enter Stock</b></h4><br>
		This is stock entry area. Here you have to enter Unique Item Number and Item Name, Item category etc.
											
										</div>
										<div id="msg"></div>
										<div class="col-md-5">
											<div class="panel">
												<div class="panel-heading panel-red border-light">
													<h4 class="panel-title">Subject Section</h4>
												</div>
												<div class="panel-body">
													<div class="row space15">
														<div class="col-md-5">Item No</div>
														<div class="col-md-7"><input type="text" class="form-control" id="itemNo" name="itemNo" placeholder="Item No"></div>
													</div>
													<div class="row space15">
														<div class="col-md-5">Item Name</div>
														<div class="col-md-7"><input type="text" class="form-control" id="itemName" name="itemName" placeholder="Item Name"></div>
													</div>
													<div class="row space15">
														<div class="col-md-5">Item Category</div>
														<div class="col-md-7"><input type="text" class="form-control" id="itemCat" name="itemCat" placeholder="Item Category"></div>
													</div>
													<div class="row space15">
														<div class="col-md-5">Item Size</div>
														<div class="col-md-7"><input type="text" class="form-control" id="itemSize" name="itemSize" placeholder="Item Size"></div>
													</div>
													<div class="row space15">
														<div class="col-md-5">Price/per piece</div>
														<div class="col-md-7"><input type="text" class="form-control" id="price" name="price" placeholder="Price/per piece"></div>
													</div>
													<div class="row space15">
														<div class="col-md-5">Item Quantity</div>
														<div class="col-md-7"><input type="text" class="form-control" id="itemQuantity" name="itemQuantity" placeholder="Item Quantity"></div>
													</div>
													<div class="row space15" id="extQ">
														<div class="col-md-5">Add Extra Item Quantity</div>
														<div class="col-md-7"><input type="text" class="form-control" value="0" id="extraQuantity" name="extraQuantity" placeholder="Item Quantity"></div>
													</div>
													<div class="row space15">
														<div class="col-md-5">
															<button type="submit" class="btn btn-red">
																Click to Save <i class="fa fa-save"></i>
															</button>
														</div>
														<div class="col-md-7">
															<button type="reset" class="btn btn-red">
																Reset Values <i class="fa fa-refresh"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											
										</div>
										<div class="col-md-7">
											<div class="panel">
												<div class="panel-heading panel-blue border-light">
													<h4 class="panel-title">Avaliable Stock Item Detail</h4>
												</div>
												<div class="panel-body panel-scroll height-450" >
												<table class="table table-bordered table-hover ">
												<thead>
												<tr>
												<th>Item No.</th>
												<th>Name</th>
												<th>Category</th>
												<th>Size</th>
												<th>Piece</th>
												<th>Quantity</th>
												</tr>
											</thead>
											<tbody>
											
												<?php foreach($request as $row):?><tr>
													<td><?php echo $row->item_no;?></td>
													<td><?php echo $row->item_name;?></td>
													<td><?php echo $row->item_cat;?></td>
													<td><?php echo $row->item_size;?></td>
													<td><?php echo $row->item_price;?></td>
													<td><?php echo $row->item_quantity;?></td>
												</tr>	<?php endforeach; ?>
													</tbody>
												</table>
												</div>
											</div>
										</div>
										</div>
								</div>
								
							</div>
						</div>
			</form>