<?php 
	$form_values = $oldpass = $newpass = $cpass = "";
	$form_values = $this->session->flashdata('formvalues');

	if(!empty($form_values['old_password']))
	{
		$oldpass = $form_values['old_password'];
	}

	if(!empty($form_values['new_password']))
	{
		$newpass = $form_values['new_password'];
	}

	if(!empty($form_values['confirm_password']))
	{
		$cpass = $form_values['confirm_password'];
	}
 ?>

<div class="main-grid">
			<div class="agile-grids">	
				<!-- input-forms -->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Change Password</h2>
					</div>
					<?php if(!empty($this->session->flashdata('errors'))){?>
						<div class="alert alert-danger alert-dismissible fade in" role="alert">
				    		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				    		<strong>Requird!</strong> <?= $this->session->flashdata('errors');?>
		  				</div>
					<?php }?>
					<div class="panel panel-widget forms-panel w3-last-form">
						<div class="forms">
							<div class="form-three widget-shadow">
								<div class=" panel-body-inputin">
									<form class="form-horizontal" action="<?= base_url('update_password')?>" method="post">
										<div class="form-group">
											<label class="col-md-2 control-label">Old Password</label>
											<div class="col-md-8">
												<div class="input-group">	
													<span class="input-group-addon">
														<i class="fa fa-key"></i>
													</span>
													<input type="password" class="form-control1" name="old_password" id="old_password" placeholder="Old Password" value="<?= $oldpass; ?>">
													<span class="input-group-addon">
														<i class="fa fa-eye" id="toggel" onclick="toggle('old_password','toggel')"></i>
													</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">New Password</label>
											<div class="col-md-8">
												<div class="input-group">							
													<span class="input-group-addon">
														<i class="fa fa-key"></i>
													</span>
													<input type="password" class="form-control1" name="new_password" id="new_password" placeholder="New Password" value="<?= $newpass; ?>">
													<span class="input-group-addon">
														<i class="fa fa-eye" id="toggel2" onclick="toggle('new_password','toggel2')"></i>
													</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Confirm Password</label>
											<div class="col-md-8">
												<div class="input-group">							
													<span class="input-group-addon">
														<i class="fa fa-key"></i>
													</span>
													<input type="password" class="form-control1" name="confirm_password" id="confirm_password" placeholder="Confirm Password" value="<?= $cpass; ?>">
													<span class="input-group-addon">
														<i class="fa fa-eye" id="toggel3" onclick="toggle('confirm_password','toggel3')"></i>
													</span>
												</div>
											</div>
										</div>
										<div class="dbutton">
											<button type="submit" class="btn btn-primary">Change</button>
											<input type="button" name="res-1" id="res-1" value="Cancel" onclick="javascript:history.back();" class="btn btn-danger">
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