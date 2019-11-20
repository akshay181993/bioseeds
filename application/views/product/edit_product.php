<?php 
	$allErrors = $category_err = $product_name_err = $pimage_err = $productdetails_err = $cultivation_err =  $productdetailshindi_err = $producthindi_name_err = $cultivationhindi_err = $prod_err = "";
	$allErrors = $this->session->flashdata('errors');

	if(!empty($allErrors['category_id']))
	{
		$category_err = $allErrors['category_id'];
	}

	if(!empty($allErrors['product_name']))
	{
		$product_name_err = $allErrors['product_name'];
	}
	if(!empty($allErrors['product_name_hindi']))
	{
		$producthindi_name_err = $allErrors['product_name_hindi'];
	}

	if(!empty($allErrors['pimage']))
	{
		$pimage_err = $allErrors['pimage'];
	}

	if(!empty($allErrors['cultivation_manual']))
	{
		$cultivation_err = $allErrors['cultivation_manual'];
	}

	// if(!empty($allErrors['cultivation_manual_hindi']))
	// {
	// 	$cultivationhindi_err = $allErrors['cultivation_manual_hindi'];
	// }

	// if(!empty($allErrors['editor1']))
	// {
	// 	$productdetails_err = $allErrors['editor1'];
	// }

	// if(!empty($allErrors['editor2']))
	// {
	// 	$productdetailshindi_err = $allErrors['editor2'];
	// }

?>
<div class="main-grid">
			<div class="agile-grids">	
				<!-- input-forms -->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Edit Product</h2>
					</div>
					<div class="panel panel-widget forms-panel w3-last-form">
						<div class="forms">
							<div class="form-three widget-shadow">
								<div class=" panel-body-inputin">
									<form class="form-horizontal" action="<?= base_url() ?>update_product" method="post" enctype="multipart/form-data">
										<input type="hidden" name="id" id="id" value="<?= $products[0]['id']; ?>">
										<div class="form-group">
											<label class="col-md-2 control-label">Name of Crop</label>
											<div class="col-md-8">
												<div class="input-group">							
													<span class="input-group-addon">
														<i class="fa fa-product-hunt"></i>
													</span>
													<input type="text" class="form-control1" placeholder="Name of Crop" name="product_name" id="product_name" value="<?php if($products[0]['name']){ echo $products[0]['name']; } ?>">
												</div>
											</div>
											<span class="text-danger"><?= $product_name_err ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">उत्पाद का नाम</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-product-hunt"></i>
													</span>
													<input type="text" class="form-control1" placeholder="उत्पाद का नाम" name="product_name_hindi" id="product_name_hindi" value="<?php if($products[0]['product_name_hi']){ echo $products[0]['product_name_hi']; } ?>">
												</div>
											</div>
											<span class="text-danger"><?= $producthindi_name_err ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Categories</label>
											<div class="col-md-8">
												<select class="form-control1 select2" name="category" id="category"> 
													<option value="">Select Category</option>
													<?php if(!empty($allcategory)){
														foreach ($allcategory as $category) {
														?>
														<option value="<?= $category['id']; ?>" <?php echo ($category['id'] == $products[0]['category_id'])?"selected":"" ?>><?= $category['name']; ?></option>
													<?php }} ?>
												</select>
											</div>
											<span class="text-danger"><?= $category_err ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Crop Image</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-file-image-o"></i>
													</span>
													<input type="file" class="form-control1" name="product_image" id="product_image" onchange="ImageUpload('<?= base_url()?>','product_image')">
													<input type="hidden" name="pimage" id="pimage" value="<?= $products[0]['image']; ?>">
												</div>
												<span class="text-danger"><?= $pimage_err ?></span>
											</div>
											<div class="col-md-2">
												<?php if($products[0]['image']) {?>
													<img src="<?= base_url('public/uploads/cat_image/'.$products[0]['image']);?>" width="50" height="50">
												<?php }?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Cultivation Manual</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-file-pdf-o"></i>
													</span>
													<input type="file" class="form-control1" name="cultivation_manual" id="cultivation_manual"  onchange="ImageUpload('<?= base_url()?>','cultivation_manual')">
													<input type="hidden" name="cultivation_manual1" id="cultivation_manual1" value="<?= $products[0]['cultivation_manual'] ?>">
												</div>
												<span class="text-danger"><?= $cultivation_err ?></span>
											</div>
											<div class="col-md-2">
												<?php if($products[0]['cultivation_manual']){ ?>
												<iframe class="iframe-cultivation" src="<?= base_url('public/uploads/cat_image/'.$products[0]['cultivation_manual']);?>"></iframe>
											<?php } ?>
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