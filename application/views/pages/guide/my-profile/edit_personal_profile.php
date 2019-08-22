				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['personal_details']?>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-guide-my-profile-personal-profile m-form m-form--fit m-form--label-align-right">
									<div class="row">
										<div class="col-lg-8">
											<input type="hidden" name="id" value="<?=$guide->id;?>">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input type="hidden" name="oldemail" value="<?=$guide->email;?>">
													<input class="form-control m-input" type="email" name="email" placeholder="<?=$label['email']?>"  value="<?=$guide->email;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="name" placeholder="<?=$label['name']?>" value="<?=$guide->name;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['sirname']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="sirname" placeholder="<?=$label['sirname']?>" value="<?=$guide->sirname;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['username']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="username" placeholder="<?=$label['username']?>" value="<?=$guide->username;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['phone_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="phone_number" placeholder="<?=$label['phone_number']?>" value="<?=$guide->phone_number;?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['address']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<textarea rows="3" class="form-control m-input" type="text" name="address" placeholder="<?=$label['address']?>"><?=$guide->address;?></textarea>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['district']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_guide_district" name="district">
														<option></option>
														<?php if(isset($districts)):
															foreach($districts as $district):?>
																<?php if($district->id == $guide->district):?>
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
													<select class="form-control m-select2" id="select_guide_city" name="city">
														<option></option>
														<?php if(isset($cities)):
															foreach($cities as $city):?>
																<?php if($guide->city == $city->id):?>
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
						                        <div class="div-guide-photo">
						                        	<h4><?=$label['guide_photo']?></h4>
						                          	<div class="wrap-custom-guide-photo">
						                              	<input type="file" name="photo" id="edit_guide_photo" accept=".gif, .jpg, .png">
						                              	<?php if(isset($guide->photo)):?>
				                                        <label class="file-ok" title="<?=substr($guide->photo, 20);?>" for="edit_guide_photo" style="background-image: url('<?= base_url().$guide->photo;?>'); background-size: cover;
				                                            background-position: center;">
				                                        </label>
				                                        <?php else:?>
						                              	<label for="edit_guide_photo">
						                                  	<span><?=$label['guide_photo']?></span>
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