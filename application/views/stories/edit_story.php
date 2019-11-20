<?php 
	$allErrors = $name_err = $crop_err = $pimage_err = $mobile_no_err = $address_err = $city_err = $pin_code_err = $details_err = $simage_err = $name_hindi_err = $details_hindi_err = $city_hindi_err = $success_date = $success_date_err ="";
	$allErrors = $this->session->flashdata('errors');

	if(!empty($allErrors['name']))
	{
		$name_err = $allErrors['name'];
	}

	if(!empty($allErrors['name_hindi']))
	{
		$name_hindi_err = $allErrors['name_hindi'];
	}

	if(!empty($allErrors['crop']))
	{
		$crop_err = $allErrors['crop'];
	}

	if(!empty($form_values['success_date']))
	{
		$success_date = $form_values['success_date'];
	}

	if(!empty($allErrors['success_date']))
	{
		$success_date_err = $allErrors['success_date'];
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


	if(!empty($allErrors['city_hindi']))
	{
		$city_hindi_err = $allErrors['city_hindi'];
	}

	if(!empty($allErrors['pin_code']))
	{
		$pin_code_err = $allErrors['pin_code'];
	}

	if(!empty($allErrors['editor1']))
	{
		$details_err = $allErrors['editor1'];
	}

	if(!empty($allErrors['editor2']))
	{
		$details_hindi_err = $allErrors['editor2'];
	}

	if(!empty($allErrors['simage[]']))
	{
		$simage_err = $allErrors['simage[]'];
	}

?>
<div class="main-grid">
			<div class="agile-grids">	
				<!-- input-forms -->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Edit Success Story</h2>
					</div>
					<div class="panel panel-widget forms-panel w3-last-form">
						<div class="forms">
							<div class="form-three widget-shadow">
								<div class=" panel-body-inputin">
									<form class="form-horizontal" action="<?= base_url('update_story') ?>" method="post" enctype="multipart/form-data">
										<input type="hidden" name="s_id" id="s_id" value="<?php if(isset($stories[0]['id'])){ echo $stories[0]['id']; } ?>">
										<input type="hidden" name="url" id="url" value="<?= base_url(); ?>">
										<div class="form-group">
											<label class="col-md-2 control-label">Name of Person</label>
											<div class="col-md-8">
												<div class="input-group">							
													<span class="input-group-addon">
														<i class="fa fa-user"></i>
													</span>
													<input type="text" class="form-control1" placeholder="Name of Person" name="person_name" id="person_name" value="<?php if($stories[0]['name']){ echo $stories[0]['name']; } ?>">
												</div>
											</div>
											<span class="text-danger"><?= $name_err ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">व्यक्ति का नाम</label>
											<div class="col-md-8">
												<div class="input-group">							
													<span class="input-group-addon">
														<i class="fa fa-user"></i>
													</span>
													<input type="text" class="form-control1" placeholder="व्यक्ति का नाम" name="person_name_hindi" id="person_name_hindi" value="<?php if($stories[0]['name_hi']){ echo $stories[0]['name_hi']; } ?>">
												</div>
											</div>
											<span class="text-danger"><?= $name_hindi_err ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Crops</label>
											<div class="col-md-8">
												<select class="form-control1 select2" name="crop" id="crop"> 
													<option value="">Select Crop</option>
													<?php if(!empty($allproducts)){
														foreach ($allproducts as $product) {
														?>
														<option value="<?= $product['id']; ?>" <?php if($product['id'] == $stories[0]['crop']){ echo 'selected';} ?>><?= $product['name']; ?></option>
													<?php }} ?>
												</select>
											</div>
											<span class="text-danger"><?= $crop_err ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Choose date</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-calender"></i>
													</span>
													<input type="text" class="form-control1" id="mytarget" placeholder="Select date" name="success_date" value="<?php if(isset($stories[0]['success_date'])) { echo date("m/d/Y",strtotime($stories[0]['success_date'])); } ?>">
													<div class="monthly" id="mycalendar2" style="z-index: 1 !important;"></div>
												</div>
											</div>
											<span class="text-danger"><?= $success_date_err; ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Mobile No.</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-phone"></i>
													</span>
													<input type="text" class="form-control1" placeholder="Mobile Number" value="<?php if($stories[0]['mobile_no']){ echo $stories[0]['mobile_no']; } ?>" name="mobile_no" id="mobile_no">
												</div>
											</div>
											<span class="text-danger"><?= $mobile_no_err ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Address</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-address-card"></i>
													</span>
													<input type="text" class="form-control1"  placeholder="Street name" value="<?php if($stories[0]['address']){ echo $stories[0]['address']; } ?>" name="address" id="address">
												</div>
											</div>
											<span class="text-danger"><?= $address_err ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">City</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-city"></i>
													</span>
													<input type="text" class="form-control1" placeholder="City" value="<?php if($stories[0]['city']){ echo $stories[0]['city']; } ?>" name="city" id="city">
												</div>
											</div>
											<span class="text-danger"><?= $city_err ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">शहर</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-city"></i>
													</span>
													<input type="text" class="form-control1" placeholder="शहर" name="city_hindi" id="city_hindi" value="<?php if($stories[0]['city_hi']){ echo $stories[0]['city_hi']; } ?>">
												</div>
											</div>
											<span class="text-danger"><?= $city_hindi_err ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Pin Code</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-location-arrow"></i>
													</span>
													<input type="number" class="form-control1" placeholder="Pin Code" value="<?php if($stories[0]['pin_code']){ echo $stories[0]['pin_code']; } ?>" name="pin_code" id="pin_code">
												</div>
											</div>
											<span class="text-danger"><?= $pin_code_err ?></span>
										</div>
										<?php $expload_img ="";
										 if(!empty($stories[0]['success_image'])) {
												$expload_img = explode('~', $stories[0]['success_image']);
												// var_dump($expload_img[0]);die();	
											} ?>
										<div class="form-group row">
											<label class="col-md-2 control-label">Success Story Image</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-file-image-o"></i>
													</span>
													<input type="file" class="form-control1" name="success_image[]" id="success_image0" onchange="ImageUpload('<?php echo base_url()?>','success_image0','0')" multiple>
													<input type="hidden" name="simage[]" id="simage" value="<?php if(isset($expload_img[0])){ echo $expload_img[0]; } ?>">
												</div>
											</div>
											<?php if(count($expload_img) > 1){
											 for($k = 1;$k<count($expload_img);$k++){ ?>
											 <div class="success_img_row<?= $k; ?>">
												<input type="hidden" name="simage[]" id="simage<?= $k; ?>" value="<?php if(isset($expload_img[$k])){ echo $expload_img[$k]; } ?>">
											</div>
											<?php } }?>
											<div class="col-md-2">
												<div class="input-group">
													<button type="button" onclick="addnewrow('profile_imagerow')" class="btn btn-success">+ Add More</button>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-8 col-md-push-2">
											<?php for ($i=0; $i < count($expload_img); $i++) { 
												?><div class="deleteimg<?= $i ?> img-wraps rowcount">
													<span  class="closes" title="Delete" onclick="RemoveRow('<?= $i ?>','remove_row')">&times;</span>
													<img src="<?= base_url('public/uploads/cat_image/'.$expload_img[$i]);?>" width="50" height="50">
												</div>
											<?php  }?>
											</div>
										</div>								
										<div class="form-group row" id="profile_imagerow" style="margin-right: -4px;margin-left: -4px;">
											
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Message</label>
											<div class="col-md-8">
													<textarea name="editor1" id="editor1"><?php if($stories[0]['message']){ echo $stories[0]['message']; } ?></textarea>
													<span class="text-danger"><?= $details_err; ?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">संदेश</label>
											<div class="col-md-8">
													<textarea name="editor2" id="editor2"><?php if($stories[0]['message_hi']){ echo $stories[0]['message_hi']; } ?></textarea>
													<span class="text-danger"><?= $details_hindi_err; ?></span>
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
