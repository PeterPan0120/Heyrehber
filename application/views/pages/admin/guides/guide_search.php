				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['guide_search']?><small><?=$label['you_can_search_guides_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-guides-search-guide m-form m-form--fit m-form--label-align-right">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group row">
												<label class="col-lg-12 col-sm-12"><?=$label['is_it_one_day']?></label>
												<div class="col-lg-12 col-md-9 col-sm-12">
													<div class="m-radio-list">
														<label class="m-radio m-radio--brand">
															<input type="radio" name="days" value="yes" id="days_yes"> Yes
															<span></span>
														</label>
														<label class="m-radio m-radio--brand">
															<input type="radio" name="days" value="no" id="days_no"> No
															<span></span>
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group row">
												<div class="col-lg-6">
													<label class="label-start-date col-form-label col-lg-12 col-sm-12"><?=$label['start_date']?></label>
													<label class="label-tour-date col-form-label col-lg-12 col-sm-12"><?=$label['tour_date']?></label>
													<div class="col-lg-12 col-md-9 col-sm-12">
														<?php if($this->session->userdata('site_lang')=="english"):?>
														<input type="text" class="form-control" name="start_date" id="m_datepicker_1" readonly placeholder="<?=$label['start_date']?>" />
														<?php else:?>
														<input type="text" class="form-control" name="start_date" id="m_datepicker_1" data-date-language="tr" readonly placeholder="<?=$label['start_date']?>" />
														<?php endif;?>
													</div>
												</div>
												<div class="col-lg-6">
													<label class="col-form-label col-lg-12 col-sm-12"><?=$label['finish_date']?></label>
													<div class="col-lg-12 col-md-9 col-sm-12">
														<?php if($this->session->userdata('site_lang')=="english"):?>
														<input type="text" class="form-control" name="finish_date" id="m_datepicker_1" readonly placeholder="<?=$label['finish_date']?>" />
														<?php else:?>
														<input type="text" class="form-control" name="finish_date" id="m_datepicker_1" data-date-language="tr" readonly placeholder="<?=$label['finish_date']?>" />
														<?php endif;?>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group row">
												<label class="col-form-label col-lg-12 col-sm-12"><?=$label['language']?></label>
												<div class="col-lg-12 col-md-8 col-sm-12">
													<select class="form-control m-select2" id="select_guide_search_language" name="language">
														<option></option>
														<?php if(isset($languages)):?>
															<?php foreach($languages as $language):?>
																<option value="<?=$language->language?>"><?=$language->language?></option>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group row">
												<label class="col-form-label col-lg-12 col-sm-12"><?=$label['tour_place']?></label>
												<div class="col-lg-12 col-md-12 col-sm-12">
													<select class="form-control m-select2" id="select_guide_search_city" name="city">
														<option></option>
														<?php if(isset($cities)):?>
															<?php foreach($cities as $city):?>
																<option value="<?=$city->id?>"><?=$city->city?></option>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="m-form__actions" style="text-align: center">
										<hr>
										<h3>Matched Guides</h3>
										<hr>
									</div>
								</form>
								<div class="m_datatable" id="m_guide_search_datatable"></div>
							</div>
						</div>
					</div>
				</div>