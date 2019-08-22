				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['my_profile']?><small><?=$label['this_is_my_profile']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-agency-my-profile m-form m-form--fit m-form--label-align-right">
									<h3> <?=$label['personal_details']?></h3>
									<div class="row">
										<div class="col-lg-8">
											<input type="hidden" name="id" value="<?=$agency->id;?>">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input type="hidden" name="oldemail" value="<?=$agency->email;?>">
													<input class="form-control m-input" type="email" name="email" placeholder="<?=$label['email']?>"  value="<?=$agency->email;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="name" placeholder="<?=$label['name']?>" value="<?=$agency->name;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['sirname']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="sirname" placeholder="<?=$label['sirname']?>" value="<?=$agency->sirname;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['username']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="username" placeholder="<?=$label['username']?>" value="<?=$agency->username;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['phone_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="mobile" placeholder="<?=$label['phone_number']?>" value="<?=$agency->mobile;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['address']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="address" placeholder="<?=$label['address']?>" value="<?=$agency->address;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['city']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_agency_city" name="city">
														<option></option>
														<?php if(isset($cities)):
															foreach($cities as $city):?>
																<?php if($agency->city == $city->city):?>
																<option value="<?=$city->city?>" selected><?= $city->city;?></option>
																<?php else:?>
																<option value="<?=$city->city?>"><?= $city->city;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['district']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_agency_district" name="district">
														<option></option>
														<?php if(isset($districts)):
															foreach($districts as $district):?>
																<?php if($district->district == $agency->district):?>
																<option value="<?=$district->district?>" selected><?= $district->district;?></option>
																<?php else:?>
																<option value="<?=$district->district?>"><?= $district->district;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<a class="pwd-change" href="#"><?=$label['change_password']?></a>
												</div>
											</div>
											<div class="change-password hide">
												<div class="form-group m-form__group row">
													<label class="col-form-label col-lg-4 col-sm-12"><?=$label['old_password']?></label>
													<div class="col-lg-8 col-md-9 col-sm-12">
														<input class="form-control m-input" type="password" name="old_password" placeholder="<?=$label['old_password']?>">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-form-label col-lg-4 col-sm-12"><?=$label['new_password']?></label>
													<div class="col-lg-8 col-md-9 col-sm-12">
														<input class="form-control m-input" type="password" name="password" placeholder="<?=$label['new_password']?>">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-form-label col-lg-4 col-sm-12"><?=$label['confirm_password']?></label>
													<div class="col-lg-8 col-md-9 col-sm-12">
														<input class="form-control m-input" type="password" name="rpassword" placeholder="<?=$label['confirm_password']?>">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group m-form__group row">
						                        <div class="div-agency-photo">
						                          	<div class="wrap-custom-agency-photo">
						                              	<input type="file" name="photo" id="edit_agency_photo" accept=".gif, .jpg, .png">
						                              	<?php if(isset($agency->photo)):?>
				                                        <label for="edit_agency_photo" style="background-image: url('<?= base_url().$agency->photo;?>'); background-size: cover;
				                                            background-position: center;">
				                                        </label>
				                                        <?php else:?>
						                              	<label for="edit_agency_photo">
						                                  	<span><?=$label['photo']?></span>
						                                  	<i class="fa fa-plus-circle"></i>
						                              	</label>
						                              	<?php endif;?>
						                          	</div>
						                        </div>
						                    </div>
										</div>
									</div>
									<br>
									<hr>
									<br>
									<h3> <?=$label['agency_details']?></h3>
									<div class="row">
										<div class="col-lg-8">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['agency_name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="agency_name" placeholder="<?=$label['agency_name']?>" value="<?=$agency->agency_name?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['certificate_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="certificate_number" placeholder="<?=$label['certificate_number']?>" value="<?=$agency->certificate_number?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['group']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_agency_group" name="group">
														<option></option>
														<?php if($agency->group=="A"):?>
														<option value="A" selected>A</option>
														<?php else:?>
														<option value="A">A</option>
														<?php endif;?>
														<?php if($agency->group=="B"):?>
														<option value="B" selected>B</option>
														<?php else:?>
														<option value="B">B</option>
														<?php endif;?>
														<?php if($agency->group=="C"):?>
														<option value="C" selected>C</option>
														<?php else:?>
														<option value="C">C</option>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['legal_company_name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="company_name" placeholder="<?=$label['legal_company_name']?>" value="<?=$agency->company_name;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['company_phone_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="company_phone" placeholder="<?=$label['company_phone_number']?>" value="<?=$agency->company_phone;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['company_address']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="company_address" placeholder="<?=$label['company_address']?>" value="<?=$agency->company_address;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['company_email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="email" name="company_email" placeholder="<?=$label['company_email']?>"  value="<?=$agency->company_email;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['company_web']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="company_web" placeholder="<?=$label['company_web']?>" value="<?=$agency->company_web;?>">
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group m-form__group row">
						                        <div class="div-agency-certificate">
						                          	<div class="wrap-custom-agency-certificate">
						                              	<input type="file" name="certificate" id="edit_agency_certificate" accept=".gif, .jpg, .png">
						                              	<?php if(isset($agency->certificate)):?>
				                                        <label for="edit_agency_certificate" style="background-image: url('<?= base_url().$agency->certificate;?>'); background-size: cover;
				                                            background-position: center;">
				                                        </label>
				                                        <?php else:?>
						                              	<label for="edit_agency_certificate">
						                                  	<span><?=$label['agency_certificate']?></span>
						                                  	<i class="fa fa-plus-circle"></i>
						                              	</label>
						                              	<?php endif;?>
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