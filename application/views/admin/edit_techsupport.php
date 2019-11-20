<div class="main-grid">
			<div class="agile-grids">	
				<!-- input-forms -->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Edit Tech Support</h2>
					</div>
					<div class="panel panel-widget forms-panel w3-last-form">
						<div class="forms">
							<div class="form-three widget-shadow">
								<div class=" panel-body-inputin">
									<form class="form-horizontal" action="<?= base_url('update_numbers') ?>" method="post">
										<input type="hidden" name="id" id="id" value="<?= $single_number[0]['id'] ?>">
										<div class="form-group">
											<label class="col-md-2 control-label">SMS Number</label>
											<div class="col-md-8">
												<div class="input-group">							
													<span class="input-group-addon">
														<i class="fa fa-phone"></i>
													</span>
													<input type="tel" id="sms_number" name="sms_number" class="form-control1" required placeholder="SMS Number" value="<?= $single_number[0]['sms_no'] ?>">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">WhatsApp Number</label>
											<div class="col-md-8">
												<div class="input-group">							
													<span class="input-group-addon">
														<i class="fa fa-phone"></i>
													</span>
													<input type="tel" id="whatsapp_no" name="whatsapp_no" class="form-control1" required placeholder="Whatsapp Number" value="<?= $single_number[0]['whatsapp_no']; ?>">
												</div>
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
			</div>
			<!-- //input-forms -->
		
	</div>