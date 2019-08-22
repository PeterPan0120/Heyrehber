				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['edit_shop_suggestion']?><small><?=$label['you_can_edit_this_shop_suggestion_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-shops-edit-shop m-form m-form--fit m-form--label-align-right">
									<div class="row">
										<div class="col-lg-7">
											<input type="hidden" name="id" value="<?=$shop->id;?>">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="name" placeholder="<?=$label['name']?>" value="<?=$shop->name;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['category']?></label>
												<?php $category = json_decode($shop->category);
												?>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_shop_categories" name="category[]" multiple="multiple">
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
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['description']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<textarea class="form-control m-input" name="description" id="exampleTextarea" rows="5" placeholder="<?=$label['please_write_down_description_of_this_shop']?>"><?=$shop->description?></textarea>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['rating']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<div class="awesomeRating" style="font-size: 2.5em;"></div>
													<input type="hidden" name="rating" class="awesomeRatingValue" value="<?=$shop->rating;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['legal_name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="legal_name" placeholder="<?=$label['legal_name']?>" value="<?=$shop->legal_name;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['address']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="address" placeholder="<?=$label['address']?>" value="<?=$shop->address;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['district']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_shop_district" name="district">
														<option></option>
														<?php if(isset($districts)):
															foreach($districts as $district):?>
																<?php if($district->id == $shop->district):?>
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
													<select class="form-control m-select2" id="select_shop_city" name="city">
														<option></option>
														<?php if(isset($cities)):
															foreach($cities as $city):?>
																<?php if($city->id == $shop->city):?>
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
													<select class="form-control m-select2" id="select_shop_country" name="country">
														<option></option>
														<?php if(isset($countries)):
															foreach($countries as $country):?>
																<?php if($country->id==$shop->country):?>
																<option value="<?=$country->id?>" selected><?= $country->country;?></option>
																<?php else:?>
																<option value="<?=$country->id?>"><?= $country->country;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<input type="hidden" name="lat" value="<?=$shop->lat?>">
											<input type="hidden" name="lng" value="<?=$shop->lng?>">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['shop_phone_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="number" placeholder="<?=$label['shop_phone_number']?>" value="<?=$shop->number;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['shop_web']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="web" placeholder="<?=$label['shop_web']?>" value="<?=$shop->web;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['shop_email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input type="hidden" name="oldemail" value="<?=$shop->email;?>">
													<input class="form-control m-input" type="text" name="email" placeholder="<?=$label['shop_email']?>" value="<?=$shop->email;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['contact_person']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="contact_person" placeholder="<?=$label['contact_person']?>" value="<?=$shop->contact_person;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['contact_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="contact_number" placeholder="<?=$label['contact_number']?>" value="<?=$shop->contact_number;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['contact_email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="email" name="contact_email" placeholder="<?=$label['contact_email']?>" value="<?=$shop->contact_email;?>">
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