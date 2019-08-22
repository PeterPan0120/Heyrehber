				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['edit_guide']?><small><?=$label['you_can_edit_this_guide_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-guides-edit-guide m-form m-form--fit m-form--label-align-right">
									<h3><?=$label['personal_details']?></h3>
									<div class="row">
										<div class="col-lg-8">
											<input type="hidden" name="id" value="<?=$guide->id;?>">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input type="hidden" name="oldemail" value="<?=$guide->email;?>">
													<input class="form-control m-input" type="email" name="email" placeholder="<?=$label['email']?>" value="<?=$guide->email;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="name" placeholder="<?=$label['name']?>" value="<?=$guide->name;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['sirname']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="sirname" placeholder="<?=$label['sirname']?>" value="<?=$guide->sirname;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['username']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="username" placeholder="<?=$label['username']?>" value="<?=$guide->username;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['phone_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="phone_number" placeholder="<?=$label['phone_number']?>" value="<?=$guide->phone_number;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['address']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="address" placeholder="<?=$label['address']?>" value="<?=$guide->address;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['district']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_guide_district" name="district">
														<option></option>
														<?php if (isset($districts)):
    foreach ($districts as $district): ?>
																	<?php if ($district->id == $guide->district): ?>
																	<option value="<?=$district->id?>" selected><?=$district->district;?></option>
																	<?php else: ?>
																<option value="<?=$district->id?>"><?=$district->district;?></option>
																<?php endif;?>
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
																	<?php if ($guide->city == $city->id): ?>
																	<option value="<?=$city->id?>" selected><?=$city->city;?></option>
																	<?php else: ?>
																<option value="<?=$city->id?>"><?=$city->city;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['password']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="password" name="password" placeholder="<?=$label['password']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['confirm_password']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="password" name="rpassword" placeholder="<?=$label['confirm_password']?>">
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group m-form__group row">
						                        <div class="div-photo">
						                        	<h4><?=$label['guide_photo']?></h4>
						                          	<div class="wrap-custom-guide-photo">
						                              	<input type="file" name="guide_photo" id="edit_guide_photo" accept=".jpg, .png, .bmp, .gif">
						                              	<?php if (isset($guide->photo)): ?>
				                                        <label class="file-ok" for="edit_guide_photo" style="background-image: url('<?=base_url() . $guide->photo;?>'); background-size: cover;
				                                            background-position: center;">
				                                            <span><?=substr($guide->photo, 20)?></span>
				                                        </label>
				                                        <?php else: ?>
						                              	<label for="edit_guide_photo">
						                                  	<span><?=$label['guide_photo']?></span>
						                                  	<i class="fa fa-plus-circle"></i>
						                              	</label>
				                                       	<?php endif;?>
						                          	</div>
						                        </div>
						                    </div>
										</div>
									</div>
									<br><hr><br>
									<h3><?=$label['guide_details']?></h3>
									<div class="row">
										<div class="col-lg-8">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['certificate_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="certificate_number" placeholder="<?=$label['certificate_number']?>" value="<?=$guide->certificate_number;?>">
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
																	<?php if ($guide->chamber == $chamber->id): ?>
																	<option value="<?=$chamber->id?>" selected><?=$chamber->chamber;?></option>
																	<?php else: ?>
																<option value="<?=$chamber->id?>"><?=$chamber->chamber;?></option>
																<?php endif;?>
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
															<?php if ($guide->work_range == "All Turkey"): ?>
															<input type="radio" name="work_range" value="All Turkey" id="range_all_turkey" checked> All Turkey
															<?php else: ?>
															<input type="radio" name="work_range" value="All Turkey" id="range_all_turkey"> All Turkey
															<?php endif;?>
															<span></span>
														</label>
														<label class="m-radio m-radio--brand">
															<?php if ($guide->work_range == "All Turkey"): ?>
															<input type="radio" name="work_range" value="Some Regions" id="range_some_regions"> Some Regions
															<?php else: ?>
															<input type="radio" name="work_range" value="Some Regions" id="range_some_regions" checked> Some Regions
															<?php endif;?>
															<span></span>
														</label>
													</div>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['region']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<?php
if (isset($guide->regions) && $guide->regions != "") {
    $regArray = json_decode($guide->regions);
}
?>
													<?php if ($guide->work_range == "All Turkey"): ?>
													<select class="form-control m-select2" id="select_guide_regions" name="regions[]" multiple="multiple" disabled>
													<?php else: ?>
													<select class="form-control m-select2" id="select_guide_regions" name="regions[]" multiple="multiple">
													<?php endif;?>
														<option></option>
														<?php
if (isset($regions)):
    foreach ($regions as $region): ?>
																	<?php if (isset($regArray) && array_search($region->region, $regArray) !== false): ?>
																	<option value="<?=$region->region?>" selected><?=$region->region;?></option>
																	<?php else: ?>
																	<option value="<?=$region->region?>"><?=$region->region;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['languages']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<?php
if (isset($guide->languages)) {
    $langArray = json_decode($guide->languages);
}

?>
													<select class="form-control m-select2" id="select_guide_languages" name="languages[]" multiple="multiple">
														<option></option>
														<?php
if (isset($languages)):
    foreach ($languages as $language): ?>
																	<?php if (isset($langArray) && array_search($language->language, $langArray) !== false): ?>
																	<option value="<?=$language->language?>" selected><?=$language->language;?></option>
																	<?php else: ?>
																	<option value="<?=$language->language?>"><?=$language->language;?></option>
																<?php endif;?>
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
																	<?php if ($guide->specialisties == $spec->id): ?>
																	<option value="<?=$spec->id?>" selected><?=$spec->specialisties;?></option>
																	<?php else: ?>
																<option value="<?=$spec->id?>"><?=$spec->specialisties;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['points']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="number" name="points" placeholder="<?=$label['points']?>" value="<?=$guide->points;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['active']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<span class="m-switch m-switch--outline m-switch--icon m-switch--success">
														<label>
															<?php if ($guide->status == "active"): ?>
															<input type="checkbox" name="status" value="active" checked>
															<?php else: ?>
															<input type="checkbox" name="status" value="active">
															<?php endif;?>
															<input type="checkbox" name="status" value="deactive">
															<span></span>
														</label>
													</span>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group m-form__group row">
						                        <div class="div-certificate">
						                        	<h4><?=$label['certificate']?></h4>
						                          	<div class="wrap-custom-certificate">
						                              	<input type="file" name="certificate" id="edit_certificate" accept="*">
						                              	<?php if (isset($guide->certificate)): ?>
				                                        <label class="file-ok" for="edit_certificate" style="background-image: url('<?=base_url() . $guide->certificate;?>'); background-size: cover;
				                                            background-position: center;">
				                                            <span><?=substr($guide->certificate, 26)?></span>
				                                        </label>
				                                        <?php else: ?>
						                              	<label for="edit_certificate">
						                                  	<span><?=$label['certificate']?></span>
						                                  	<i class="fa fa-plus-circle"></i>
						                              	</label>
						                              	<?php endif;?>
						                          </div>
						                        </div>
						                    </div>
						                    <div class="form-group m-form__group row">
						                        <div class="div-certificate-front">
						                        	<h4><?=$label['certificate_front']?></h4>
						                          	<div class="wrap-custom-certificate-front">
						                              	<input type="file" name="certificate_front" id="edit_certificate_front" accept="*">
						                              	<?php if (isset($guide->certificate_front_picture)): ?>
				                                        <label class="file-ok" for="edit_certificate_front" style="background-image: url('<?=base_url() . $guide->certificate_front_picture;?>'); background-size: cover;
				                                            background-position: center;">
				                                            <span><?=substr($guide->certificate_front_picture, 23)?></span>
				                                        </label>
				                                        <?php else: ?>
						                              	<label for="edit_certificate_front">
						                                  	<span><?=$label['certificate_front']?></span>
						                                  	<i class="fa fa-plus-circle"></i>
						                              	</label>
						                              	<?php endif;?>
						                          </div>
						                        </div>
						                    </div>
						                    <div class="form-group m-form__group row">
						                        <div class="div-certificate-back">
						                        	<h4><?=$label['certificate_back']?></h4>
						                          	<div class="wrap-custom-certificate-back">
						                              	<input type="file" name="certificate_back" id="edit_certificate_back" accept="*">
						                              	<?php if (isset($guide->certificate_back_picture)): ?>
				                                        <label class="file-ok" for="edit_certificate_back" style="background-image: url('<?=base_url() . $guide->certificate_back_picture;?>'); background-size: cover;
				                                            background-position: center;">
						                                  	<span><?=substr($guide->certificate_back_picture, 22)?></span>
				                                        </label>
				                                        <?php else: ?>
						                              	<label for="edit_certificate_back">
						                                  	<span><?=$label['certificate_back']?></span>
						                                  	<i class="fa fa-plus-circle"></i>
						                              	</label>
						                              	<?php endif;?>
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
													<input class="form-control m-input" type="text" name="facebook" placeholder="<?=$label['facebook']?>" value="<?=$guide->facebook;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['instagram']?>  <i class="socicon-instagram" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="instagram" placeholder="<?=$label['instagram']?>" value="<?=$guide->instagram;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['twitter']?>  <i class="socicon-twitter" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="twitter" placeholder="<?=$label['twitter']?>" value="<?=$guide->twitter;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['linkedin']?>  <i class="socicon-linkedin" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="linkedin" placeholder="<?=$label['linkedin']?>" value="<?=$guide->linkedin;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['google+']?>  <i class="socicon-googleplus" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="google" placeholder="<?=$label['google+']?>" value="<?=$guide->google;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['youtube']?>  <i class="socicon-youtube" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="youtube" placeholder="<?=$label['youtube']?>" value="<?=$guide->youtube;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['pinterest']?>  <i class="socicon-pinterest" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="pinterest" placeholder="<?=$label['pinterest']?>" value="<?=$guide->pinterest;?>">
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['tumblr']?>  <i class="socicon-tumblr" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="tumblr" placeholder="<?=$label['tumblr']?>" value="<?=$guide->tumblr;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['flickr']?>  <i class="socicon-flickr" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="flickr" placeholder="<?=$label['flickr']?>" value="<?=$guide->flickr;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['snapchat']?>  <i class="socicon-snapchat" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="snapchat" placeholder="<?=$label['snapchat']?>" value="<?=$guide->snapchat;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['whatsapp']?>  <i class="socicon-whatsapp" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="whatsapp" placeholder="<?=$label['whatsapp']?>" value="<?=$guide->whatsapp;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['viber']?>  <i class="socicon-viber" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="viber" placeholder="<?=$label['viber']?>" value="<?=$guide->viber;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['skype']?>  <i class="socicon-skype" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="skype" placeholder="<?=$label['skype']?>" value="<?=$guide->skype;?>">
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