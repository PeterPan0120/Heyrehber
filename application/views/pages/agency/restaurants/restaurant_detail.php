				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['details_of_restaurant']?><small><?=$label['you_can_see_details_of_this_restaurant_here']?></small>
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
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['name']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label" id="restaurant_name"><?=$restaurant->name?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['category']?>:</label>
												
												<div class="col-lg-8 col-md-9 col-sm-12">
												<?php
												if(isset($restaurant->category) && $restaurant->category!=""):
													$category = json_decode($restaurant->category);
													foreach ($category as $cate):?>
														<label class="col-form-label"><?=$cate?></label>
														<br>
													<?php endforeach;?>
												<?php endif;?>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['description']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$restaurant->description?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['rating']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<?php $result="";
							                        for($i=0; $i<$restaurant->rating; $i++):?>
							                            <i class='flaticon-star' style='font-size: 25px;color: #FDD05B;'></i>
							                        <?php endfor;?>
							                        <?php 
							                        for($i=0; $i<5-$restaurant->rating; $i++):?>
							                            <i class='flaticon-star' style='font-size: 25px;color: #d0d0d0;'></i>
							                        <?php endfor;?>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['legal_name']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$restaurant->legal_name?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['address']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label" id="restaurant_address"><?=$restaurant->address?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['district']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label" id="restaurant_district">
													<?php if(isset($districts)):
													foreach($districts as $district):?>
														<?php if($district->id == $restaurant->district):?>
															<?=$district->district;?>
														<?php endif;?>
													<?php endforeach;?>
													<?php endif;?>
													</label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['city']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label" id="restaurant_city">
													<?php if(isset($cities)):
													foreach($cities as $city):?>
														<?php if($city->id == $restaurant->city):?>
															<?=$city->city;?>
														<?php endif;?>
													<?php endforeach;?>
													<?php endif;?>
													</label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['country']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label" id="restaurant_country">
													<?php if(isset($countries)):
													foreach($countries as $country):?>
														<?php if($country->id == $restaurant->country):?>
															<?=$country->country;?>
														<?php endif;?>
													<?php endforeach;?>
													<?php endif;?>
													</label>
												</div>
											</div>

											<input type="hidden" name="lat" value="<?=$restaurant->lat?>">
											<input type="hidden" name="lng" value="<?=$restaurant->lng?>">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['restaurant_phone_number']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$restaurant->number?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['restaurant_web']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$restaurant->web?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['restaurant_email']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input type="hidden" name="oldemail" value="<?=$restaurant->email;?>">
													<label class="col-form-label"><?=$restaurant->email?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['contact_person']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$restaurant->contact_person?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['contact_number']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$restaurant->contact_number?></label>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['contact_email']?>:</label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<label class="col-form-label"><?=$restaurant->contact_email?></label>
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
										<a href="/agency/restaurants_restaurants" class="btn btn-default"><?=$label['cancel']?></a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>