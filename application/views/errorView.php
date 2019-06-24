<div class="row">
							<div class="col-md-12">
								<ol class="breadcrumb">
									<li>
										<a href="#">
											Dashboard
										</a>
									</li>
									<li class="active">
										Holiday
									</li>
								</ol>
							</div>
						</div>
						<!-- end: BREADCRUMB -->
						<!-- start: PAGE CONTENT -->
						<div class="row">
							<div class="col-md-12">
							<div class="panel panel-white">
								<div class="page-error animated shake">
									<div class="error-number text-azure">
									<?php foreach ($request->result() as $pk): ?>
									<?php	$pk->festival_name; ?>
									</div>
									<div class="error-details col-sm-6 col-sm-offset-3">
									
										<h3><?php echo $pk->festival_name;?> Holiday</h3>
										<p>
											Unfortunately the page you were looking for could not be found.
											<br>
											It can be , moved or no longer exist.
											<br>
											Check the URL you entered for any mistakes and try again.
											<br>
											<a href="#" class="btn btn-red btn-return">
												Return home
											</a>
											<br>
											Still no luck?
											<br>
											Search for whatever is missing, or take a look around the rest of our site.
										</p>
										<?php endforeach;?>
										<form action="#">
											<div class="input-group">
												<input type="text" placeholder="keyword..." size="16" class="form-control">
												<span class="input-group-btn">
													<button class="btn btn-azure">
														Search
													</button> </span>
											</div>
										</form>
									</div>
								</div>
							
						<!-- end: PAGE CONTENT-->
					
					<div class="subviews">
						<div class="subviews-container"></div>
					</div>
			
				<div class="footer-inner">
					<div class="pull-left">
						2014 &copy; Rapido by cliptheme.
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="fa fa-chevron-up"></i></span>
					</div>
				</div>
				</div></div>
						</div>s