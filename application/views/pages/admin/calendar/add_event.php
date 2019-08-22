				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['add_event']?><small><?=$label['you_can_add_new_event_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-events-add-event m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['title']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="title" placeholder="<?=$label['title']?>" required>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['select_guide']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_event_guide" name="requester">
												<option></option>
												<?php
												if(isset($guides)):
													foreach($guides as $guide):?>
														<option value="<?=$guide->id?>"><?= $guide->name;?></option>
													<?php endforeach;?>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['tour_type']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_event_tour_type" name="tour_type">
												<option></option>
												<?php
												if(isset($tour_types)):
													foreach($tour_types as $tour_type):?>
														<option value="<?=$tour_type->id?>"><?= $tour_type->tour_type;?></option>
													<?php endforeach;?>
												<?php endif;?>
											</select>
										</div>
										<div class="col-lg-4">
											<sm style="font-size: 11px;" class="desc_tour_type"></sm>
										</div>
									</div>
									<input type="hidden" name="days" value="">
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['start_date']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<?php if($this->session->userdata('site_lang')=="english"):?>
											<input type="text" class="form-control" name="start_date" id="m_datepicker_1" readonly placeholder="<?=$label['start_date']?>"/>
											<?php else:?>
											<input type="text" class="form-control" name="start_date" id="m_datepicker_1" data-date-language="tr" readonly placeholder="<?=$label['start_date']?>"/>
											<?php endif;?>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['finish_date']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<?php if($this->session->userdata('site_lang')=="english"):?>
											<input type="text" class="form-control" name="finish_date" id="m_datepicker_1" readonly placeholder="<?=$label['finish_date']?>"/>
											<?php else:?>
											<input type="text" class="form-control" name="finish_date" id="m_datepicker_1" data-date-language="tr" readonly placeholder="<?=$label['finish_date']?>"/>
											<?php endif;?>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['start_time']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="time" name="start_time" placeholder="<?=$label['start_time']?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['finish_time']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="time" name="finish_time" placeholder="<?=$label['finish_time']?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['location']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="location" placeholder="<?=$label['location']?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['description']?></label>
										<div class="col-lg-7 col-md-9 col-sm-12">
											<textarea class="form-control m-input" name="description" id="exampleTextarea" rows="5" placeholder="<?=$label['please_write_down_description_of_this_job']?>"></textarea>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['activity_color']?></label>
										<div class="col-lg-7 col-md-9 col-sm-12">
											<div class="colorPickSelector">
												<input type="hidden" name="activity_color">
											</div>
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