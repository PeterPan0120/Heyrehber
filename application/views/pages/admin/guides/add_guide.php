				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['add_guide']?><small><?=$label['you_can_add_new_guide_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-guides-add-guide m-form m-form--fit m-form--label-align-right">
									<h3><?=$label['personal_details']?></h3>
									<div class="row">
										<div class="col-lg-8">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="email" name="email" placeholder="<?=$label['email']?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="name" placeholder="<?=$label['name']?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['sirname']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="sirname" placeholder="<?=$label['sirname']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['username']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="username" placeholder="<?=$label['username']?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['phone_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="phone_number" placeholder="<?=$label['phone_number']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['address']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="address" placeholder="<?=$label['address']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['district']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_guide_district" name="district">
														<option></option>
														<?php if (isset($districts)):
    foreach ($districts as $district): ?>
																				<option value="<?=$district->id?>"><?=$district->district;?></option>
																			<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['city']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_guide_city" name="city">
														<option></option>
														<?php if (isset($cities)):
    foreach ($cities as $city): ?>
																				<option value="<?=$city->id?>"><?=$city->city;?></option>
																			<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['password']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="password" name="password" placeholder="<?=$label['password']?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['confirm_password']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="password" name="rpassword" placeholder="<?=$label['confirm_password']?>" required>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group m-form__group row">
						                        <div class="div-photo">
						                          	<div class="wrap-custom-guide-photo">
						                              	<input type="file" name="guide_photo" id="add_guide_photo" accept=".jpg, .png, .bmp, .gif">
						                              	<label for="add_guide_photo">
						                                  	<span><?=$label['guide_photo']?></span>
						                                  	<i class="fa fa-plus-circle"></i>
						                              	</label>
						                          	</div>
						                        </div>
						                    </div>
										</div>
									</div>
									<br><hr><br>
									<h3><?=$label['guide_details']?></h3>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['certificate_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="certificate_number" placeholder="<?=$label['certificate_number']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['chamber_name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_guide_chamber" name="chamber">
														<option></option>
														<?php
if (isset($chambers)):
    foreach ($chambers as $chamber): ?>
																				<option value="<?=$chamber->id?>"><?=$chamber->chamber;?></option>
																			<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="m-form__group form-group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['work_range']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<div class="m-radio-list">
														<label class="m-radio m-radio--brand">
															<input type="radio" name="work_range" value="All Turkey" id="range_all_turkey" checked> <?=$label['all_turkey']?>
															<span></span>
														</label>
														<label class="m-radio m-radio--brand">
															<input type="radio" name="work_range" value="Some Regions" id="range_some_regions"> <?=$label['some_regions']?>
															<span></span>
														</label>
													</div>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['region']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_guide_regions" name="regions[]" multiple="multiple">
														<option></option>
														<?php
if (isset($regions)):
    foreach ($regions as $region): ?>
																				<option value="<?=$region->region?>"><?=$region->region;?></option>
																			<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['languages']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_guide_languages" name="languages[]" multiple="multiple">
														<option></option>
														<?php if (isset($languages)):
    foreach ($languages as $language): ?>
																				<option value="<?=$language->language?>"><?=$language->language;?></option>
																			<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['specialisties']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_guide_specialisties" name="specialisties">
														<option></option>
														<?php
if (isset($specialisties)):
    foreach ($specialisties as $spec): ?>
																				<option value="<?=$spec->id?>"><?=$spec->specialisties;?></option>
																			<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['points']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="number" name="points" placeholder="<?=$label['points']?>">
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group m-form__group row">
						                        <div class="div-certificate">
						                          	<div class="wrap-custom-certificate">
						                              	<input type="file" name="certificate" id="add_certificate" accept="*">
						                              	<label for="add_certificate">
						                                  	<span><?=$label['certificate']?></span>
						                                  	<i class="fa fa-plus-circle"></i>
						                              	</label>
						                          </div>
						                        </div>
						                    </div>
						                    <div class="form-group m-form__group row">
						                        <div class="div-certificate-front">
						                          	<div class="wrap-custom-certificate-front">
						                              	<input type="file" name="certificate_front" id="add_certificate_front" accept="*">
						                              	<label for="add_certificate_front">
						                                  	<span><?=$label['certificate_front']?></span>
						                                  	<i class="fa fa-plus-circle"></i>
						                              	</label>
						                          </div>
						                        </div>
						                    </div>
						                    <div class="form-group m-form__group row">
						                        <div class="div-certificate-back">
						                          	<div class="wrap-custom-certificate-back">
						                              	<input type="file" name="certificate_back" id="add_certificate_back" accept="*">
						                              	<label for="add_certificate_back">
						                                  	<span><?=$label['certificate_back']?></span>
						                                  	<i class="fa fa-plus-circle"></i>
						                              	</label>
						                          	</div>
						                        </div>
						                    </div>
										</div>
									</div>
									<br><hr><br>
									<h3><?=$label['social_media_details']?></h3>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['facebook']?>  <i class="socicon-facebook" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="facebook" placeholder="<?=$label['facebook']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['instagram']?>  <i class="socicon-instagram" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="instagram" placeholder="<?=$label['instagram']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['twitter']?>  <i class="socicon-twitter" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="twitter" placeholder="<?=$label['twitter']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['linkedin']?>  <i class="socicon-linkedin" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="linkedin" placeholder="<?=$label['linkedin']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['google+']?>  <i class="socicon-googleplus" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="google" placeholder="<?=$label['google+']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['youtube']?>  <i class="socicon-youtube" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="youtube" placeholder="<?=$label['youtube']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['pinterest']?>  <i class="socicon-pinterest" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="pinterest" placeholder="<?=$label['pinterest']?>">
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['tumblr']?>  <i class="socicon-tumblr" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="tumblr" placeholder="<?=$label['tumblr']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['flickr']?>  <i class="socicon-flickr" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="flickr" placeholder="<?=$label['flickr']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['snapchat']?>  <i class="socicon-snapchat" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="snapchat" placeholder="<?=$label['snapchat']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['whatsapp']?>  <i class="socicon-whatsapp" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="whatsapp" placeholder="<?=$label['whatsapp']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['viber']?>  <i class="socicon-viber" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="viber" placeholder="<?=$label['viber']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['skype']?>  <i class="socicon-skype" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="skype" placeholder="<?=$label['skype']?>">
												</div>
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