<?php 
	$allErrors = $news_title_err = $date_err = $nimage_err = $newsdetails_err = $news_titlehindi_err = $newsdetailshindi_err = "";
	$allErrors = $this->session->flashdata('errors');

	if(!empty($allErrors['news_title']))
	{
		$news_title_err = $allErrors['news_title'];
	}

	if(!empty($allErrors['news_title_hindi']))
	{
		$news_titlehindi_err = $allErrors['news_title_hindi'];
	}

	if(!empty($allErrors['date']))
	{
		$date_err = $allErrors['date'];
	}

	if(!empty($allErrors['nimage']))
	{
		$nimage_err = $allErrors['nimage'];
	}
 
	if(!empty($allErrors['editor1']))
	{
		$newsdetails_err = $allErrors['editor1'];
	}

	if(!empty($allErrors['editor2']))
	{
		$newsdetailshindi_err = $allErrors['editor2'];
	}

?>
<div class="main-grid">
			<div class="agile-grids">	
				<!-- input-forms -->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Edit News</h2>
					</div>
					<div class="panel panel-widget forms-panel w3-last-form">
						<div class="forms">
							<div class="form-three widget-shadow">
								<div class=" panel-body-inputin">
									<form class="form-horizontal" action="<?php echo base_url('update_news') ?>" method="post" enctype="multipart/form-data">
										<input type="hidden" name="news_id" id="news_id" value="<?php if(isset($singlenews[0]['id'])) { echo $singlenews[0]['id']; } ?>">
										<div class="form-group">
											<label class="col-md-2 control-label">News Title</label>
											<div class="col-md-8">
												<div class="input-group">							
													<span class="input-group-addon">
														<i class="fa fa-file-image-o"></i>
													</span>
													<input type="text" class="form-control1" name="news_title" id="news_title" value="<?php if(isset($singlenews[0]['news_title'])) { echo $singlenews[0]['news_title']; } ?>">
												</div>
											</div>
											<span class="text-danger"><?= $news_title_err ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">समाचार शीर्षक</label>
											<div class="col-md-8">
												<div class="input-group">							
													<span class="input-group-addon">
														<i class="fa fa-file-image-o"></i>
													</span>
													<input type="text" class="form-control1" name="news_title_hindi" id="news_title_hindi" value="<?php if(isset($singlenews[0]['news_title_hi'])) { echo $singlenews[0]['news_title_hi']; } ?>">
												</div>
											</div>
											<span class="text-danger"><?= $news_titlehindi_err ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">News Image</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-file-image-o"></i>
													</span>
													<input type="file" class="form-control1" name="news_image" id="news_image" onchange="ImageUpload('<?= base_url()?>','news_image')">
													<input type="hidden" name="nimage" id="nimage" value="<?php echo $singlenews[0]['news_image'] ?>">
												</div>
												<span class="text-danger"><?= $nimage_err ?></span>
											</div>
											<div class="col-md-2">
												<?php if($singlenews[0]['news_image']) {?>
													<img src="<?= base_url('public/uploads/cat_image/'.$singlenews[0]['news_image']);?>" width="50" height="50">
												<?php }?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Choose date</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-calender"></i>
													</span>
													<input type="text" class="form-control1" id="mytarget" placeholder="Select date" name="news_date" value="<?php if(isset($singlenews[0]['date'])) { echo $singlenews[0]['date']; } ?>">
													<div class="monthly" id="mycalendar2" style="    z-index: 1 !important;"></div>
												</div>
											</div>
											<span class="text-danger"><?= $date_err ?></span>
										</div>
										<!-- <div class="form-group">
											<label class="col-md-2 control-label">URL Link</label>
											<div class="col-md-8">
												<div class="input-group">							
													<span class="input-group-addon">
														<i class="fa fa-link"></i>
													</span>
													<input type="text" class="form-control1" name="product_image" id="product_image">
												</div>
											</div>
										</div> -->
										<div class="form-group">
											<label class="col-md-2 control-label">News Datails</label>
											<div class="col-md-8">
												<textarea name="editor1" id="editor1"><?php if(isset($singlenews[0]['details'])) { echo $singlenews[0]['details']; } ?></textarea>
											</div>
											<span class="text-danger"><?= $newsdetails_err ?></span>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">समाचार विवरण</label>
											<div class="col-md-8">
												<textarea name="editor2" id="editor2"><?php if(isset($singlenews[0]['details_hi'])) { echo $singlenews[0]['details_hi']; } ?></textarea>
											</div>
											<span class="text-danger"><?= $newsdetailshindi_err ?></span>
										</div>
										<div class="dbutton">
											<button type="submit" class="btn btn-primary">Update News</button>
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