				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['add_guide_request']?><small><?=$label['you_can_add_new_guide_request_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-guide-requests-add-guide-request m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['title']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="title" placeholder="<?=$label['title']?>" required>
										</div>
									</div>
									<div class="m-form__group form-group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['range']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<div class="m-radio-list">
												<label class="m-radio m-radio--brand">
													<input type="radio" name="range" value="Domestic" id="range_domestic" checked> Domestic
													<span></span>
												</label>
												<label class="m-radio m-radio--brand">
													<input type="radio" name="range" value="Overseas" id="range_overseas"> Overseas
													<span></span>
												</label>
											</div>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['regions']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_guide_request_regions" name="regions[]" multiple="multiple">
												<option></option>
												<?php
												if(isset($regions)):
													foreach($regions as $region):?>
														<option value="<?=$region->region?>"><?= $region->region;?></option>
													<?php endforeach;?>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['route']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="route" placeholder="<?=$label['route']?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['tour_type']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_guide_request_tour_type" name="tour_type">
												<option></option>
												<?php
												if(isset($tour_types)):
													foreach($tour_types as $tour_type):?>
														<option value="<?=$tour_type->id?>"><?= $tour_type->tour_type;?></option>
													<?php endforeach;?>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['guest_nationality']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="guest_nationality" placeholder="<?=$label['guest_nationality']?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['requested_language']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="requested_language" placeholder="<?=$label['requested_language']?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['how_many_guides?']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="number" name="guide_number" placeholder="<?=$label['how_many_guides?']?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['how_many_guests?']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="number" name="guest_number" placeholder="<?=$label['how_many_guests?']?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['start_date']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="date" name="start_date">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['finish_date']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="date" name="finish_date">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['start_location']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="start_location" placeholder="<?=$label['start_location']?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['finish_location']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="finish_location" placeholder="<?=$label['finish_location']?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['description']?></label>
										<div class="col-lg-7 col-md-9 col-sm-12">
											<textarea class="form-control m-input" name="description" id="exampleTextarea" rows="5" placeholder="<?=$label['please_write_down_description_of_this_guide_request']?>"></textarea>
										</div>
									</div>
									<div class="m-form__actions">

										<button type="submit" class="btn btn-primary"> <?=$label['save']?></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>