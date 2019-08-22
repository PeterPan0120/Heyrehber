				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['my_profile']?><small><?=$label['this_is_my_profile']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-guide-my-profile m-form m-form--fit m-form--label-align-right">
									<h3> <?=$label['personal_details']?></h3>
									<div class="row">
										<div class="col-lg-8">
											<input type="hidden" name="id" value="<?=$guide->id;?>">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input type="hidden" name="oldemail" value="<?=$guide->email;?>">
													<input class="form-control m-input" type="email" name="email" placeholder="<?=$label['email']?>"  value="<?=$guide->email;?>" required>
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
													<input class="form-control m-input" type="text" name="sirname" placeholder="<?=$label['sirname']?>" value="<?=$guide->sirname;?>">
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
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['city']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_guide_city" name="city">
														<option></option>
														<?php if(isset($cities)):
															foreach($cities as $city):?>
																<?php if($guide->city == $city->city):?>
																<option value="<?=$city->city?>" selected><?= $city->city;?></option>
																<?php else:?>
																<option value="<?=$city->city?>"><?= $city->city;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['district']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_guide_district" name="district">
														<option></option>
														<?php if(isset($districts)):
															foreach($districts as $district):?>
																<?php if($district->district == $guide->district):?>
																<option value="<?=$district->district?>" selected><?= $district->district;?></option>
																<?php else:?>
																<option value="<?=$district->district?>"><?= $district->district;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<a class="pwd-change" href="#"><?=$label['change_password']?></a>
												</div>
											</div>
											<div class="change-password hide">
												<div class="form-group m-form__group row">
													<label class="col-form-label col-lg-4 col-sm-12"><?=$label['old_password']?></label>
													<div class="col-lg-8 col-md-9 col-sm-12">
														<input class="form-control m-input" type="password" name="old_password" placeholder="<?=$label['old_password']?>">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-form-label col-lg-4 col-sm-12"><?=$label['new_password']?></label>
													<div class="col-lg-8 col-md-9 col-sm-12">
														<input class="form-control m-input" type="password" name="password" placeholder="<?=$label['new_password']?>">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-form-label col-lg-4 col-sm-12"><?=$label['confirm_password']?></label>
													<div class="col-lg-8 col-md-9 col-sm-12">
														<input class="form-control m-input" type="password" name="rpassword" placeholder="<?=$label['confirm_password']?>">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group m-form__group row">
						                        <div class="div-guide-photo">
						                          	<div class="wrap-custom-guide-photo">
						                              	<input type="file" name="photo" id="edit_guide_photo" accept=".gif, .jpg, .png">
						                              	<?php if(isset($guide->photo)):?>
				                                        <label for="edit_guide_photo" style="background-image: url('<?= base_url().$guide->photo;?>'); background-size: cover;
				                                            background-position: center;">
				                                        </label>
				                                        <?php else:?>
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
									<br>
									<hr>
									<br>
									<h3> <?=$label['guide_details']?></h3>
									<div class="row">
										<div class="col-lg-8">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['certificate_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="certificate_number" placeholder="<?=$label['certificate_number']?>" value="<?=$guide->certificate_number?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['chamber_name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="chamber" placeholder="<?=$label['chamber_name']?>" value="<?=$guide->chamber?>">
												</div>
											</div>
											<div class="m-form__group form-group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['work_range']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<div class="m-radio-list">
														<label class="m-radio m-radio--brand">
															<?php if($guide->work_range=="All Turkey"):?>
															<input type="radio" name="work_range" value="All Turkey" id="range_all_turkey" checked> All Turkey
															<?php else:?>
															<input type="radio" name="work_range" value="All Turkey" id="range_all_turkey"> All Turkey
															<?php endif;?>
															<span></span>
														</label>
														<label class="m-radio m-radio--brand">
															<?php if($guide->work_range=="All Turkey"):?>
															<input type="radio" name="work_range" value="Some Regions" id="range_some_regions"> Some Regions
															<?php else:?>
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
													if(isset($guide->regions)) 
														$regArray = json_decode($guide->regions);?>
													<?php if($guide->work_range=="All Turkey"):?>
													<select class="form-control m-select2" id="select_guide_regions" name="regions[]" multiple="multiple" disabled>
													<?php else:?>
													<select class="form-control m-select2" id="select_guide_regions" name="regions[]" multiple="multiple">
													<?php endif;?>
														<option></option>
														<?php
														if(isset($regions)):
															foreach($regions as $region):?>
																<?php if(isset($regArray) && array_search($region->region, $regArray)!==false):?>
																<option value="<?=$region->region?>" selected><?= $region->region;?></option>
																<?php else:?>
																	<option value="<?=$region->region?>"><?= $region->region;?></option>
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
													if(isset($guide->languages))
														$langArray = json_decode($guide->languages);
													?>
													<select class="form-control m-select2" id="select_guide_languages" name="languages[]" multiple="multiple">
														<option></option>
														<?php
														if(isset($languages)):
															foreach($languages as $language):?>
																<?php if(isset($langArray) && array_search($language->language, $langArray)!==false):?>
																<option value="<?=$language->language?>" selected><?= $language->language;?></option>
																<?php else:?>
																	<option value="<?=$language->language?>"><?= $language->language;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group m-form__group row">
						                        <div class="div-certificate-front">
						                          	<div class="wrap-custom-certificate-front">
						                              	<input type="file" name="certificate_front" id="edit_certificate_front" accept=".gif, .jpg, .png">
						                              	<?php if(isset($guide->certificate_front_picture)):?>
				                                        <label for="edit_certificate_front" style="background-image: url('<?= base_url().$guide->certificate_front_picture;?>'); background-size: cover;
				                                            background-position: center;">
				                                        </label>
				                                        <?php else:?>
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
						                          	<div class="wrap-custom-certificate-back">
						                              	<input type="file" name="certificate_back" id="edit_certificate_back" accept=".gif, .jpg, .png">
						                              	<?php if(isset($guide->certificate_back_picture)):?>
				                                        <label for="edit_certificate_back" style="background-image: url('<?= base_url().$guide->certificate_back_picture;?>'); background-size: cover;
				                                            background-position: center;">
				                                        </label>
				                                        <?php else:?>
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
									<div class="m-form__actions">
										<button type="submit" class="btn btn-primary"><?=$label['save']?></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>