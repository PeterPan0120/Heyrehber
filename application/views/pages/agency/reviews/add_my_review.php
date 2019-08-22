				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['add_my_review']?><small><?=$label['you_can_add_new_agency_review_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-agency-reviews-add-my-review m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['agency']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input type="hidden" name="agency" value="<?=$agency->id?>">
											<label class="col-form-label col-lg-2 col-sm-12">
												<?=$agency->username;?>
											</label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['guide']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<select class="form-control m-bootstrap-select m_selectpicker" name="guide" id="select-my-review-guide">
												<?php if(isset($guides)):
													foreach($guides as $guide):?>
														<option value="<?=$guide->id?>"><?= $guide->username;?></option>
													<?php endforeach;?>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['review']?></label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											<textarea class="form-control m-input" name="review" id="exampleTextarea" rows="3" placeholder="<?=$label['please_write_down_review']?>..."></textarea>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['rating']?></label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											<!-- <input id="add_guide_rating" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="0"> -->
											<div class="awesomeRating" style="font-size: 2.5em;"></div>
											<input type="hidden" name="rating" class="awesomeRatingValue">
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