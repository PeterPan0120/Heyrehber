				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['add_announcement']?><small><?=$label['you_can_add_new_announcement_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-announcements-add-announcement m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['subject']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="subject" placeholder="<?=$label['subject']?>" required>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['category']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_announcement_categories" name="category[]" multiple="multiple">
												<option></option>
												<?php if(isset($categories)):
													foreach($categories as $cate):?>
														<option value="<?=$cate->category?>"><?= $cate->category;?></option>
													<?php endforeach;?>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['description']?></label>
										<div class="col-lg-10 col-md-9 col-sm-12">
			                                <textarea class="add-description" name="description"></textarea>
										</div>
									</div>
									<div class="m-form__actions">
										<button type="submit" class="btn btn-primary"><?=$label['save']?></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>