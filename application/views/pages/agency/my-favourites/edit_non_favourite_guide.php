				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['edit_non_favourite_guide']?><small><?=$label['you_can_edit_non_favourite_guide_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-my-favourites-edit-non-favourite-guide m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['non_favourite_guide']?></label>
										<input type="hidden" name="id" value="<?=$non_favourite_guide->id?>">
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_non_favourite_guide" name="non_favourite_guide">
												<option></option>
												<?php if(isset($guides)):
													foreach($guides as $guide):?>
														<?php if($guide->id == $non_favourite_guide->non_favourite_guide):?>
														<option value="<?=$guide->id?>" selected><?= $guide->username;?></option>
														<?php else:?>
														<option value="<?=$guide->id?>"><?= $guide->username;?></option>
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