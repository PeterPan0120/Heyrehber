				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['details_of_guide']?><small><?=$label['you_can_see_details_of_this_guide_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-guides-edit-guide m-form m-form--fit m-form--label-align-right">
									<h3><?=$label['personal_details']?></h3>
									<div class="row">
										<div class="col-lg-4" style="margin: auto 0px;">
											<div class="row">
						                        <div class="div-photo">
						                        	<h4 ><?//=$label['guide_photo']?></h4>
						                          	<div class="wrap-custom-guide-photo">
						                          		<?php if (isset($guide->photo)): ?>
						                              	<img src="<?=base_url() . $guide->photo;?>" style="width: 180px; height: 180px; border-radius: 20px; object-fit: cover;">
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
														<label class="col-form-label col-lg-4 col-sm-12"><?=$label['email']?>:</label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<input type="hidden" name="oldemail" value="<?=$guide->email;?>">
															<label class="col-form-label"><?=$guide->email?></label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-4 col-sm-12"><?=$label['username']?>:</label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$guide->username?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-4 col-sm-12"><?=$label['full_name']?>:</label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$guide->name . " " . $guide->sirname?></label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-4 col-sm-12"><?=$label['phone_number']?>:</label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$guide->phone_number?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="row">
														<label class="col-form-label col-lg-2 col-sm-12"><?=$label['address']?>:</label>
														<div class="col-lg-10 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$guide->address?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-4 col-sm-12"><?=$label['district']?>:</label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<label class="col-form-label">
															<?php
if (isset($districts)):
    foreach ($districts as $district):
        if ($district->id == $guide->district) {
            echo $district->district;
        }

    endforeach;
endif;
?>
															</label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-4 col-sm-12"><?=$label['city']?>:</label>
														<div class="col-lg-8 col-md-9 col-sm-12">
															<label class="col-form-label">
															<?php
if (isset($cities)):
    foreach ($cities as $city):
        if ($city->id == $guide->city) {
            echo $city->city;
        }

    endforeach;
endif;
?>
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<br><hr><br>
									<h3><?=$label['guide_details']?></h3>
									<div class="row">
										<div class="col-lg-6" style="margin: auto 0px;">
						                    <div class="row">
						                        <div class="div-certificate">
						                        	<h4 ><?=$label['certificate'];?></h4>
						                          	<div class="wrap-custom-certificate">
				                                        <img src="<?=base_url() . $guide->certificate;?>" style=" width: 180px; height: 180px; border-radius: 20px; object-fit: cover">
						                          	</div>
						                        </div>
						                    </div>
						                    <div class="row">
						                    	<div class="col-lg-6">
							                        <div class="div-certificate-front">
							                        	<h4 ><?=$label['certificate_front']?></h4>
							                          	<div class="wrap-custom-certificate-front">
							                              	<?php if (isset($guide->certificate_front_picture)): ?>
					                                        <img src="<?=base_url() . $guide->certificate_front_picture;?>" style=" width: 150px; height: 150px; border-radius: 20px; object-fit: cover">
					                                       	<?php endif;?>
							                          </div>
							                        </div>
							                    </div>
							                    <div class="col-lg-6">
							                        <div class="div-certificate-back">
							                        	<h4 ><?=$label['certificate_back']?></h4>
							                          	<div class="wrap-custom-certificate-back">
							                              	<?php if (isset($guide->certificate_back_picture)): ?>
					                                        <img src="<?=base_url() . $guide->certificate_back_picture;?>" style=" width: 150px; height: 150px; border-radius: 20px; object-fit: cover">
					                                       	<?php endif;?>
							                          	</div>
							                        </div>
							                    </div>
							                </div>
										</div>
										<div class="col-lg-6" style="margin: auto 0px;">
											<div class="row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['certificate_number']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->certificate_number?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['chamber_name']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label">
														<?php
if (isset($chambers)):
    foreach ($chambers as $chamber): ?>
																				<?php if ($guide->chamber == $chamber->id): ?>
																					<?=$chamber->chamber;?>
																				<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['region']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
												<?php
if ($guide->work_range == "Some Regions"):
    if (isset($guide->regions) && $guide->regions != ""):
        $regArray = json_decode($guide->regions);
        foreach ($regArray as $reg): ?>
																								<label class="col-form-label"><?=$reg?></label>
																								<br>
																							<?php endforeach;
endif;
elseif ($guide->work_range == "All Turkey"): ?>
														<label class="col-form-label"><?=$label['all_turkey']?></label>
												<?php
endif;
?>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['languages']?>:</label>
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
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['specialisties']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label">
														<?php
if (isset($specialisties)):
    foreach ($specialisties as $spec): ?>
																				<?php if ($guide->specialisties == $spec->id): ?>
																					<?=$spec->specialisties;?>
																				<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['points']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->points?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['created_date']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$guide->created_date;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['active']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label">
													<?php
if ($guide->status == "active") {
    echo $label['active'];
} else {
    echo $label['deactive'];
}

?>
													</label>
												</div>
											</div>
										</div>
									</div>
									<br><hr><br>
									<h3><?=$label['social_media_details']?></h3>
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
									<div class="m-form__actions">
										<a href="/agency/guides_guide_search"class="btn btn-default"><?=$label['cancel']?></a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>