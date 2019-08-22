				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['agency_details']?>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-agency-my-profile-agency-profile m-form m-form--fit m-form--label-align-right">
									<div class="row">
										<div class="col-lg-8">
											<input type="hidden" name="id" value="<?=$agency->id;?>">
											<input type="hidden" name="oldemail" value="<?=$agency->email;?>">
											<input type="hidden" name="username" value="<?=$agency->username;?>">
											<input type="hidden" name="email" value="<?=$agency->email;?>">
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
													<textarea rows="3" class="form-control m-input" name="company_address" placeholder="<?=$label['company_address']?>"><?=$agency->company_address;?></textarea>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['district']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_agency_company_district" name="company_district">
														<option></option>
														<?php if(isset($districts)):
															foreach($districts as $district):?>
																<?php if($district->id == $agency->company_district):?>
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
													<select class="form-control m-select2" id="select_agency_company_city" name="company_city">
														<option></option>
														<?php if(isset($cities)):
															foreach($cities as $city):?>
																<?php if($agency->company_city == $city->id):?>
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
						                        	<h4><?=$label['agency_certificate']?></h4>
						                          	<div class="wrap-custom-agency-certificate">
						                              	<input type="file" name="certificate" id="edit_agency_certificate" accept=".gif, .jpg, .png">
						                              	<?php if(isset($agency->certificate)):?>
				                                        <label title="<?=substr($agency->certificate, 27)?>" class="file-ok" for="edit_agency_certificate" style="background-image: url('<?= base_url().$agency->certificate;?>'); background-size: cover;
				                                            background-position: center;"><!-- 
				                                            <span><?=substr($agency->certificate, 27)?></span> -->
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