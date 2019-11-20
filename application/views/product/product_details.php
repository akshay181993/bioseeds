<a href="<?= base_url()?>add_product">
	<button class="btn btn-primary pull-right" style="margin:30px 48px 0 0;">+ Add Crop</button>
</a>
<?php if(!empty($this->session->flashdata('success'))){ ?>
	<div class="alert alert-success alert-dismissible" style="margin: 21px 180px 0px 48px;position: absolute;width: 80%;">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Success!</strong> <span class="success"><?php echo $this->session->flashdata('success'); ?></span>
	</div>
<?php } ?>
<div class="alert alert-success alert-dismissible display_success" style="margin: 21px 180px 0px 48px;position: absolute;width: 80%;display: none;">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Success!</strong> <span class="success"></span>
	</div>
<div class="main-grid">

	<div class="social grid">
		<div class="grid-info">
			<!-- tables -->
				<div class="table-heading">
					<h2>Crop Details</h2>
				</div>
				<div class="agile-tables">
					<div class="w3l-table-info">
						<h3>All Crop List</h3>
						<table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:10;">
							<thead>
								<tr>
									<th>#</th>
									<th>Crop Name</th>
									<th>Category</th>
									<th>Crop Image</th>
									<th>Created At</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 0; if(!empty($allproducts)) :
									foreach ($allproducts as $product) :
									$no++;
								?>
								<tr>
									<td><?= $no; ?></td>
									<td align="center"><?= $product['name']; ?></td>
									<td align="center"><?= $product['category_name']; ?></td>
									<td align="center">
										<?php if($product['image']) {?>
											<img src="<?= base_url('public/uploads/cat_image/'.$product['image']);?>" width="50" height="50">
										<?php }?>
									</td>
									<td align="center"><?= date('d-m-Y',strtotime($product['created_at']));?></td>
									<td align="center">
										<a href="<?= base_url()?>edit_product/<?= $product['id'] ?>"><i class="fa fa-pencil edit-icon m-r-5"></i></a><a href="javascript:void(0);" onclick="if (!confirm('Are you sure you want to delete this product?')) { return false };DeleteAll('<?php echo base_url();?>','<?= $product['id']; ?>','products','<?php echo $product['image']; ?>');"><i class="fa fa-trash delete-icon m-r-5"></i></a>
										<?php if($product['status'] == '1'){ ?>
											<a href="javascript:void(0);" onclick="if (!confirm('Are you sure you want to Deactive this product?')) { return false };Status_update('<?php echo base_url();?>','<?= $product['id']; ?>','deactive','products');"><i class="fa fa-ban delete-icon m-r-5"></i></a>
										<?php } else { ?>
											<a href="javascript:void(0);" onclick="Status_update('<?php echo base_url();?>','<?= $product['id']; ?>','active','products');"><i class="fa fa-check active-icon"></i></a>
										<?php } ?>
									</td>
								</tr>
								<?php endforeach; endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>