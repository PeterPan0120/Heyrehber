				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['edit_tour_type']?><small><?=$label['you_can_edit_this_tour_type_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-settings-edit-tour-type m-form m-form--fit m-form--label-align-right">
									<input type="hidden" name="id" value="<?=$tour_type->id;?>">
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['tour_type']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="tour_type" placeholder="<?=$label['tour_type']?>" value="<?=$tour_type->tour_type;?>"required>
										</div>
									</div>
									<div class="m-form__group form-group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['days']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<div class="m-radio-list">
												<label class="m-radio m-radio--brand">
													<?php if($tour_type->days=="One Day"):?>
													<input type="radio" name="days" value="One Day" checked> One Day
													<?php else:?>
													<input type="radio" name="days" value="One Day"> One Day
													<?php endif;?>
													<span></span>
												</label>
												<label class="m-radio m-radio--brand">
													<?php if($tour_type->days=="Several Days"):?>
													<input type="radio" name="days" value="Several Days" checked> Several Days
													<?php else:?>
													<input type="radio" name="days" value="Several Days"> Several Days
													<?php endif;?>
													<span></span>
												</label>
											</div>
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