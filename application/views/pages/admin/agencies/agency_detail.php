				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['details_of_agency']?><small><?=$label['you_can_see_details_of_this_agency_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-agencies-edit-agency m-form m-form--fit m-form--label-align-right">
									<h3><?=$label['personal_details']?></h3>
									<div class="row">
										<div class="col-lg-4" style="margin: auto 0px;">
											<div class="row">
						                        <div class="div-agency-photo">
						                        	<h4><?//=$label['agency_photo']?></h4>
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
														<input type="hidden" name="oldemail" value="<?=$agency->email;?>">
														<div class="col-lg-8 col-md-9 col-sm-12">
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
																	foreach($districts as $district):?>
																		<?php if($agency->district == $district->id):?>
																			<?= $district->district;?></option>
																		<?php endif;?>
																	<?php endforeach;?>
																<?php endif;?>
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
																	foreach($cities as $city):?>
																		<?php if($agency->city == $city->id):?>
																			<?= $city->city;?></option>
																		<?php endif;?>
																	<?php endforeach;?>
																<?php endif;?>
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<br><hr><br>
									<h3><?=$label['company_details']?></h3>
									<div class="row">
										<div class="col-lg-4" style="margin: auto 0px;">
											<div class="row">
						                        <div class="div-agency-certificate">
						                        	<h4 ><?//=$label['agency_certificate']?></h4>
						                        	<?php if(isset($agency->certificate) && substr($agency->certificate, -3)=="jpg" || substr($agency->certificate, -3)=="png" || substr($agency->certificate, -3)=="gif" || substr($agency->certificate, -3)=="bmp"):?>
						                          	<div class="wrap-custom-agency-certificate">
						                              	<img src="<?= base_url().$agency->certificate;?>" style="width: 180px; height: 180px; object-fit: cover; border-radius: 20px;">
						                          	</div>
						                            <?php else: 
						                            	echo "<a href='/".$agency->certificate."'>".substr($agency->certificate, 27)."</a>";
						                            ?>
						                            <?php endif;?>
						                        </div>
						                    </div>
										</div>
										<div class="col-lg-8" style="margin: auto 0px;">
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['agency_name']?>:</b></label>
														<div class="col-lg-6 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->agency_name;?></label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['certificate_number']?>:</b></label>
														<div class="col-lg-6 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->certificate_number;?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['legal_company_name']?>:</b></label>
														<div class="col-lg-6 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->company_name;?></label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['group']?>:</b></label>
														<div class="col-lg-6 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->group;?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="row">
														<label class="col-form-label col-lg-3 col-sm-12"><b><?=$label['company_address']?>:</b></label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->company_address;?></label>
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
																	foreach($districts as $district):?>
																		<?php if($agency->company_district == $district->id):?>
																			<?= $district->district;?></option>
																		<?php endif;?>
																	<?php endforeach;?>
																<?php endif;?>
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
																	foreach($cities as $city):?>
																		<?php if($agency->company_city == $city->id):?>
																			<?= $city->city;?></option>
																		<?php endif;?>
																	<?php endforeach;?>
																<?php endif;?>
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
															<label class="col-form-label"><?=$agency->company_email;?></label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['company_phone_number']?>:</b></label>
														<div class="col-lg-6 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->company_phone;?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="row">
														<label class="col-form-label col-lg-3 col-sm-12"><b><?=$label['company_web']?>:</b></label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->company_web;?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="row">
														<label class="col-form-label col-lg-3 col-sm-12"><b><?=$label['created_date']?>:</b></label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<label class="col-form-label"><?=$agency->created_date;?></label>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="row">
														<label class="col-form-label col-lg-3 col-sm-12"><b><?=$label['active']?>:</b></label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<label class="col-form-label">
															<?php
															if($agency->status=="active") echo $label['active'];
															else echo $label['deactive'];
															?>
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<br><hr><br>
									<h3><?=$label['social_media_details']?></h3>
									<div class="row" style="padding: 0px 100px;">
										<div class="col-lg-4">
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['facebook']?>  <i class="socicon-facebook" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->facebook;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['instagram']?>  <i class="socicon-instagram" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->instagram;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['twitter']?>  <i class="socicon-twitter" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->twitter;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['linkedin']?>  <i class="socicon-linkedin" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->linkedin;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['google+']?>  <i class="socicon-googleplus" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->google;?></label>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['youtube']?>  <i class="socicon-youtube" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->youtube;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['pinterest']?>  <i class="socicon-pinterest" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->pinterest;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['tumblr']?>  <i class="socicon-tumblr" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->tumblr;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['flickr']?>  <i class="socicon-flickr" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->flickr;?></label>
												</div>
											</div>
										</div>
										<div class="col-lg-4">

											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['snapchat']?>  <i class="socicon-snapchat" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->snapchat;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['whatsapp']?>  <i class="socicon-whatsapp" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->whatsapp;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['viber']?>  <i class="socicon-viber" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->viber;?></label>
												</div>
											</div>
											<div class="row">
												<label class="col-form-label col-lg-6 col-sm-12"><?=$label['skype']?>  <i class="socicon-skype" style="font-size: 20px;"></i>     :</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$agency->skype;?></label>
												</div>
											</div>
										</div>
									</div>
									<div class="m-form__actions">
										<a href="/admin/agencies_edit_agency?id=<?=$agency->id?>" class="btn btn-primary"><?=$label['edit']?></a>
										<a href="/admin/agencies_agencies" class="btn btn-default"><?=$label['cancel']?></a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>