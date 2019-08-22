				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['edit_agency']?><small><?=$label['you_can_edit_this_agency_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-agencies-edit-agency m-form m-form--fit m-form--label-align-right">
									<h3><?=$label['personal_details']?></h3>
									<div class="row">
										<div class="col-lg-8">
											<input type="hidden" name="id" value="<?=$agency->id;?>">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input type="hidden" name="oldemail" value="<?=$agency->email;?>">
													<input class="form-control m-input" type="email" name="email" placeholder="<?=$label['email']?>"  value="<?=$agency->email;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="name" placeholder="<?=$label['name']?>" value="<?=$agency->name;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['sirname']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="sirname" placeholder="<?=$label['sirname']?>" value="<?=$agency->sirname;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['username']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="username" placeholder="<?=$label['username']?>" value="<?=$agency->username;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['phone_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="mobile" placeholder="<?=$label['phone_number']?>" value="<?=$agency->mobile;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['address']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<textarea rows="3" class="form-control m-input" name="address" placeholder="<?=$label['address']?>"><?=$agency->address;?></textarea>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['district']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_agency_user_district" name="district">
														<option></option>
														<?php if(isset($districts)):
															foreach($districts as $district):?>
																<?php if($district->id == $agency->district):?>
																<option value="<?=$district->id?>" selected><?= $district->district;?></option>
																<?php else:?>
																<option value="<?=$district->id?>"><?= $district->district;?></option>
																<?php endif;?>
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
																<?php if($agency->city == $city->id):?>
																<option value="<?=$city->id?>" selected><?= $city->city;?></option>
																<?php else:?>
																<option value="<?=$city->id?>"><?= $city->city;?></option>
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
						                        <div class="div-agency-photo">
						                        	<h4><?=$label['agency_photo']?></h4>
						                          	<div class="wrap-custom-agency-photo">
						                              	<input type="file" name="photo" id="edit_agency_photo" accept=".gif, .jpg, .png">
						                              	<?php if(isset($agency->photo)):?>
				                                        <label class="file-ok" for="edit_agency_photo" style="background-image: url('<?= base_url().$agency->photo;?>'); background-size: cover;
				                                            background-position: center;"><!-- 
						                                  	<span><?=substr($agency->photo, 21)?></span> -->
				                                        </label>
				                                        <?php else:?>
						                              	<label for="edit_agency_photo">
						                                  	<span><?=$label['agency_photo']?></span>
						                                  	<i class="fa fa-plus-circle"></i>
						                              	</label>
						                              	<?php endif;?>
						                          	</div>
						                        </div>
						                    </div>
										</div>
									</div>
									<br><hr><br>
									<h3><?=$label['company_details']?></h3>
									<div class="row">
										<div class="col-lg-8">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['agency_name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="agency_name" placeholder="<?=$label['agency_name']?>" value="<?=$agency->agency_name;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['certificate_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="certificate_number" placeholder="<?=$label['certificate_number']?>" value="<?=$agency->certificate_number?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['group']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_agency_group" name="group">
														<option></option>
														<?php if($agency->group=="A"):?>
														<option value="A" selected>A</option>
														<?php else:?>
														<option value="A">A</option>
														<?php endif;?>
														<?php if($agency->group=="B"):?>
														<option value="B" selected>B</option>
														<?php else:?>
														<option value="B">B</option>
														<?php endif;?>
														<?php if($agency->group=="C"):?>
														<option value="C" selected>C</option>
														<?php else:?>
														<option value="C">C</option>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['legal_company_name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="company_name" placeholder="<?=$label['legal_company_name']?>" value="<?=$agency->company_name;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['company_address']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<textarea rows="3" class="form-control m-input" name="company_address" placeholder="<?=$label['company_address']?>"><?=$agency->company_address;?></textarea>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['district']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_agency_company_district" name="company_district">
														<option></option>
														<?php if(isset($districts)):
															foreach($districts as $district):?>
																<?php if($district->id == $agency->company_district):?>
																<option value="<?=$district->id?>" selected><?= $district->district;?></option>
																<?php else:?>
																<option value="<?=$district->id?>"><?= $district->district;?></option>
																<?php endif;?>
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
																<?php if($agency->company_city == $city->id):?>
																<option value="<?=$city->id?>" selected><?= $city->city;?></option>
																<?php else:?>
																<option value="<?=$city->id?>"><?= $city->city;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['company_phone_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="company_phone" placeholder="<?=$label['company_phone_number']?>" value="<?=$agency->company_phone;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['company_web']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="company_web" placeholder="<?=$label['company_web']?>" value="<?=$agency->company_web;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['company_email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="email" name="company_email" placeholder="<?=$label['company_email']?>" value="<?=$agency->company_email;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['active']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<span class="m-switch m-switch--outline m-switch--icon m-switch--success">
														<label>
															<?php if($agency->status=="active"):?>
															<input type="checkbox" name="status" value="active" checked>
															<?php else:?>
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
						                        <div class="div-agency-certificate">
						                        	<h4><?=$label['agency_certificate']?></h4>
						                          	<div class="wrap-custom-agency-certificate">
						                              	<input type="file" name="certificate" id="edit_agency_certificate" accept=".gif, .jpg, .png">
						                              	<?php if(isset($agency->certificate)):?>
				                                        <label class="file-ok" for="edit_agency_certificate" style="background-image: url('<?= base_url().$agency->certificate;?>'); background-size: cover;
				                                            background-position: center;"><!-- 
						                                  	<span><?=substr($agency->certificate, 27)?></span> -->
				                                        </label>
				                                        <?php else:?>
						                              	<label for="edit_agency_certificate">
						                                  	<span><?=$label['agency_certificate']?></span>
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
													<input class="form-control m-input" type="text" name="facebook" placeholder="<?=$label['facebook']?>" value="<?=$agency->facebook;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['instagram']?>  <i class="socicon-instagram" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="instagram" placeholder="<?=$label['instagram']?>" value="<?=$agency->instagram;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['twitter']?>  <i class="socicon-twitter" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="twitter" placeholder="<?=$label['twitter']?>" value="<?=$agency->twitter;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['linkedin']?>  <i class="socicon-linkedin" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="linkedin" placeholder="<?=$label['linkedin']?>" value="<?=$agency->linkedin;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['google+']?>  <i class="socicon-googleplus" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="google" placeholder="<?=$label['google+']?>" value="<?=$agency->google;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['youtube']?>  <i class="socicon-youtube" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="youtube" placeholder="<?=$label['youtube']?>" value="<?=$agency->youtube;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['pinterest']?>  <i class="socicon-pinterest" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="pinterest" placeholder="<?=$label['pinterest']?>" value="<?=$agency->pinterest;?>">
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['tumblr']?>  <i class="socicon-tumblr" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="tumblr" placeholder="<?=$label['tumblr']?>" value="<?=$agency->tumblr;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['flickr']?>  <i class="socicon-flickr" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="flickr" placeholder="<?=$label['flickr']?>" value="<?=$agency->flickr;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['snapchat']?>  <i class="socicon-snapchat" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="snapchat" placeholder="<?=$label['snapchat']?>" value="<?=$agency->snapchat;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['whatsapp']?>  <i class="socicon-whatsapp" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="whatsapp" placeholder="<?=$label['whatsapp']?>" value="<?=$agency->whatsapp;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['viber']?>  <i class="socicon-viber" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="viber" placeholder="<?=$label['viber']?>" value="<?=$agency->viber;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['skype']?>  <i class="socicon-skype" style="font-size: 20px;"></i></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="skype" placeholder="<?=$label['skype']?>" value="<?=$agency->skype;?>">
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