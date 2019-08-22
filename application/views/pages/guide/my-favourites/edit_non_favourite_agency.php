				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['edit_non_favourite_agency']?><small><?=$label['you_can_edit_non_favourite_agency_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-my-favourites-edit-non-favourite-agency m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['non_favourite_agency']?></label>
										<input type="hidden" name="id" value="<?=$non_favourite_agency->id?>">
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_non_favourite_agency" name="non_favourite_agency">
												<option></option>
												<?php if(isset($agencies)):
													foreach($agencies as $agency):?>
														<?php if($agency->id == $non_favourite_agency->non_favourite_agency):?>
														<option value="<?=$agency->id?>" selected><?= $agency->username;?></option>
														<?php else:?>
														<option value="<?=$agency->id?>"><?= $agency->username;?></option>
														<?php endif;?>
													<?php endforeach;?>
												<?php endif;?>
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