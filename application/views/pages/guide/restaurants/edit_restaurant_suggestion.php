				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['edit_restaurant_suggestion']?><small><?=$label['you_can_edit_this_restaurant_suggestion_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-restaurants-edit-restaurant m-form m-form--fit m-form--label-align-right">
									<div class="row">
										<div class="col-lg-7">
											<input type="hidden" name="id" value="<?=$restaurant->id;?>">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="name" placeholder="<?=$label['name']?>" value="<?=$restaurant->name;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['category']?></label>
												<?php
												if(isset($restaurant->category)) 
													$category = json_decode($restaurant->category);
												?>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_restaurant_categories" name="category[]" multiple="multiple">
														<option></option>
														<?php
														if(isset($categories)):								foreach($categories as $cate):?>
																<?php if(isset($category) && array_search($cate->category, $category)!==false && isset($category)):?>
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
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['description']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<textarea class="form-control m-input" name="description" id="exampleTextarea" rows="5" placeholder="<?=$label['please_write_down_description_of_this_restaurant']?>"><?=$restaurant->description?></textarea>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['rating']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<div class="awesomeRating" style="font-size: 2.5em;"></div>
													<input type="hidden" name="rating" class="awesomeRatingValue" value="<?=$restaurant->rating;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['legal_name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="legal_name" placeholder="<?=$label['legal_name']?>" value="<?=$restaurant->legal_name;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['address']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="address" placeholder="<?=$label['address']?>" value="<?=$restaurant->address;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['district']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_restaurant_district" name="district">
														<option></option>
														<?php if(isset($districts)):
															foreach($districts as $district):?>
																<?php if($district->id == $restaurant->district):?>
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
													<select class="form-control m-select2" id="select_restaurant_city" name="city">
														<option></option>
														<?php if(isset($cities)):
															foreach($cities as $city):?>
																<?php if($city->id == $restaurant->city):?>
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
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['country']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_restaurant_country" name="country">
														<option></option>
														<?php if(isset($countries)):
															foreach($countries as $country):?>
																<?php if($country->id==$restaurant->country):?>
																<option value="<?=$country->id?>" selected><?= $country->country;?></option>
																<?php else:?>
																<option value="<?=$country->id?>"><?= $country->country;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<input type="hidden" name="lat" value="<?=$restaurant->lat?>">
											<input type="hidden" name="lng" value="<?=$restaurant->lng?>">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['restaurant_phone_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="number" placeholder="<?=$label['restaurant_phone_number']?>" value="<?=$restaurant->number;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['restaurant_web']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="web" placeholder="<?=$label['restaurant_web']?>" value="<?=$restaurant->web;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['restaurant_email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input type="hidden" name="oldemail" value="<?=$restaurant->email;?>">
													<input class="form-control m-input" type="text" name="email" placeholder="<?=$label['restaurant_email']?>" value="<?=$restaurant->email;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['contact_person']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="contact_person" placeholder="<?=$label['contact_person']?>" value="<?=$restaurant->contact_person;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['contact_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="contact_number" placeholder="<?=$label['contact_number']?>" value="<?=$restaurant->contact_number;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['contact_email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="email" name="contact_email" placeholder="<?=$label['contact_email']?>" value="<?=$restaurant->contact_email;?>">
												</div>
											</div>
										</div>
										<div class="col-lg-5">
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