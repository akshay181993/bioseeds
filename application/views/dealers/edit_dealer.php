<?php 
	$allErrors = $name_err = $email_err = $mobile_no_err = $city_err = $address_err = $pin_code_err = "";
	$allErrors = $this->session->flashdata('errors');

	if(!empty($allErrors['name']))
	{
		$name_err = $allErrors['name'];
	}

	if(!empty($allErrors['email']))
	{
		$email_err = $allErrors['email'];
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
?>
<div class="main-grid">
			<div class="agile-grids">	
				<!-- input-forms -->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Update Dealer</h2>
					</div>
					<div class="panel panel-widget forms-panel w3-last-form">
						<div class="forms">
							<div class="form-three widget-shadow">
								<div class=" panel-body-inputin">
									<form class="form-horizontal" action="<?= base_url('update_dealers') ?>" method="post">
										<input type="hidden" name="d_id" id="d_id" value="<?= $dealers[0]['id'] ?>">
										<div class="form-group">
											<label class="col-md-2 control-label">Name</label>
											<div class="col-md-8">
												<div class="input-group">							
													<span class="input-group-addon">
														<i class="fa fa-user"></i>
													</span>
													<input type="text" class="form-control1" placeholder="Name" name="name" id="name" value="<?php if(isset($dealers[0]['name'])){ echo $dealers[0]['name']; } ?>">
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
													<input type="text" class="form-control1" placeholder="Email Address" name="email" id="email" value="<?php if(isset($dealers[0]['email'])){ echo $dealers[0]['email']; } ?>">
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
													<input type="text" class="form-control1" placeholder="Mobile Number" name="mobile_no" id="mobile_no" value="<?php if(isset($dealers[0]['mobile_no'])){ echo $dealers[0]['mobile_no']; } ?>">
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
													<input type="text" class="form-control1"  placeholder="Street name" name="address" id="address" value="<?php if(isset($dealers[0]['address'])){ echo $dealers[0]['address']; } ?>"> 
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
													<input type="text" class="form-control1" placeholder="City" name="city" id="city" value="<?php if(isset($dealers[0]['city'])){ echo $dealers[0]['city']; } ?>">
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
													<input type="number" class="form-control1" placeholder="Pin Code" name="pin_code" id="pin_code" value="<?php if(isset($dealers[0]['pin_code'])){ echo $dealers[0]['pin_code']; } ?>">
												</div>
												<span class="text-danger" style="font-size: 13px;"><?= $pin_code_err ?></span>
											</div>
										</div>
										<div class="dbutton">
											<button type="submit" class="btn btn-primary">Update</button>
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