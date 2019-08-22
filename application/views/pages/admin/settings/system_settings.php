				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['system_settings']?>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-settings-system-settings m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['site_tagline']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="site_tagline" placeholder="<?=$label['site_tagline']?>" value="<?=$system_settings->site_tagline;?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['site_phone_number']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="site_phone_number" placeholder="<?=$label['site_phone_number']?>" value="<?=$system_settings->site_phone_number;?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['site_help_email']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="email" name="site_help_email" placeholder="<?=$label['site_help_email']?>" value="<?=$system_settings->site_help_email;?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['allow_multi_languages']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<span class="m-switch m-switch--outline m-switch--icon m-switch--success">
												<label>
													<?php if($system_settings->allow_multi_language=="yes"):?>
													<input type="checkbox" checked="checked" name="allow_multi_language" value="yes">
													<?php else:?>
													<input type="checkbox" name="allow_multi_language" value="yes">
													<?php endif;?>
													<input type="checkbox" name="allow_multi_language">
													<span></span>
												</label>
											</span>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['default_admin_language']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_admin_language" name="default_admin_language">
												<option></option>
												<?php if($system_settings->default_admin_language=="English"):?>
												<option value="English" selected>English</option>
												<option value="Turkish">Turkish</option>
												<?php else:?>
												<option value="English">English</option>
												<option value="Turkish" selected>Turkish</option>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['default_agency_language']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_agency_language" name="default_agency_language">
												<option></option>
												<?php if($system_settings->default_agency_language=="English"):?>
												<option value="English" selected>English</option>
												<option value="Turkish">Turkish</option>
												<?php else:?>
												<option value="English">English</option>
												<option value="Turkish" selected>Turkish</option>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['default_guide_language']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_guide_language" name="default_guide_language">
												<option></option>
												<?php if($system_settings->default_guide_language=="English"):?>
												<option value="English" selected>English</option>
												<option value="Turkish">Turkish</option>
												<?php else:?>
												<option value="English">English</option>
												<option value="Turkish" selected>Turkish</option>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['default_frontend_language']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_frontend_language" name="default_frontend_language">
												<option></option>
												<?php if($system_settings->default_frontend_language=="English"):?>
												<option value="English" selected>English</option>
												<option value="Turkish">Turkish</option>
												<?php else:?>
												<option value="English">English</option>
												<option value="Turkish" selected>Turkish</option>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['reset_token_lifetime_hour']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="number" name="reset_token_lifetime" placeholder="<?=$label['reset_token_lifetime_hour']?>" value="<?=$system_settings->reset_token_lifetime?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['max_login_restrict_time_second']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="number" name="max_login_restrict_time" placeholder="<?=$label['max_login_restrict_time_second']?>" value="<?=$system_settings->max_login_restrict_time?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['max_login_attempts']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="number" name="max_login_attempts" placeholder="<?=$label['max_login_attempts']?>" value="<?=$system_settings->max_login_attempts?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['admin_email']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="email" name="admin_email" placeholder="<?=$label['admin_email']?>" value="<?=$system_settings->admin_email?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['email_active_language']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="email_active_language" name="email_active_language">
												<option></option>
												<?php if($system_settings->email_active_language=="English"):?>
												<option value="English" selected>English</option>
												<option value="Turkish">Turkish</option>
												<?php else:?>
												<option value="English">English</option>
												<option value="Turkish" selected>Turkish</option>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['admin_perpage']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="number" name="admin_per_page" placeholder="<?=$label['admin_perpage']?>" value="<?=$system_settings->admin_per_page?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['site_email']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="email" name="site_email" placeholder="<?=$label['site_email']?>" value="<?=$system_settings->site_email?>">
										</div>
									</div>
									<button type="submit" class="btn btn-primary"><?=$label['save']?></button>
								</form>
							</div>
						</div>
					</div>
				</div>