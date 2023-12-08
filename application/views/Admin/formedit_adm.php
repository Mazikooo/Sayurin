<div class="right_col" role="main">
    <div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Edit Password Admin</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url('admin/update_password'); ?>" method="post">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">ID<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="ID_Admin" name="ID_Admin" required="required" value="<?php echo $admin->ID_Admin; ?>" class="form-control" readonly>
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Username<span class="required">*</span>
											</label>
                                        
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="username" name="username" required="required" class="form-control" value="<?php echo $admin->Username; ?>" readonly>
                                                <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
                                        <?php if (isset($error)) { ?>
                                            <small class="text-danger"><?php echo $error; ?></small>
                                        <?php } ?>
											</div>
										</div>


										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Password Baru</label>
                                            
											<div class="col-md-6 col-sm-6 ">
												<input id="passwordBaru" class="form-control" type="Password" name="passwordBaru">
                                                <?php echo form_error('passwordBaru', '<small class="text-danger">', '</small>'); ?>
											</div>
										</div>

											 <!--  

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
											<div class="col-md-6 col-sm-6 ">
												<div id="gender" class="btn-group" data-toggle="buttons">
													<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
														<input type="radio" name="gender" value="male" class="join-btn"> &nbsp; Male &nbsp;
													</label>
													<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
														<input type="radio" name="gender" value="female" class="join-btn"> Female
													</label>
												</div>
											</div>
										</div>-->
										
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
                                            <a href="<?php echo site_url('admin'); ?>" class="btn btn-primary" role="button">Cancel</a>

												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
                    </div>