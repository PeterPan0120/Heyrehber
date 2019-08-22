				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['edit_district']?><small><?=$label['you_can_edit_this_district_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-settings-edit-district m-form m-form--fit m-form--label-align-right">
									<input type="hidden" name="id" value="<?=$district->id;?>">
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['district']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="district" placeholder="<?=$label['district']?>" value="<?=$district->district;?>">
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