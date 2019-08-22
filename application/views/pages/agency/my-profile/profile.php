				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head" style="background-color: #c9e0ff">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['personal_details']?>
										</h3>
									</div>
								</div>
								<div class="pull-right" style="margin: auto 0px;">
									<div class="m-form__actions">
										<a href="/agency/my_profile_edit_personal_profile" class="btn btn-primary"><?=$label['edit']?></a>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-agency-my-profile-personal-profile m-form m-form--fit m-form--label-align-right">
									<div class="row">
										<div class="col-lg-4" style="margin: auto 0px;">
											<div class="row">
						                        <div class="div-agency-photo">
						                        	<h4><?//=$label['photo']?></h4>
						                          	<div class="wrap-custom-agency-photo">
						                              	<?php if(isset($agency->photo)):?>
						                              	<img src="<?= base_url().$agency->photo;?>" style="width: 180px; height: 180px; object-fit: cover; border-radius: 20px;">
						                              	<?php endif;?>
						                          	</div>
						                        </div>
						                    </div>
										</div>
										<div class="col-lg-8" style="margin: auto 0px;">
											<div class="row">
												<div class="col-lg-6">
													<input type="hidden" name="id" value="<?=$agency->id;?>">
													<div class="row">
														<label class="col-form-label col-lg-4 col-sm-12"><b><?=$label['email']?>:</b></label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<input type="hidden" name="oldemail" value="<?=$agency->email;?>">
															<label class="col-form-label"><?=$agency->email;?></label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-4 col-sm-12"><b><?=$label['username']?>:</b></label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->username;?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-4 col-sm-12"><b><?=$label['full_name']?>:</b></label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->name." ".$agency->sirname;?></label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-4 col-sm-12"><b><?=$label['phone_number']?>:</b></label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->mobile;?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="row">
														<label class="col-form-label col-lg-2 col-sm-12"><b><?=$label['address']?>:</b></label>
														<div class="col-lg-10 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->address;?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-4 col-sm-12"><b><?=$label['district']?>:</b></label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<label class="col-form-label">
															<?php if(isset($districts)):
																foreach($districts as $district):
																	if($district->id == $agency->district):
																	 	echo $district->district;
																	endif;
																endforeach;
															endif;?>
															</label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-4 col-sm-12"><b><?=$label['city']?>:</b></label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<label class="col-form-label">
															<?php if(isset($cities)):
																foreach($cities as $city):
																	if($city->id == $agency->city):
																	 	echo $city->city;
																	endif;
																endforeach;
															endif;?>
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div> 
									
								</form>
							</div>
						</div>
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head" style="background-color: #f9d8d8">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['agency_details']?>
										</h3>
									</div>
								</div>
								<div class="pull-right" style="margin: auto 0px;">
									<div class="m-form__actions">
										<a href="/agency/my_profile_edit_agency_profile" class="btn btn-primary"><?=$label['edit']?></a>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-agency-my-profile-agency-profile m-form m-form--fit m-form--label-align-right">
									<div class="row">
										<div class="col-lg-4" style="margin: auto 0px;">
											<div class="row">
						                        <div class="div-agency-certificate">
						                        	<h4><?//=$label['agency_certificate']?></h4>
						                          	<div class="wrap-custom-agency-certificate">
						                              	<?php if(isset($agency->certificate)):?>
						                              	<img src="<?= base_url().$agency->certificate;?>" style="width: 180px; height: 180px; object-fit: cover; border-radius: 20px;">
						                              	<?php endif;?>
						                          	</div>
						                        </div>
						                    </div>
										</div>
										<div class="col-lg-8" style="margin: auto 0px;">
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['agency_name']?>:</b></label>
														<div class="col-lg-6 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->agency_name?></label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['certificate_number']?>:</b></label>
														<div class="col-lg-6 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->certificate_number?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['legal_company_name']?>:</b></label>
														<div class="col-lg-6 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->company_name?></label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['group']?>:</b></label>
														<div class="col-lg-6 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->group?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="row">
														<label class="col-form-label col-lg-3 col-sm-12"><b><?=$label['company_phone_number']?>:</b></label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->company_phone?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="row">
														<label class="col-form-label col-lg-3 col-sm-12"><b><?=$label['company_address']?>:</b></label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->company_address?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['district']?>:</b></label>
														<div class="col-lg-6 col-md-9 col-sm-12">
															<label class="col-form-label">
																<?php if(isset($districts)):
																	foreach($districts as $district):
																		if($district->id == $agency->company_district):
																			echo $district->district;
																		endif;
																	endforeach;
																endif;?>
															</select>
															</label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['city']?>:</b></label>
														<div class="col-lg-6 col-md-9 col-sm-12">
															<label class="col-form-label">
																<?php if(isset($cities)):
																	foreach($cities as $city):
																		if($city->id == $agency->company_city):
																			echo $city->city;
																		endif;
																	endforeach;
																endif;?>
															</select>
															</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['company_email']?>:</b></label>
														<div class="col-lg-6 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->company_email?></label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['company_web']?>:</b></label>
														<div class="col-lg-6 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->company_web?></label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head" style="background-color: #d8f9df">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['social_media_details']?>
										</h3>
									</div>
								</div>
								<div class="pull-right" style="margin: auto 0px;">
									<div class="m-form__actions">
										<a href="/agency/my_profile_edit_social_media_profile" class="btn btn-primary"><?=$label['edit']?></a>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-agency-my-profile-social-media-profile m-form m-form--fit m-form--label-align-right">
									<div class="row" style="padding: 0 100px">
										<div class="col-lg-4">
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['facebook']?>  <i class="socicon-facebook" style="font-size: 20px;"></i>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->facebook?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['instagram']?>  <i class="socicon-instagram" style="font-size: 20px;"></i>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->instagram?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['twitter']?>  <i class="socicon-twitter" style="font-size: 20px;"></i>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->twitter?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['linkedin']?>  <i class="socicon-linkedin" style="font-size: 20px;"></i>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->linkedin?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['google+']?>  <i class="socicon-googleplus" style="font-size: 20px;"></i>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->google?></label>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['youtube']?>  <i class="socicon-youtube" style="font-size: 20px;"></i>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->youtube?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['pinterest']?>  <i class="socicon-pinterest" style="font-size: 20px;"></i></label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->pinterest?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['tumblr']?>  <i class="socicon-tumblr" style="font-size: 20px;"></i>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->tumblr?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['flickr']?>  <i class="socicon-flickr" style="font-size: 20px;"></i>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->flickr?></label>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['snapchat']?>  <i class="socicon-snapchat" style="font-size: 20px;"></i>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->snapchat?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['whatsapp']?>  <i class="socicon-whatsapp" style="font-size: 20px;"></i>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->whatsapp?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['viber']?>  <i class="socicon-viber" style="font-size: 20px;"></i>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->viber?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['skype']?>  <i class="socicon-skype" style="font-size: 20px;"></i>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->skype?></label>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>