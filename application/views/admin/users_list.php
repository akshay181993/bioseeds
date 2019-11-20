<div class="grid-info">
<div class="alert alert-success alert-dismissible display_success" style="margin: 21px 180px 0px 48px;position: absolute;width: 90%;display: none;">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Success!</strong> <span class="success"></span>
</div>
<div class="main-grid">
	<div class="social grid">
		<div class="grid-info">
			<!-- tables -->
				<div class="table-heading">
					<h2>Registered Users</h2>
				</div>
				<div class="agile-tables">
					<div class="w3l-table-info">
						<h3>All Users List</h3>
						<table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:10;">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Mobile No</th>
									<th>City</th>
									<th>State</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									if(!empty($all_users)){
										$no = 0;
										foreach ($all_users as $user) {
										 $no++;
									?>
										<tr>
											<th><?= $no; ?></th>
											<td><?= $user['name']; ?></td>
											<td><?= $user['email']; ?></td>
											<td><?= $user['mobile_no']; ?></td>
											<td><?= $user['place']; ?></td>
											<td><?= $user['state']; ?></td>
											<td>
												<a href="javascript:void(0);" onclick="if (!confirm('Are you sure you want to delete this User?')) { return false };DeleteAll('<?php echo base_url();?>','<?= $user['id']; ?>','users','');">
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