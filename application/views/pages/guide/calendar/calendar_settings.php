				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['calendar_settings']?>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-calendar-settings m-form m-form--fit m-form--label-align-right">
									<?php 
									if(isset($calendar_settings)):
									?>
										<div class="form-group m-form__group row">
											<label class="col-form-label col-lg-4 col-sm-12"><?=$label['show_my_available_days_to_agencies']?></label>
											<input type="hidden" name="id" value="<?=$calendar_settings->id;?>">
											<div class="col-lg-5 col-md-9 col-sm-12">
													<select class="form-control m-bootstrap-select m_selectpicker" name="which_agency" id="select_which_agency">
														<?php if($calendar_settings->which_agency=="All Agencies"):?>
															<option value="All Agencies" id="option_all_agencies" selected><?=$label['all_agencies']?></option>
														<?php else:?>
															<option value="All Agencies" id="option_all_agencies"><?=$label['all_agencies']?></option>
														<?php endif;?>
														<?php if($calendar_settings->which_agency=="My Favourite Agencies"):?>
															<option value="My Favourite Agencies" id="option_my_favourtie_agencies" selected><?=$label['my_favourite_agencies']?></option>
														<?php else:?>
															<option value="My Favourite Agencies" id="option_my_favourtie_agencies"><?=$label['my_favourite_agencies']?></option>
														<?php endif;?>
														<?php if($calendar_settings->which_agency=="Except My Favourite Agencies"):?>
															<option value="Except My Favourite Agencies" id="except_my_favourite_agencies" selected><?=$label['except_my_favourite_agencies']?></option>
														<?php else:?>
															<option value="Except My Favourite Agencies" id="except_my_favourite_agencies"><?=$label['except_my_favourite_agencies']?></option>
														<?php endif;?>
														<?php if($calendar_settings->which_agency=="Do not show"):?>
														<option value="Do not show" id="option_do_not_show" selected><?=$label['do_not_show']?></option>
														<?php else:?>
														<option value="Do not show" id="option_do_not_show"><?=$label['do_not_show']?></option>
														<?php endif;?>
													</select>
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label class="col-form-label col-lg-4 col-sm-12"><?=$label['show_my_available_days_to_guides']?></label>
											<div class="col-lg-5 col-md-9 col-sm-12">
												<select class="form-control m-bootstrap-select m_selectpicker" name="which_guide" id="select_which_guide">
													<?php if($calendar_settings->which_guide=="All Agencies"):?>
													<option value="All Agencies" id="option_all_agencies" selected><?=$label['all_agencies']?></option>
													<?php else:?>
													<option value="All Agencies" id="option_all_agencies"><?=$label['all_agencies']?></option>
													<?php endif;?>
													<?php if($calendar_settings->which_guide=="My Favourite Agencies"):?>
													<option value="My Favourite Agencies" id="option_my_favourtie_agencies" selected><?=$label['my_favourite_agencies']?></option>
													<?php else:?>
													<option value="My Favourite Agencies" id="option_my_favourtie_agencies"><?=$label['my_favourite_agencies']?></option>
													<?php endif;?>
													<?php if($calendar_settings->which_guide=="Except My Favourite Agencies"):?>
													<option value="My Favourite Agencies" id="except_my_favourite_agencies" selected><?=$label['except_my_favourite_agencies']?></option>
													<?php else:?>
													<option value="My Favourite Agencies" id="except_my_favourite_agencies"><?=$label['except_my_favourite_agencies']?></option>
													<?php endif;?>
													<?php if($calendar_settings->which_guide=="Do not show"):?>
													<option value="Do not show" id="option_do_not_show" selected><?=$label['do_not_show']?></option>
													<?php else:?>
													<option value="Do not show" id="option_do_not_show"><?=$label['do_not_show']?></option>
													<?php endif;?>
												</select>
											</div>
										</div>
									<?php 
									else:
									?>
										<div class="form-group m-form__group row">
											<label class="col-form-label col-lg-4 col-sm-12"><?=$label['show_my_available_days_to_agencies']?></label>
											<div class="col-lg-5 col-md-9 col-sm-12">
												<select class="form-control m-bootstrap-select m_selectpicker" name="which_agency" id="select_which_agency">
													<option value="All Agencies" id="option_all_agencies"><?=$label['all_agencies']?></option>
													<option value="My Favourite Agencies" id="option_my_favourtie_agencies"><?=$label['my_favourite_agencies']?></option>
													<option value="My Favourite Agencies" id="except_my_favourite_agencies"><?=$label['except_my_favourite_agencies']?></option>
													<option value="Do not show" id="option_do_not_show"><?=$label['do_not_show']?></option>
												</select>
											</div>
										</div>
										<div class="form-group m-form__group row">
											<label class="col-form-label col-lg-4 col-sm-12"><?=$label['show_my_available_days_to_guides']?></label>
											<div class="col-lg-5 col-md-9 col-sm-12">
												<select class="form-control m-bootstrap-select m_selectpicker" name="which_guide" id="select_which_guide">
													<option value="All Guides" id="option_all_guides"><?=$label['all_guides']?></option>
													<option value="My Favourite Guides" id="option_my_favourtie_guides"><?=$label['my_favourite_guides']?></option>
													<option value="My Favourite Guides" id="except_my_favourite_guides"><?=$label['except_my_favourite_guides']?></option>
													<option value="Do not show" id="option_do_not_show"><?=$label['do_not_show']?></option>
												</select>
											</div>
										</div>
									<?php endif;?>
									<div class="m-form__actions">
										<button type="submit" class="btn btn-primary"><?=$label['save']?></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>