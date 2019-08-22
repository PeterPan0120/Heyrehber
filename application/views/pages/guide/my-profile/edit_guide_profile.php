				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['guide_details']?>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-guide-my-profile-guide-profile m-form m-form--fit m-form--label-align-right">
									<div class="row">
										<div class="col-lg-8">
											<input type="hidden" name="id" value="<?=$guide->id;?>">
											<input type="hidden" name="oldemail" value="<?=$guide->email;?>">
											<input type="hidden" name="username" value="<?=$guide->username;?>">
											<input type="hidden" name="email" value="<?=$guide->email;?>">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['certificate_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="certificate_number" placeholder="<?=$label['certificate_number']?>" value="<?=$guide->certificate_number?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['chamber_name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_guide_chamber" name="chamber">
														<option></option>
														<?php
if (isset($chambers)):
    foreach ($chambers as $chamber): ?>
																			<?php if ($guide->chamber == $chamber->id): ?>
																			<option value="<?=$chamber->id?>" selected><?=$chamber->chamber;?></option>
																			<?php else: ?>
																<option value="<?=$chamber->id?>"><?=$chamber->chamber;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="m-form__group form-group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['work_range']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<div class="m-radio-list">
														<label class="m-radio m-radio--brand">
															<?php if ($guide->work_range == "All Turkey"): ?>
															<input type="radio" name="work_range" value="All Turkey" id="range_all_turkey" checked> All Turkey
															<?php else: ?>
															<input type="radio" name="work_range" value="All Turkey" id="range_all_turkey"> All Turkey
															<?php endif;?>
															<span></span>
														</label>
														<label class="m-radio m-radio--brand">
															<?php if ($guide->work_range == "All Turkey"): ?>
															<input type="radio" name="work_range" value="Some Regions" id="range_some_regions"> Some Regions
															<?php else: ?>
															<input type="radio" name="work_range" value="Some Regions" id="range_some_regions" checked> Some Regions
															<?php endif;?>
															<span></span>
														</label>
													</div>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['region']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<?php
if (isset($guide->regions)) {
    $regArray = json_decode($guide->regions);
}
?>
													<?php if ($guide->work_range == "All Turkey"): ?>
													<select class="form-control m-select2" id="select_guide_regions" name="regions[]" multiple="multiple" disabled>
													<?php else: ?>
													<select class="form-control m-select2" id="select_guide_regions" name="regions[]" multiple="multiple">
													<?php endif;?>
														<option></option>
														<?php
if (isset($regions)):
    foreach ($regions as $region): ?>
																			<?php if (isset($regArray) && array_search($region->region, $regArray) !== false): ?>
																			<option value="<?=$region->region?>" selected><?=$region->region;?></option>
																			<?php else: ?>
																	<option value="<?=$region->region?>"><?=$region->region;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['languages']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<?php
if (isset($guide->languages)) {
    $langArray = json_decode($guide->languages);
}

?>
													<select class="form-control m-select2" id="select_guide_languages" name="languages[]" multiple="multiple">
														<option></option>
														<?php
if (isset($languages)):
    foreach ($languages as $language): ?>
																			<?php if (isset($langArray) && array_search($language->language, $langArray) !== false): ?>
																			<option value="<?=$language->language?>" selected><?=$language->language;?></option>
																			<?php else: ?>
																	<option value="<?=$language->language?>"><?=$language->language;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['specialisties']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_guide_specialisties" name="specialisties">
														<option></option>
														<?php
if (isset($specialisties)):
    foreach ($specialisties as $spec): ?>
																			<?php if ($guide->specialisties == $spec->id): ?>
																			<option value="<?=$spec->id?>" selected><?=$spec->specialisties;?></option>
																			<?php else: ?>
																<option value="<?=$spec->id?>"><?=$spec->specialisties;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group m-form__group row">
						                        <div class="div-certificate">
						                        	<h4><?=$label['certificate']?></h4>
						                          	<div class="wrap-custom-certificate">
						                              	<input type="file" name="certificate" id="edit_certificate" accept=".gif, .jpg, .png">
						                              	<?php if (isset($guide->certificate)): ?>
				                                        <label title="<?=substr($guide->certificate, 26);?>" class="file-ok" for="edit_certificate" style="background-image: url('<?=base_url() . $guide->certificate;?>'); background-size: cover;
				                                            background-position: center;">
<!-- 				                                            <span><?=substr($guide->certificate, 26);?></span> -->
				                                        </label>
				                                        <?php else: ?>
						                              	<label for="edit_certificate">
						                                  	<span><?=$label['certificate']?></span>
						                                  	<i class="fa fa-plus-circle"></i>
						                              	</label>
						                              	<?php endif;?>
						                          </div>
						                        </div>
						                    </div>
											<div class="form-group m-form__group row">
						                        <div class="div-certificate-front">
						                        	<h4><?=$label['certificate_front']?></h4>
						                          	<div class="wrap-custom-certificate-front">
						                              	<input type="file" name="certificate_front" id="edit_certificate_front" accept=".gif, .jpg, .png">
						                              	<?php if (isset($guide->certificate_front_picture)): ?>
				                                        <label title="<?=substr($guide->certificate_front_picture, 23);?>" class="file-ok" for="edit_certificate_front" style="background-image: url('<?=base_url() . $guide->certificate_front_picture;?>'); background-size: cover;
				                                            background-position: center;"><!--
				                                            <span><?=substr($guide->certificate_front_picture, 23);?></span> -->
				                                        </label>
				                                        <?php else: ?>
						                              	<label for="edit_certificate_front">
						                                  	<span><?=$label['certificate_front']?></span>
						                                  	<i class="fa fa-plus-circle"></i>
						                              	</label>
						                              	<?php endif;?>
						                          </div>
						                        </div>
						                    </div>
						                    <div class="form-group m-form__group row">
						                        <div class="div-certificate-back">
						                        	<h4><?=$label['certificate_back']?></h4>
						                          	<div class="wrap-custom-certificate-back">
						                              	<input type="file" name="certificate_back" id="edit_certificate_back" accept=".gif, .jpg, .png">
						                              	<?php if (isset($guide->certificate_back_picture)): ?>
				                                        <label title="<?=substr($guide->certificate_back_picture, 22)?>" class="file-ok" for="edit_certificate_back" style="background-image: url('<?=base_url() . $guide->certificate_back_picture;?>'); background-size: cover;
				                                            background-position: center;"><!--
				                                            <span><?=substr($guide->certificate_back_picture, 22)?></span> -->
				                                        </label>
				                                        <?php else: ?>
						                              	<label for="edit_certificate_back">
						                                  	<span><?=$label['certificate_back']?></span>
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