<a href="<?= base_url()?>add_variety">
	<button class="btn btn-primary pull-right" style="margin:30px 48px 0 0;">+ Add Variety</button>
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
					<h2>Crop Varieties</h2>
				</div>
				<div class="agile-tables">
					<div class="w3l-table-info">
						<h3>All Crop Varieties List</h3>
						<table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:10;">
							<thead>
								<tr>
									<th>#</th>
									<th>Crop Name</th>
									<th>Crop Varieties</th>
									<th>Crop Variety Image</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 0; if(!empty($allvarieties)) :
									foreach ($allvarieties as $variety) :
									$no++;
								?>
								<tr>
									<td><?= $no; ?></td>
									<td align="center"><?= $variety['product_name']; ?></td>
									<td align="center"><?= str_replace("~",",",$variety['variety_name']); ?></td>
									<td align="center">	
										<img src="<?= base_url('public/uploads/cat_image/'.$variety['variety_image']);?>" width="50" height="50">
										
									</td>
									<td align="center">
										<a href="<?= base_url()?>edit_variety/<?= $variety['id'] ?>"><i class="fa fa-pencil edit-icon m-r-5"></i></a><a href="javascript:void(0);" onclick="if (!confirm('Are you sure you want to delete this product?')) { return false };DeleteAll('<?php echo base_url();?>','<?= $variety['id']; ?>','product_varieties','<?php echo $variety['variety_image']; ?>');"><i class="fa fa-trash delete-icon m-r-5"></i></a>
										<?php if($variety['status'] == '1'){ ?>
											<a href="javascript:void(0);" onclick="if (!confirm('Are you sure you want to Deactive this product?')) { return false };Status_update('<?php echo base_url();?>','<?= $variety['id']; ?>','deactive','product_varieties');"><i class="fa fa-ban delete-icon m-r-5"></i></a>
										<?php } else { ?>
											<a href="javascript:void(0);" onclick="Status_update('<?php echo base_url();?>','<?= $variety['id']; ?>','active','product_varieties');"><i class="fa fa-check active-icon"></i></a>
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