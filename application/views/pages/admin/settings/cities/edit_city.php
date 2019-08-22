				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['edit_city']?><small><?=$label['you_can_edit_this_city_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-settings-edit-city m-form m-form--fit m-form--label-align-right">
									<input type="hidden" class="edit_city_id" name="id" value="<?=$city->id;?>">
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['city_name']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="city" placeholder="<?=$label['city_name']?>" value="<?=$city->city;?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['city_code']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="city_code" placeholder="<?=$label['city_code']?>" value="<?=$city->city_code;?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['select_country']?></label>
										<input type="hidden" class="edit_city_country" value="<?=$city->country?>">
										<div class="col-lg-5 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_country" name="country">
												
											</select>
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