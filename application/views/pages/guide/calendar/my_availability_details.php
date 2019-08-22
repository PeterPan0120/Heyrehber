				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['details_of_available_days']?>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-calendar-my-availability-details m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['days']?>:</label>
										<input type="hidden" name="id" value="<?=$guide_availability->id;?>">
										<div class="col-lg-5 col-md-9 col-sm-12">
											<label class="col-form-label">
												<?php if($guide_availability->days=="Several Days"):?>
													<?=$label['several_days']?>
												<?php else:?>
													<?=$label['one_day']?>
												<?php endif;?>
											</label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['from']?>:</label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<label class="col-form-label">
												<?=date('d.m.Y', strtotime($guide_availability->from))?>
											</label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['to']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<label class="col-form-label">
												<?=date('d.m.Y', strtotime($guide_availability->to))?>
											</label>
										</div>
									</div>
									<div class="m-form__actions">
										<a href="/guide/calendar_edit_my_availability?id=<?=$guide_availability->id?>" class="btn btn-primary"><?=$label['edit']?>:</a>
										<a href="/guide/calendar_my_availability" class="btn btn-default"><?=$label['cancel']?></a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>