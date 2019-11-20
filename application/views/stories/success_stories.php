<a href="<?= base_url()?>add_story">
	<button class="btn btn-primary pull-right" style="margin:30px 48px 0 0;">+ Add Success Story</button>
</a>
<?php if(!empty($this->session->flashdata('success'))){ ?>
	<div class="alert alert-success alert-dismissible" style="margin: 21px 180px 0px 48px;position: absolute;width: 77%;">
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
					<h2>Success Stories</h2>
				</div>
				<div class="agile-tables">
					<div class="w3l-table-info">
						<h3>All Success Stories List</h3>
						<table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:10;">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Crop</th>
									<th>Mobile No</th>
									<th>Address</th>
									<th>City</th>
									<th>Images</th>
									<th>Story Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 0; if(!empty($allstories)) :
									foreach ($allstories as $stories) :
									$no++;
								?>
								<tr>
									<td><?= $no; ?></td>
									<td align="center"><?= $stories['name']; ?></td>
									<td align="center"><?= $stories['product_name']; ?></td>
									<td align="center"><?= $stories['mobile_no']; ?></td>
									<td align="center"><?= $stories['address']; ?></td>
									<td align="center"><?= $stories['city']; ?></td>
									<td align="center">
										<?php $expload_img ="";
										 if(!empty($stories['success_image'])) {
												$expload_img = explode('~', $stories['success_image']);
												for ($i=0; $i < count($expload_img); $i++) { 
												?>
													<img src="<?= base_url('public/uploads/cat_image/'.$expload_img[$i]);?>" width="50" height="50">
											<?php } }?>
									</td>
									<td align="center"><?= date('d-m-Y',strtotime($stories['success_date']));?></td>
									<td align="center">
										<a href="<?= base_url()?>edit_story/<?= $stories['id'] ?>"><i class="fa fa-pencil edit-icon m-r-5"></i></a><a href="javascript:void(0);" onclick="if (!confirm('Are you sure you want to delete this product?')) { return false };DeleteAll('<?php echo base_url();?>','<?= $stories['id']; ?>','success_stories','<?php echo $stories['success_image']; ?>');"><i class="fa fa-trash delete-icon m-r-5"></i></a>
										<?php if($stories['status'] == '1'){ ?>
											<a href="javascript:void(0);" onclick="if (!confirm('Are you sure you want to Deactive this product?')) { return false };Status_update('<?php echo base_url();?>','<?= $stories['id']; ?>','deactive','success_stories');"><i class="fa fa-ban delete-icon m-r-5"></i></a>
										<?php } else { ?>
											<a href="javascript:void(0);" onclick="Status_update('<?php echo base_url();?>','<?= $stories['id']; ?>','active','success_stories');"><i class="fa fa-check active-icon"></i></a>
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