<?php 
	$allErrors = $name_err = $email_err = $mobile_no_err = $city_err = $address_err = $pin_code_err = $form_values = $name = $email = $mobile_no = $address = $city = $pin_code = "";
	$allErrors = $this->session->flashdata('errors');
	$form_values = $this->session->flashdata('fromvalues');
	// var_dump($form_values);
	if(!empty($form_values['name']))
	{
		$name = $form_values['name'];
	}
	if(!empty($allErrors['name']))
	{
		$name_err = $allErrors['name'];
	}

	if(!empty($form_values['email']))
	{
		$email = $form_values['email'];
	}
	if(!empty($allErrors['email']))
	{
		$email_err = $allErrors['email'];
	}

	if(!empty($form_values['mobile_no']))
	{
		$mobile_no = $form_values['mobile_no'];
	}
	if(!empty($allErrors['mobile_no']))
	{
		$mobile_no_err = $allErrors['mobile_no'];
	}

	if(!empty($allErrors['address']))
	{
		$address_err = $allErrors['address'];
	}

	if(!empty($allErrors['city']))
	{
		$city_err = $allErrors['city'];
	}

	if(!empty($allErrors['pin_code']))
	{
		$pin_code_err = $allErrors['pin_code'];
	}

	if(!empty($form_values['address']))
	{
		$address = $form_values['address'];
	}

	if(!empty($form_values['city']))
	{
		$city = $form_values['city'];
	}

	if(!empty($form_values['pin_code']))
	{
		$pin_code = $form_values['pin_code'];
	}
?>
<div class="main-grid">
			<div class="agile-grids">	
				<!-- input-forms -->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Add Dealer</h2>
					</div>
					<div class="panel panel-widget forms-panel w3-last-form">
						<div class="forms">
							<div class="form-three widget-shadow">
								<div class=" panel-body-inputin">
									<form class="form-horizontal" action="<?= base_url('save_dealers') ?>" method="post">
										<div class="form-group">
											<label class="col-md-2 control-label">Name</label>
											<div class="col-md-8">
												<div class="input-group">							
													<span class="input-group-addon">
														<i class="fa fa-user"></i>
													</span>
													<input type="text" class="form-control1" placeholder="Name" name="name" id="name" value="<?= $name; ?>">
												</div>
												<span class="text-danger" style="font-size: 13px;"><?= $name_err ?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Email Address</label>
											<div class="col-md-8">
												<div class="input-group">							
													<span class="input-group-addon">
														<i class="fa fa-envelope-o"></i>
													</span>
													<input type="text" class="form-control1" placeholder="Email Address" name="email" id="email" value="<?= $address; ?>">
												</div>
												<span class="text-danger" style="font-size: 13px;"><?= $email_err ?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Mobile No.</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-phone"></i>
													</span>
													<input type="text" class="form-control1" placeholder="Mobile Number" name="mobile_no" id="mobile_no" value="<?= $mobile_no; ?>">
												</div>
												<span class="text-danger" style="font-size: 13px;"><?= $mobile_no_err ?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Address</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-address-card"></i>
													</span>
													<input type="text" class="form-control1"  placeholder="Street name" name="address" id="address" value="<?= $address; ?>"> 
												</div>
												<span class="text-danger" style="font-size: 13px;"><?= $address_err ?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">City</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-city"></i>
													</span>
													<input type="text" class="form-control1" placeholder="City" name="city" id="city" value="<?= $city; ?>">
												</div>
												<span class="text-danger" style="font-size: 13px;"><?= $city_err ?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Pin Code</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-location-arrow"></i>
													</span>
													<input type="number" class="form-control1" placeholder="Pin Code" name="pin_code" id="pin_code" value="<?= $pin_code; ?>">
												</div>
												<span class="text-danger" style="font-size: 13px;"><?= $pin_code_err ?></span>
											</div>
										</div>
										<div class="dbutton">
											<button type="submit" class="btn btn-primary">Add</button>
											<input type="reset" name="res-1" id="res-1" value="Reset" class="btn btn-danger">
											<input type="button" name="" onclick="javascript:history.back();" class="btn btn-secondary" value="Cancel">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- //input-forms -->
			</div>
		</div>