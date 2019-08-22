				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['add_museum']?><small><?=$label['you_can_add_new_museum_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-museums-add-museum m-form m-form--fit m-form--label-align-right">
									<div class="row">
										<div class="col-lg-8">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="name" placeholder="<?=$label['name']?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['description']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<textarea class="form-control m-input" name="description" id="exampleTextarea" rows="5" placeholder="<?=$label['please_write_down_description_of_this_museum']?>..."></textarea>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['category']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_museum_categories" name="category[]" multiple="multiple">
														<option></option>
														<?php
														if(isset($categories)):
															foreach($categories as $cate):?>
																<option value="<?=$cate->category?>"><?= $cate->category;?></option>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['summer_time']?></label>
												<div class="col-lg-4 col-md-9 col-sm-12">
													<input class="form-control m-input" name="summer_start_time" type="time" id="summer_start_time">
												</div>
												~
												<div class="col-lg-4 col-md-9 col-sm-12">
													<input class="form-control m-input" type="time" name="summer_end_time" id="summer_end_time">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['winter_time']?></label>
												<div class="col-lg-4 col-md-9 col-sm-12">
													<input class="form-control m-input" type="time" name="winter_start_time" id="summer_start_time">
												</div>
												~
												<div class="col-lg-4 col-md-9 col-sm-12">
													<input class="form-control m-input" type="time" name="winter_end_time" id="summer_end_time">
												</div>
											</div>
											
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['rest_day_in_summer']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="m-checkbox m-checkbox--solid m-checkbox--success">
														<input type="checkbox" name="summer_rest_days[]" value="Monday"><?=$label['monday']?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<input type="checkbox" name="summer_rest_days[]"value="Tuesday"><?=$label['tuesday']?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<input type="checkbox" name="summer_rest_days[]"value="Wednesday"><?=$label['wednesday']?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<input type="checkbox" name="summer_rest_days[]"value="Thursday"><?=$label['thursday']?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<input type="checkbox" name="summer_rest_days[]"value="Friday"><?=$label['friday']?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<input type="checkbox" name="summer_rest_days[]"value="Saturday"><?=$label['saturday']?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<input type="checkbox" name="summer_rest_days[]"value="Sunday"><?=$label['sunday']?>
														<span></span>
													</label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['rest_day_in_winter']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="m-checkbox m-checkbox--solid m-checkbox--success">
														<input type="checkbox" name="winter_rest_days[]" value="Monday"><?=$label['monday']?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<input type="checkbox" name="winter_rest_days[]" value="Tuesday"><?=$label['tuesday']?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<input type="checkbox" name="winter_rest_days[]" value="Wednesday"><?=$label['wednesday']?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<input type="checkbox" name="winter_rest_days[]" value="Thursday"><?=$label['thursday']?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<input type="checkbox" name="winter_rest_days[]" value="Friday"><?=$label['friday']?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<input type="checkbox" name="winter_rest_days[]" value="Saturday"><?=$label['saturday']?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<input type="checkbox" name="winter_rest_days[]" value="Sunday"><?=$label['sunday']?>
														<span></span>
													</label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['entrance_price']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="entrance_price" placeholder="<?=$label['entrance_price']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['address']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="address" placeholder="<?=$label['address']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['district']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_museum_district" name="district">
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
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['city']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_museum_city" name="city">
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
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['country']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_museum_country" name="country">
														<option></option>
														<?php if(isset($countries)):
															foreach($countries as $country):?>
																<option value="<?=$country->id?>"><?= $country->country;?></option>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<input type="hidden" name="lat">
											<input type="hidden" name="lng">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['museum_web']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="web" placeholder="<?=$label['museum_web']?>">
												</div>

											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['museum_email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="email" placeholder="<?=$label['museum_email']?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['museum_phone_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="number" placeholder="<?=$label['museum_phone_number']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['contact_person']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="contact_person" placeholder="<?=$label['contact_person']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['contact_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="contact_number" placeholder="<?=$label['contact_number']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['active']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<span class="m-switch m-switch--outline m-switch--icon m-switch--success">
														<label>
															<input type="checkbox" name="status" value="active">
															<input type="checkbox" name="status" value="deactive">
															<span></span>
														</label>
													</span>
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
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-2 col-sm-12"><?=$label['images']?></label>
												<div class="col-lg-9 col-md-9 col-sm-12">
													<div action="/admin/upload_museum_images" method="post" name="images[]" class="dropzone" id="museum_dropzone" enctype="multipart/form-data">
		                                        	<!-- <input type="file" name="file" multiple/> -->
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