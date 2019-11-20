<a href="<?= base_url()?>add">
	<button class="btn btn-primary pull-right" id="btn-dealer" style="margin:30px 48px 0 0;">+ Add Dealer</button>
</a>
		<?php if(!empty($this->session->flashdata('updated'))){?>
			<div class="alert alert-success alert-dismissible" style="margin: 21px 180px 0px 48px;position: absolute;width: 82%;">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Success!</strong> <?= $this->session->flashdata('updated');?>
	  		</div>
		<?php }?>
		<?php if(!empty($this->session->flashdata('success'))){ ?>
			<div class="alert alert-success alert-dismissible" style="margin: 21px 180px 0px 48px;position: absolute;width: 82%;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Success!</strong> <span class="success"><?php echo $this->session->flashdata('success'); ?></span>
			</div>
		<?php } ?>
		<div class="alert alert-success alert-dismissible display_success" style="margin: 21px 180px 0px 48px;position: absolute;width: 82%;display: none;">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Success!</strong> <span class="success"></span>
		</div>
	<div class="main-grid">
			<div class="social grid">
					<div class="grid-info">
						<div class="col-md-3 top-comment-grid">
							<div class="comments likes">
								<div class="comments-icon">
									<i class="fa fa-leaf"></i>
								</div>
								<div class="comments-info likes-info">
									<h3>
										<?php if(isset($productcount)){
											echo $productcount;
										} ?>
									</h3>
									<a href="<?php echo base_url('product_details') ?>">Products</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-3 top-comment-grid">
							<div class="comments">
								<div class="comments-icon">
									<i class="fa fa-download"></i>
								</div>
								<div class="comments-info">
									<h3>0</h3>
									<a href="#">Downloads</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-3 top-comment-grid">
							<div class="comments tweets">
								<div class="comments-icon">
									<i class="fa fa-envelope"></i>
								</div>
								<div class="comments-info tweets-info">
									<h3>
										<?php 
											if(isset($enquiry_count)){
												echo $enquiry_count;
											} 
										?>
									</h3>
									<a href="<?php echo base_url('enquiry_list') ?>">Enquiries</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-3 top-comment-grid">
							<div class="comments views">
								<div class="comments-icon">
									<i class="fa fa-users"></i>
								</div>
								<div class="comments-info views-info">
									<h3>
										<?php 
											if(isset($users_count)){
												echo $users_count;
											}else{
												echo "0";
											}
										?>
									</h3>
									<a href="<?php echo base_url('all_users') ?>">Users</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
			</div>
			<div class="social grid">
					<div class="grid-info">
			<div class="agile-tables">
					<div class="w3l-table-info">
						<h3>All Dealer List</h3>
						<table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" align="center" style="width:10;">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Mobile No</th>
									<th>Address</th>
									<th>City</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 0; if(!empty($alldealers)) :
									foreach ($alldealers as $dealer) :
									$no++;
								?>
									<tr>
										<td align="center"><?= $no; ?></td>
										<td align="center"><?= $dealer['name']; ?></td>
										<td align="center"><?= $dealer['email']; ?></td>
										<td align="center"><?= $dealer['mobile_no']; ?></td>
										<td align="center"><?= $dealer['address']; ?></td>
										<td align="center"><?= $dealer['city']; ?></td>
										<td align="center">
											<a href="<?= base_url()?>edit_dealer/<?= $dealer['id']; ?>"><i class="fa fa-pencil edit-icon m-r-5"></i></a>
											<a href="javascript:void(0);" onclick="if (!confirm('Are you sure you want to delete this Dealer?')) { return false };DeleteAll('<?php echo base_url();?>','<?= $dealer['id']; ?>','dealers');">
												<i class="fa fa-trash delete-icon m-r-5"></i>
											</a>
											<?php if($dealer['status'] == '1'){ ?>
												<a href="javascript:void(0);" onclick="if (!confirm('Are you sure you want to Deactive this product?')) { return false };Status_update('<?php echo base_url();?>','<?= $dealer['id']; ?>','deactive','dealers');">
													<i class="fa fa-ban delete-icon m-r-5"></i>
												</a>
											<?php }else{ ?>
												<a href="javascript:void(0);" onclick="Status_update('<?php echo base_url();?>','<?= $dealer['id']; ?>','active','dealers');">
													<i class="fa fa-check active-icon"></i>
												</a>
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
		</div>

