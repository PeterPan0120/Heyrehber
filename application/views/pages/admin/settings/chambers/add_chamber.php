				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['add_chamber']?><small><?=$label['you_can_add_new_chamber_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-settings-add-chamber m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['chamber']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="chamber" placeholder="<?=$label['chamber']?>" required>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['chamber_short']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="chamber_short" placeholder="<?=$label['chamber_short']?>" required>
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