				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['edit_museum']?><small><?=$label['you_can_edit_this_museum_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-museums-edit-museum-suggestion m-form m-form--fit m-form--label-align-right">
									<div class="row">
										<div class="col-lg-8">
											<div class="form-group m-form__group row">
												<input type="hidden" name="id" value="<?=$museum->id;?>">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="name" placeholder="<?=$label['name']?>" value="<?=$museum->name;?>"required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['description']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<textarea class="form-control m-input" name="description" id="exampleTextarea" rows="5" placeholder="<?=$label['please_write_down_description_of_this_museum']?>..."><?=$museum->description;?></textarea>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['category']?></label>
												<?php $category = json_decode($museum->category);
												?>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_museum_categories" name="category[]" multiple="multiple">
														<option></option>
														<?php
														if(isset($categories)):								foreach($categories as $cate):?>
																<?php if(array_search($cate->category, $category)!==false && isset($category)):?>
																<option value="<?=$cate->category?>" selected><?= $cate->category;?></option>
																<?php else:?>
																<option value="<?=$cate->category?>"><?= $cate->category;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['summer_time']?></label>
												<div class="col-lg-4 col-md-9 col-sm-12">
													<input class="form-control m-input" name="summer_start_time" type="time" id="summer_start_time" value="<?=$museum->summer_start_time;?>">
												</div>
												~
												<div class="col-lg-4 col-md-9 col-sm-12">
													<input class="form-control m-input" type="time" name="summer_end_time" id="summer_end_time" value="<?=$museum->summer_end_time;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['winter_time']?></label>
												<div class="col-lg-4 col-md-9 col-sm-12">
													<input class="form-control m-input" type="time" name="winter_start_time" value="<?=$museum->winter_start_time;?>">
												</div>
												~
												<div class="col-lg-4 col-md-9 col-sm-12">
													<input class="form-control m-input" type="time" name="winter_end_time" value="<?=$museum->winter_end_time;?>">
												</div>
											</div>
											
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['rest_day_in_summer']?></label>
												<?php 
												if(isset($museum->summer_rest_days))
													$summer_days = json_decode($museum->summer_rest_days);?>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="m-checkbox m-checkbox--solid m-checkbox--success">
														<?php if(isset($summer_days) && array_search('Monday', $summer_days)!==false):?>
														<input type="checkbox" name="summer_rest_days[]" value="Monday" checked><?=$label['monday']?>
														<?php else:?>
														<input type="checkbox" name="summer_rest_days[]" value="Monday"><?=$label['monday']?>
														<?php endif;?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<?php if(isset($summer_days) && array_search('Tuesday', $summer_days)!==false):?>
														<input type="checkbox" name="summer_rest_days[]" value="Tuesday" checked><?=$label['tuesday']?>
														<?php else:?>
														<input type="checkbox" name="summer_rest_days[]" value="Tuesday"><?=$label['tuesday']?>
														<?php endif;?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<?php if(isset($summer_days) && array_search('Wednesday', $summer_days)!==false):?>
														<input type="checkbox" name="summer_rest_days[]" value="Wednesday" checked><?=$label['wednesday']?>
														<?php else:?>
														<input type="checkbox" name="summer_rest_days[]" value="Wednesday"><?=$label['wednesday']?>
														<?php endif;?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<?php if(isset($summer_days) && array_search('Thursday', $summer_days)!==false):?>
														<input type="checkbox" name="summer_rest_days[]" value="Thursday" checked><?=$label['thursday']?>
														<?php else:?>
														<input type="checkbox" name="summer_rest_days[]" value="Thursday"><?=$label['thursday']?>
														<?php endif;?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<?php if(isset($summer_days) && array_search('Friday', $summer_days)!==false):?>
														<input type="checkbox" name="summer_rest_days[]" value="Friday" checked><?=$label['friday']?>
														<?php else:?>
														<input type="checkbox" name="summer_rest_days[]" value="Friday"><?=$label['friday']?>
														<?php endif;?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<?php if(isset($summer_days) && array_search('Saturday', $summer_days)!==false):?>
														<input type="checkbox" name="summer_rest_days[]" value="Saturday" checked><?=$label['saturday']?>
														<?php else:?>
														<input type="checkbox" name="summer_rest_days[]" value="Saturday"><?=$label['saturday']?>
														<?php endif;?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<?php if(isset($summer_days) && array_search('Sunday', $summer_days)!==false):?>
														<input type="checkbox" name="summer_rest_days[]" value="Sunday" checked><?=$label['sunday']?>
														<?php else:?>
														<input type="checkbox" name="summer_rest_days[]" value="Sunday"><?=$label['sunday']?>
														<?php endif;?>
														<span></span>
													</label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['rest_day_in_winter']?></label>
												<?php
												if(isset($museum->winter_rest_days)) 
													$winter_days = json_decode($museum->winter_rest_days);?>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="m-checkbox m-checkbox--solid m-checkbox--success">
														<?php if(isset($winter_days) && array_search('Monday', $winter_days)!==false):?>
														<input type="checkbox" name="winter_rest_days[]" value="Monday" checked><?=$label['monday']?>
														<?php else:?>
														<input type="checkbox" name="winter_rest_days[]" value="Monday"><?=$label['monday']?>
														<?php endif;?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<?php if(isset($winter_days) && array_search('Tuesday', $winter_days)!==false):?>
														<input type="checkbox" name="winter_rest_days[]" value="Tuesday" checked><?=$label['tuesday']?>
														<?php else:?>
														<input type="checkbox" name="winter_rest_days[]" value="Tuesday"><?=$label['tuesday']?>
														<?php endif;?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<?php if(isset($winter_days) && array_search('Wednesday', $winter_days)!==false):?>
														<input type="checkbox" name="winter_rest_days[]" value="Wednesday" checked><?=$label['wednesday']?>
														<?php else:?>
														<input type="checkbox" name="winter_rest_days[]" value="Wednesday"><?=$label['wednesday']?>
														<?php endif;?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<?php if(isset($winter_days) && array_search('Thursday', $winter_days)!==false):?>
														<input type="checkbox" name="winter_rest_days[]" value="Thursday" checked><?=$label['thursday']?>
														<?php else:?>
														<input type="checkbox" name="winter_rest_days[]" value="Thursday"><?=$label['thursday']?>
														<?php endif;?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<?php if(isset($winter_days) && array_search('Friday', $winter_days)!==false):?>
														<input type="checkbox" name="winter_rest_days[]" value="Friday" checked><?=$label['friday']?>
														<?php else:?>
														<input type="checkbox" name="winter_rest_days[]" value="Friday"><?=$label['friday']?>
														<?php endif;?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<?php if(isset($winter_days) && array_search('Saturday', $winter_days)!==false):?>
														<input type="checkbox" name="winter_rest_days[]" value="Saturday" checked><?=$label['saturday']?>
														<?php else:?>
														<input type="checkbox" name="winter_rest_days[]" value="Saturday"><?=$label['saturday']?>
														<?php endif;?>
														<span></span>
													</label>
													<label class="m-checkbox m-checkbox--solid m-checkbox--success" style="margin-left: 10px;">
														<?php if(isset($winter_days) && array_search('Sunday', $winter_days)!==false):?>
														<input type="checkbox" name="winter_rest_days[]" value="Sunday" checked><?=$label['sunday']?>
														<?php else:?>
														<input type="checkbox" name="winter_rest_days[]" value="Sunday"><?=$label['sunday']?>
														<?php endif;?>
														<span></span>
													</label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['entrance_price']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="entrance_price" placeholder="<?=$label['entrance_price']?>" value="<?=$museum->entrance_price;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['address']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="address" placeholder="<?=$label['address']?>" value="<?=$museum->address;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['district']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_museum_district" name="district">
														<option></option>
														<?php if(isset($districts)):
															foreach($districts as $district):?>
																<?php if($district->id == $museum->district):?>
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
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['city']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_museum_city" name="city">
														<option></option>
														<?php if(isset($cities)):
															foreach($cities as $city):?>
																<?php if($city->id == $museum->city):?>
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
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['country']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_museum_country" name="country">
														<option></option>
														<?php if(isset($countries)):
															foreach($countries as $country):?>
																<?php if($country->id == $museum->country):?>
																<option value="<?=$country->id?>" selected><?= $country->country;?></option>
																<?php else:?>
																<option value="<?=$country->id?>"><?= $country->country;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<input type="hidden" name="lat" value="<?=$museum->lat?>">
											<input type="hidden" name="lng" value="<?=$museum->lng?>">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['museum_web']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="web" placeholder="<?=$label['museum_web']?>" value="<?=$museum->web;?>">
												</div>

											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['museum_email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input type="hidden" name="oldemail" value="<?=$museum->email;?>">
													<input class="form-control m-input" type="text" name="email" placeholder="<?=$label['museum_email']?>" value="<?=$museum->email;?>"required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['museum_phone_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="number" placeholder="<?=$label['museum_phone_number']?>" value="<?=$museum->number;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['contact_person']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="contact_person" placeholder="<?=$label['contact_person']?>" value="<?=$museum->contact_person;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['contact_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="contact_number" placeholder="<?=$label['contact_number']?>" value="<?=$museum->contact_number;?>">
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
									<div class="m-form__actions">
										<button type="submit" class="btn btn-primary"><?=$label['save']?></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>