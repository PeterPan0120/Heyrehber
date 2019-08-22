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
										<a href="/guide/my_profile_edit_personal_profile" class="btn btn-primary"><?=$label['edit']?></a>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-guide-my-profile-personal-profile m-form m-form--fit m-form--label-align-right">
									<div class="row">
										<div class="col-lg-4" style="margin: auto 0px">
											<div class="form-group m-form__group row">
						                        <div class="div-guide-photo">
						                        	<h4><?//=$label['guide_photo']?></h4>
						                          	<div class="wrap-custom-guide-photo">
						                              	<?php if (isset($guide->photo)): ?>
						                              	<img src="<?=base_url() . $guide->photo;?>" style="width: 180px; height: 180px; object-fit: cover; border-radius: 20px;">
						                              	<?php endif;?>
						                          	</div>
						                        </div>
						                    </div>
										</div>
										<div class="col-lg-8" style="margin: auto 0px;">
											<div class="row">
												<div class="col-lg-6">
													<input type="hidden" name="id" value="<?=$guide->id;?>">
													<div class="row">
														<label class="col-form-label col-lg-4 col-sm-12"><b><?=$label['email']?>:</b></label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<input type="hidden" name="oldemail" value="<?=$guide->email;?>">
															<label class="col-form-label"><?=$guide->email?></label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-4 col-sm-12"><b><?=$label['username']?>:</b></label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$guide->username?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-4 col-sm-12"><b><?=$label['full_name']?>:</b></label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$guide->name . " " . $guide->sirname?></label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-4 col-sm-12"><b><?=$label['phone_number']?>:</b></label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$guide->phone_number?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="row">
														<label class="col-form-label col-lg-2 col-sm-12"><b><?=$label['address']?>:</b></label>
														<div class="col-lg-10 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$guide->address?></label>
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
																<?php if (isset($districts)):
    foreach ($districts as $district):
        if ($district->id == $guide->district):
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
																<?php if (isset($cities)):
    foreach ($cities as $city):
        if ($city->id == $guide->city):
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
											<?=$label['guide_details']?>
										</h3>
									</div>
								</div>
								<div class="pull-right" style="margin: auto 0px;">
									<div class="m-form__actions">
										<a href="/guide/my_profile_edit_guide_profile" class="btn btn-primary"><?=$label['edit']?></a>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-guide-my-profile-guide-profile m-form m-form--fit m-form--label-align-right">
									<div class="row">
										<div class="col-lg-6" style="margin: auto 0px;">
											<div class="row">
						                        <div class="div-certificate">
						                        	<h4><?=$label['certificate']?></h4>
						                          	<div class="wrap-custom-certificate">
						                              	<?php if (isset($guide->certificate)): ?>
						                              	<img src="<?=base_url() . $guide->certificate;?>" style="width: 180px; height: 180px; object-fit: cover; border-radius: 20px;">
						                              	<?php endif;?>
						                          	</div>
						                        </div>
						                    </div>
											<div class="row">
												<div class="col-lg-6">
							                        <div class="div-certificate-front">
							                        	<h4><?=$label['certificate_front']?></h4>
							                          	<div class="wrap-custom-certificate-front">
							                              	<?php if (isset($guide->certificate_front_picture)): ?>
							                              	<img src="<?=base_url() . $guide->certificate_front_picture;?>" style="width: 150px; height: 150px; object-fit: cover; border-radius: 20px;">
							                              	<?php endif;?>
							                          </div>
							                        </div>
							                    </div>
							                    <div class="col-lg-6">
							                        <div class="div-certificate-back">
							                        	<h4><?=$label['certificate_back']?></h4>
							                          	<div class="wrap-custom-certificate-back">
							                              	<?php if (isset($guide->certificate_back_picture)): ?>
							                              	<img src="<?=base_url() . $guide->certificate_back_picture;?>" style="width: 150px; height: 150px; object-fit: cover; border-radius: 20px;">
							                              	<?php endif;?>
							                          	</div>
							                        </div>
							                    </div>
						                    </div>
										</div>
										<div class="col-lg-6" style="margin: auto 0;">
											<div class="row">
												<label class="col-form-label col-lg-4 col-sm-12"><b><?=$label['certificate_number']?>:</b></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->certificate_number?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-4 col-sm-12"><b><?=$label['chamber_name']?>:</b></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label">
													<?php
if (isset($chambers)):
    foreach ($chambers as $chamber): ?>
																<?php if ($chamber->id == $guide->chamber): ?>
																	<?=$chamber->chamber;?>
																<?php endif;?>
														<?php endforeach;?>
													<?php endif;?>
													</label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-4 col-sm-12"><b><?=$label['region']?>:</b></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
												<?php
if ($guide->work_range == "Some Regions"):
    if (isset($guide->regions) && $guide->regions != ""):
        $regArray = json_decode($guide->regions);
        foreach ($regArray as $reg): ?>
																		<label class="col-form-label"><?=$reg?></label>
																		<br>
														<?php	endforeach;
endif;
elseif ($guide->work_range == "All Turkey"): ?>
														<label class="col-form-label"><?=$label['all_turkey']?></label>
												<?php
endif;
?>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-4 col-sm-12"><b><?=$label['languages']?>:</b></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<?php
if (isset($guide->languages)):
    $langArray = json_decode($guide->languages);
    foreach ($langArray as $lan): ?>
																<label><?=$lan?></label>
																<br>
															<?php endforeach;?>
													<?php endif;?>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-4 col-sm-12"><b><?=$label['specialisties']?>:</b></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label">
													<?php
if (isset($specialisties)):
    foreach ($specialisties as $spec): ?>
																<?php if ($spec->id == $guide->specialisties): ?>
																	<?=$spec->specialisties?>
																<?php endif;?>
														<?php endforeach;?>
													<?php endif;?>
													</label>
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
										<a href="/guide/my_profile_edit_social_media_profile" class="btn btn-primary"><?=$label['edit']?></a>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-guide-my-profile-social-media-profile m-form m-form--fit m-form--label-align-right">
									<div class="row" style="padding: 0px 100px">
										<div class="col-lg-4">
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['facebook']?>  <i class="socicon-facebook" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->facebook;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['instagram']?>  <i class="socicon-instagram" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->instagram;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['twitter']?>  <i class="socicon-twitter" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->twitter;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['linkedin']?>  <i class="socicon-linkedin" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->linkedin;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['google+']?>  <i class="socicon-googleplus" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->google;?></label>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['youtube']?>  <i class="socicon-youtube" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->youtube;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['pinterest']?>  <i class="socicon-pinterest" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->pinterest;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['tumblr']?>  <i class="socicon-tumblr" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->tumblr;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['flickr']?>  <i class="socicon-flickr" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->flickr;?></label>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['snapchat']?>  <i class="socicon-snapchat" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->snapchat;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['whatsapp']?>  <i class="socicon-whatsapp" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->whatsapp;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['viber']?>  <i class="socicon-viber" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->viber;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['skype']?>  <i class="socicon-skype" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->skype;?></label>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>