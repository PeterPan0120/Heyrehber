				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['add_agency']?><small><?=$label['you_can_add_new_agency_here']?>  </small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-agencies-add-agency m-form m-form--fit m-form--label-align-right">
									<h3><?=$label['personal_details'];?></h3>
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
													<input class="form-control m-input" type="text" name="sirname" placeholder="<?=$label['sirname']?>" required>
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
													<input class="form-control m-input" type="text" name="mobile" placeholder="<?=$label['phone_number']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['address']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<textarea rows="3" class="form-control m-input" name="address" placeholder="<?=$label['address']?>"></textarea>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['district']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_agency_user_district" name="district">
														<option></option>
														<?php if(isset($districts)):
															foreach($districts as $district):?>
																<option value="<?=$district->id?>"><?= $district->district;?></option>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['city']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_agency_user_city" name="city">
														<option></option>
														<?php if(isset($cities)):
															foreach($cities as $city):?>
																<option value="<?=$city->id?>"><?= $city->city;?></option>
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
						                        <div class="div-agency-photo">
						                          	<div class="wrap-custom-agency-photo">
						                              	<input type="file" name="photo" id="add_agency_photo" accept="*">
						                              	<label for="add_agency_photo">
						                                  	<span><?=$label['agency_photo']?></span>
						                                  	<i class="fa fa-plus-circle"></i>
						                              	</label>
						                          	</div>
						                        </div>
						                    </div>
										</div>
									</div>
									<br><hr><br>
									<h3><?=$label['company_details'];?></h3>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['agency_name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="agency_name" placeholder="<?=$label['agency_name']?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['certificate_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="certificate_number" placeholder="<?=$label['certificate_number']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['group']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_agency_group" name="group">
														<option></option>
														<option value="A">A</option>
														<option value="B">B</option>
														<option value="C">C</option>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['legal_company_name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="company_name" placeholder="<?=$label['legal_company_name']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['company_address']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<textarea rows="3" class="form-control m-input" name="company_address" placeholder="<?=$label['company_address']?>"></textarea>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['district']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_agency_company_district" name="company_district">
														<option></option>
														<?php if(isset($districts)):
															foreach($districts as $district):?>
																<option value="<?=$district->id?>"><?= $district->district;?></option>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['city']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_agency_company_city" name="company_city">
														<option></option>
														<?php if(isset($cities)):
															foreach($cities as $city):?>
																<option value="<?=$city->id?>"><?= $city->city;?></option>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['company_phone_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="company_phone" placeholder="<?=$label['company_phone_number']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['company_web']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="company_web" placeholder="<?=$label['company_web']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['company_email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="email" name="company_email" placeholder="<?=$label['company_email']?>" required>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group m-form__group row">
						                        <div class="div-agency-certificate">
						                          	<div class="wrap-custom-agency-certificate">
						                              	<input type="file" name="certificate" id="add_agency_certificate" accept="*">
						                              	<label for="add_agency_certificate">
						                                  	<span><?=$label['agency_certificate']?></span>
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