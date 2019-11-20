<button type="button" class="btn btn-primary pull-right" style="margin:30px 48px 0 0;" data-toggle="modal" data-target="#category_modal">+ Add Category</button>
			<div class="alert alert-success alert-dismissible display_success" style="margin: 21px 180px 0px 48px;position: absolute;width: 80%;display: none;">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Success!</strong> <span class="success"></span>
	  		</div>
<div class="main-grid">
	<div class="social grid">
		<div class="grid-info">
			<!-- tables -->
				<div class="table-heading">
					<h2>Categories</h2>
				</div>
				<div class="agile-tables">
					<div class="w3l-table-info">
						<h3>All Categories List</h3>
						<table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:10;">
							<thead>
								<tr>
									<th>#</th>
									<th>Category Name</th>
									<th>श्रेणी नाम</th>
									<th>Category Image</th>
									<th>Created Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 0; if(!empty($allcategories)) :
									foreach ($allcategories as $category) :
									$no++;
								?>
									<tr>
										<td align="center"><?= $no; ?></td>
										<td align="center">
											<?php 
												if(isset($category['name']))
												{
													echo $category['name'];
												}
											?>
										</td>
										<td align="center">
											<?php 
												if(isset($category['hi_category_name']))
												{
													echo $category['hi_category_name'];
												}
											?>
										</td>

										<td align="center">
											<?php if($category['img_path']) {?>
												<img src="<?= base_url('public/uploads/cat_image/'.$category['img_path']);?>" width="50" height="50">
											<?php }?>
										</td>
										<td align="center">
											<?= date('d-m-Y',strtotime($category['created_at']));?>
										</td>
										<td align="center">
											<a href="#editcategory_modal" data-toggle="modal" data-target="#editcategory_modal" data-id ="<?php echo $category['id'];?>" class="editcategory" data-url = "<?php echo base_url();?>"><i class="fa fa-pencil edit-icon m-r-5"></i></a><a href="javascript:void(0);" onclick="if (!confirm('Are you sure you want to delete this category?')) { return false };DeleteAll('<?php echo base_url();?>','<?= $category['id']; ?>','category','<?php echo $category['img_path']; ?>');" ><i class="fa fa-trash delete-icon m-r-5"></i></a>
											<?php if($category['status'] == '1'){ ?>
												<a href="javascript:void(0);" onclick="if (!confirm('Are you sure you want to Deactive this product?')) { return false };Status_update('<?php echo base_url();?>','<?= $category['id']; ?>','deactive','category');"><i class="fa fa-ban delete-icon m-r-5" data-toggle="tooltip" title="Active"></i></a>
											<?php }else{ ?>
												<a href="javascript:void(0);" onclick="Status_update('<?php echo base_url();?>','<?= $category['id']; ?>','active','category');"><i class="fa fa-check active-icon" data-toggle="tooltip" title="Deactive"></i></a>
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
		 <!-- Add category Modal -->
		  <div class="modal fade" id="category_modal" role="dialog" aria-hidden="true">
		    <div class="modal-dialog">
		      <!-- Modal content-->
		      	<div class="modal-content">
			        <div class="modal-header">
			          	<button type="button" class="close" data-dismiss="modal">&times;</button>
			          	<h4 class="modal-title">Add Category</h4>
			        </div>
			        <div class="modal-body">
							<div class="alert alert-danger alert-dismissible fade in display" style="width: 100%; display: none" role="alert">
					    		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					    		<strong>Required!</strong> <span class="category_errors"></span>
			  				</div>
			          	<form class="form-horizontal" enctype="multipart/form-data" name="addcategory_form" id="addcategory_form" method="post" action="">
			                <div class="form-group">
								<label class="col-md-3 control-label">Category Name</label>
								<div class="col-md-9">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-list-ul"></i>
										</span>
										<input type="text" class="form-control1" name="category_name" id="category_name">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">श्रेणी नाम</label>
								<div class="col-md-9">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-list-ul"></i>
										</span>
										<input type="text" class="form-control1" name="category_name_hindi" id="category_name_hindi">
									</div>
								</div>
							</div>
			                <div class="form-group">
								<label class="col-md-3 control-label">Category Image</label>
								<div class="col-md-9">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-file-image-o"></i>
										</span>
										<input type="file" class="form-control1" name="category_image" id="category_image" onchange="ImageUpload('<?php base_url()?>','category_image')">
										<input type="hidden" name="image" id="image">
									</div>
								</div>
							</div>
			                <div class="modal-footer">
					        	<button type="button" class="btn btn-primary pull-left" onclick="addCategory('<?php base_url()?>','add_category')">Submit</button>
					          	<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
			        		</div>
			            </form>
			        </div>
		      	</div>
		      
		    </div>
		  </div>
		   <!--Edit category Modal -->
		  <div class="modal fade" id="editcategory_modal" role="dialog" aria-hidden="true">
		    <div class="modal-dialog">
		      <!-- Modal content-->
		      	<div class="modal-content">
			        <div class="modal-header">
			          	<button type="button" class="close" data-dismiss="modal">&times;</button>
			          	<h4 class="modal-title">Edit Category</h4>
			        </div>
			        <div class="modal-body">
							<div class="alert alert-danger alert-dismissible fade in display" style="width: 100%; display: none" role="alert">
					    		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					    		<strong>Required!</strong> <span class="category_errors"></span>
			  				</div>
			          	<form class="form-horizontal" enctype="multipart/form-data" name="editcategory_form" id="editcategory_form" method="post" action="">
			          		<input type="hidden" name="editcategory_id" id="editcategory_id">
			                <div class="form-group">
								<label class="col-md-3 control-label">Category Name</label>
								<div class="col-md-9">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-list-ul"></i>
										</span>
										<input type="text" class="form-control1" name="editcategory_name" id="editcategory_name">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">श्रेणी नाम</label>
								<div class="col-md-9">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-list-ul"></i>
										</span>
										<input type="text" class="form-control1" name="editcategory_name_hindi" id="editcategory_name_hindi">
									</div>
								</div>
							</div>
			                <div class="form-group">
								<label class="col-md-3 control-label">Category Image</label>
								<div class="col-md-7">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-file-image-o"></i>
										</span>
										<input type="file" class="form-control1" name="editcategory_image" id="category_image1" onchange="ImageUpload('<?php base_url()?>','category_image1')">
										<input type="hidden" name="editimage" id="editimage">
									</div>
								</div>
								<div class="col-md-2">
									<img src="" width="40" height="40" id="editcategory_img">
								</div>
							</div>
			                <div class="modal-footer">
					        	<button type="button" class="btn btn-primary pull-left" onclick="UpdateCategory('<?php base_url()?>','update_category')">Submit</button>
					          	<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
			        		</div>
			            </form>
			        </div>
		      	</div>
		      
		    </div>
		  </div>
