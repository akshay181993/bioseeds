<div class="main-grid">
			<div class="agile-grids">	
				<!-- input-forms -->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Update Profile</h2>
					</div>
					<div class="panel panel-widget forms-panel w3-last-form">
						<div class="forms">
							<div class="form-three widget-shadow">
								<div class=" panel-body-inputin">
									<?php echo form_open('update_profile', 'class="form-horizontal"'); ?>
										<div class="form-group">
											<label class="col-md-2 control-label">Name</label>
											<div class="col-md-8">
												<div class="input-group m-b-10">	
													<span class="input-group-addon">
														<i class="fa fa-user"></i>
													</span>
													<input type="text" class="form-control1" placeholder="Your Name" name="name" id="name" value="<?php if(isset($var[0]['name'])) { echo $var[0]['name']; } ?>">
												</div>
												<span class="errors"><?= form_error('name'); ?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Email Address</label>
											<div class="col-md-8">
												<div class="input-group m-b-10">							
													<span class="input-group-addon">
														<i class="fa fa-envelope"></i>
													</span>
													<input type="text" class="form-control1" placeholder="Email Address" name="email" id="email" value="<?php if(isset($var[0]['email'])) { echo $var[0]['email']; } ?>">
												</div>
												<span class="errors"><?= form_error('email'); ?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Password</label>
											<div class="col-md-8">
												<div class="input-group m-b-10">
													<span class="input-group-addon">
														<i class="fa fa-key"></i>
													</span>
													<input type="password" class="form-control1" name="password" id="password" placeholder="Password">
													<span class="input-group-addon">
														<i class="fa fa-eye" id="toggle4" onclick="toggle('password','toggle4')"></i>
													</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Mobile No.</label>
											<div class="col-md-8">
												<div class="input-group m-b-10">
													<span class="input-group-addon">
														<i class="fa fa-phone"></i>
													</span>
													<input type="text" class="form-control1" placeholder="Mobile Number" name="mobile_no" id="mobile_no"
													value="<?php if(isset($var[0]['mobile_no'])) { echo $var[0]['mobile_no']; } ?>">
												</div>
												<span class="errors"><?= form_error('mobile_no'); ?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">City</label>
											<div class="col-md-8">
												<div class="input-group m-b-10">
													<span class="input-group-addon">
														<i class="fa fa-city"></i>
													</span>
													<input type="text" class="form-control1" name="city" id="city" placeholder="City" value="<?php if(isset($var[0]['city'])) { echo $var[0]['city']; } ?>">
												</div>
												<span class="errors"><?= form_error('city'); ?></span>
											</div>
										</div>
										<div class="dbutton">
											<button type="submit" class="btn btn-primary">Submit</button>
											<input type="button" name="res-1" id="res-1" value="Cancel" onclick="window.history.back();" class="btn btn-danger">
										</div>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- //input-forms -->
			</div>
		</div>