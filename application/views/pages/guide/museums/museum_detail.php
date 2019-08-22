				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['details_of_museum']?><small><?=$label['you_can_see_details_of_this_museum_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-museums-museum-details m-form m-form--fit m-form--label-align-right">
									<div class="row">
										<div class="col-lg-8">
											<div class="form-group m-form__group row">
												<input type="hidden" name="id" value="<?=$museum->id;?>">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['name']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label" id="museum_name"><?=$museum->name?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['description']?>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$museum->description?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['category']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<?php 
													if(isset($museum->category) && $museum->category!=""):
														$category = json_decode($museum->category);
														foreach ($category as $cat):?>
															<label class="col-form-label"><?=$cat?></label>
															<br>
														<?php endforeach;?>
													<?php endif;?>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['summer_time']?>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$museum->summer_start_time?></label>
												~
													<label class="col-form-label"><?=$museum->summer_end_time?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['winter_time']?>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$museum->winter_start_time?></label>
												~
													<label class="col-form-label"><?=$museum->winter_end_time?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12">
													<?=$label['rest_day_in_summer']?>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<?php 
													if(isset($museum->summer_rest_days)):
														$summer_days = json_decode($museum->summer_rest_days);
														foreach ($summer_days as $day):?>
															<label class="col-form-label"><?=$day?></label>
															<br>
														<?php endforeach;?>
													<?php endif;?>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['rest_day_in_winter']?>:</label>
												<div class="col-lg-6 col-md-9 col-sm-12">
													<?php 
													if(isset($museum->winter_rest_days)):
														$winter_days = json_decode($museum->winter_rest_days);
														foreach ($winter_days as $day):?>
															<label class="col-form-label"><?=$day?></label>
															<br>
														<?php endforeach;?>
													<?php endif;?>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['entrance_price']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$museum->entrance_price?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['address']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label" id="museum_address"><?=$museum->address?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['district']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label" id="museum_district">
														<?php if(isset($districts)):?>
															<?php foreach($districts as $district):?>
																<?php 
																if($district->id == $museum->district):
																	echo $district->district;
																endif;
																?>
															<?php endforeach;?>
														<?php endif;?>
													</label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['city']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label" id="museum_city">
														<?php if(isset($cities)):?>
															<?php foreach($cities as $city):?>
																<?php 
																if($city->id == $museum->city):
																	echo $city->city;
																endif;
																?>
															<?php endforeach;?>
														<?php endif;?>
													</label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['country']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label" id="museum_country">
														<?php if(isset($countries)):?>
															<?php foreach($countries as $country):?>
																<?php 
																if($country->id == $museum->country):
																	echo $country->country;
																endif;
																?>
															<?php endforeach;?>
														<?php endif;?>
													</label>
												</div>
											</div>
											<input type="hidden" name="lat" value="<?=$museum->lat?>">
											<input type="hidden" name="lng" value="<?=$museum->lng?>">
											
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['museum_web']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$museum->web?></label>
												</div>

											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['museum_email']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input type="hidden" name="oldemail" value="<?=$museum->email;?>">
													<label class="col-form-label"><?=$museum->email?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['museum_phone_number']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$museum->number?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['contact_person']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$museum->contact_person?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['contact_number']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$museum->contact_number?></label>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group m-form__group row">
						                    	<!-- using Google maps library
												<?//=$map['js']?>
												<?//=$map['html']?> -->
												<div id="map-canvas" style="width: 100%; height: 500px">
												</div>
						                    </div>
										</div>
									</div>
									<?php if(isset($images) && $images!=null):?>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-2 col-sm-12"><?=$label['images']?>:</label>
												<div class="col-lg-9 col-md-9 col-sm-12">
													<?php foreach($images as $image):?>
														<a href="<?=base_url().$image->path;?>">
															<img src="<?=base_url().$image->path?>" style="width: 150px; height: 150px; object-fit: cover; border-radius: 20px;">
														</a>
													<?php endforeach;?>
												</div>
											</div>
										</div>
									</div>
									<?php endif;?>
									<div class="m-form__actions">
										<a href="/guide/museums_museums" class="btn btn-default"><?=$label['cancel']?></a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>