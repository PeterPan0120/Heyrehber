				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['details_of_announcement']?><small><?=$label['you_can_see_details_of_this_announcement_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-announcements-edit-announcement m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<input type="hidden" name="id" value="<?=$announcement->id;?>">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['subject']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$announcement->subject?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['category']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<?php 
											if(isset($announcement->category)):
												$category = json_decode($announcement->category);
												foreach ($category as $cat):?>
													<label class="col-form-label"><?=$cat?></label>
													<br>
												<?php endforeach;?>
											<?php endif;?>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['description']?>:</label>
										<div class="col-lg-10 col-md-9 col-sm-12">
			                                <label class="col-form-label"><?=$announcement->description?></label>
										</div>
									</div>
									<div class="m-form__actions">
										<a href="/admin/announcements_edit_announcement?id=<?=$announcement->id?>" class="btn btn-primary"><?=$label['edit']?></a>
										<a href="/admin/announcements_announcements" class="btn btn-default"><?=$label['cancel']?></a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>