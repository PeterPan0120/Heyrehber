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
								<form class="form-museums-edit-museum m-form m-form--fit m-form--label-align-right">
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
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12"><?=$label['active']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<span class="m-switch m-switch--outline m-switch--icon m-switch--success">
														<label>
															<?php if($museum->status=="active"):?>
															<input type="checkbox" name="status" value="active" checked>
															<?php else:?>
															<input type="checkbox" name="status" value="active">
															<?php endif;?>
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
		                                        		<?php foreach($images as $image):?>
				                                        <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete dz-preview-<?=array_search($image, $images)?>">
				                                            <div class="dz-image">
				                                                <img data-dz-thumbnail alt="<?=$image->path;?>" src="<?=base_url().$image->path;?>" style="object-fit: cover; width: 100%; height: 100%">
				                                            </div>
				                                            <div class="dz-details">
				                                                <div class="dz-size">
				                                                </div>
				                                                <div class="dz-filename">
				                                                    <span data-dz-name><?=str_replace("uploads/museum/", "", $image->path);?></span>
				                                                </div>
				                                            </div>
				                                            <div class="dz-progress">
				                                                <span class="dz-upload" data-dz-uploadprogress></span>
				                                            </div>
				                                            <div class="dz-error-message">
				                                                <span data-dz-errormessage></span>
				                                            </div>
				                                            <div class="dz-success-mark">  
				                                                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">    
				                                                    <title>Check</title>    
				                                                    <defs></defs>    
				                                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">      
				                                                        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup">
				                                                        </path>    
				                                                    </g>  
				                                                </svg>
				                                            </div>
				                                            <div class="dz-error-mark">  
				                                                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">    
				                                                    <title>Error</title>    
				                                                    <defs></defs>    
				                                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">      
				                                                        <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">        
				                                                            <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup">
				                                                            </path>      
				                                                        </g>    
				                                                    </g>  
				                                                </svg>
				                                            </div>
				                                            <a class="dz-remove" href="javascript:undefined;" data-dz-remove>Remove file</a>
				                                        </div>
				                                        <?php endforeach;?>
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