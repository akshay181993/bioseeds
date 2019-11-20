<div class="grid-info">
	<div class="alert alert-success alert-dismissible display_success" style="margin: 21px 180px 0px 48px;position: absolute;width: 82%;display: none;">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Success!</strong> <span class="success"></span>
</div>
<div class="main-grid">
	<div class="social grid">
		<div class="grid-info">
			<!-- tables -->
				<div class="table-heading">
					<h2>Customer Enquiries</h2>
				</div>
				<div class="agile-tables">
					<div class="w3l-table-info">
						<h3>All Enquiry List</h3>
						<table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:10;">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Mobile No</th>
									<th>City</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									if(!empty($all_enquiry)){
										$no = 0;
										foreach ($all_enquiry as $enquiry) {
										 $no++;
									?>
										<tr>
											<th><?= $no; ?></th>
											<td><?= $enquiry['name']; ?></td>
											<td><?= $enquiry['email']; ?></td>
											<td><?= $enquiry['mobile_no']; ?></td>
											<td><?= $enquiry['place']; ?></td>
											<td>
												<a href="javascript:void(0);" onclick="if (!confirm('Are you sure you want to delete this Enquiry?')) { return false };DeleteAll('<?php echo base_url();?>','<?= $enquiry['id']; ?>','enquiry');">
													Delete
												</a>
											</td>
										</tr>
								<?php	
										}
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>