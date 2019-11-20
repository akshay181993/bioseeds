<?php 
	$allErrors = $form_values = $product = $product_err = $variety_name = $variety_name_err = $vimage_err = $varietydetails = $varietydetails_err = $varietydetailshindi = $varietydetailshindi_err = $variety_name_err = "";

	$allErrors = $this->session->flashdata('errors');
	$form_values = $this->session->flashdata('formvalues');
	
	if(!empty($form_values['product']))
	{
		$product = $form_values['product'];
	}

	if(!empty($allErrors['product_id']))
	{
		$product_err = $allErrors['product_id'];
	}

	if(!empty($allErrors['product_variety']))
	{
		$variety_name_err = $allErrors['product_variety'];
	}

	if(!empty($form_values['variety_name']))
	{
		$variety_name = $form_values['variety_name'];
	}
	if(!empty($allErrors['variety_name']))
	{
		$variety_name_err = $allErrors['variety_name'];
	}

	if(!empty($allErrors['vimage']))
	{
		$vimage_err = $allErrors['vimage'];
	}

	if(!empty($form_values['editor1']))
	{
		$varietydetails = $form_values['editor1'];
	}

	if(!empty($allErrors['editor1']))
	{
		$varietydetails_err = $allErrors['editor1'];
	}

	if(!empty($form_values['editor2']))
	{
		$varietydetailshindi = $form_values['editor2'];
	}
	if(!empty($allErrors['editor2']))
	{
		$varietydetailshindi_err = $allErrors['editor2'];
	}
?>
<div class="main-grid">
			<div class="agile-grids">	
				<!-- input-forms -->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Add Variety</h2>
					</div>
					<div class="panel panel-widget forms-panel w3-last-form">
						<div class="forms">
							<div class="form-three widget-shadow">
								<div class=" panel-body-inputin">
									<form class="form-horizontal" action="<?php base_url(); ?>store_variety" method="post" enctype="multipart/form-data">
										<input type="hidden" name="url" id="url" value="<?= base_url(); ?>">
										<div class="form-group">
											<label class="col-md-2 control-label">Variety Name</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-list-ul"></i>
													</span>
													<input type="text" class="form-control1" placeholder="Product Variety" name="product_variety" id="product_variety">
												</div>
											</div>
											<span class="text-danger "><?= $variety_name_err; ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Crops</label>
											<div class="col-md-8">
												<select class="form-control1 select2" name="product" id="product"> 
													<option value="">Select Product</option>
													<?php if(!empty($allproducts)){
														foreach ($allproducts as $product) {
														?>
														<option value="<?= $product['id']; ?>" <?php if($product['id'] == $product){ echo 'selected';} ?>><?= $product['name']; ?></option>
													<?php }} ?>
												</select>
											</div>
											<span class="text-danger"><?= $product_err ?></span>
										</div>
											<div class="form-group">
											<label class="col-md-2 control-label">Variety Images</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-file-image-o"></i>
													</span>
													<input type="file" class="form-control1" name="varity_image" id="varity_image"  onchange="ImageUpload('<?= base_url()?>','varity_image')" multiple>
													<input type="hidden" name="vimage" id="vimage">
												</div>
											</div>
											<span class="text-danger "><?= $vimage_err; ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Variety Details</label>
											<div class="col-md-8">
													<textarea name="editor1" id="editor1"></textarea>
											</div>
											<span class="text-danger"><?= $varietydetails_err; ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">विविधता विवरण</label>
											<div class="col-md-8">
													<textarea name="editor2" id="editor2"></textarea>
											</div>
											<span class="text-danger"><?= $varietydetailshindi_err; ?></span>
										</div>

										<div class="dbutton">
											<button type="submit" class="btn btn-primary">Submit</button>
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