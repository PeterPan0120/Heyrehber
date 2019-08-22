				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['add_editor']?><small><?=$label['you_can_add_new_editor_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-editors-add-editor m-form m-form--fit m-form--label-align-right">
									<div class="row">
										<div class="col-lg-7">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="name" placeholder="<?=$label['name']?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['sirname']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="sirname" placeholder="<?=$label['sirname']?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['supervisor']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_editor_supervisor" name="supervisor">
														<option></option>
														<?php if(isset($supervisors)):
															foreach($supervisors as $super):?>
																<option value="<?=$super->name." ".$super->sirname;?>"><?= $super->name." ".$super->sirname;?></option>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['department']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_editor_departments" name="department[]" multiple="multiple">
														<option></option>
														<?php if(isset($departments)):
															foreach($departments as $dep):?>
																<option value="<?=$dep->department?>"><?= $dep->department;?></option>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['phone_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="number" placeholder="<?=$label['phone_number']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="email" name="email" placeholder="<?=$label['email']?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['password']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="password" name="password" placeholder="<?=$label['password']?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['confirm_password']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="password" name="rpassword" placeholder="<?=$label['confirm_password']?>" required>
												</div>
											</div>
										</div>
										<div class="col-lg-5">
											<div class="form-group m-form__group row">
						                        <div class="div-editor-certificate">
						                          	<div class="wrap-custom-editor-certificate">
						                              	<input type="file" name="certificate" id="add_editor_certificate" accept=".gif, .jpg, .png">
						                              	<label for="add_editor_certificate">
						                                  	<span><?=$label['editor_certificate']?></span>
						                                  	<i class="fa fa-plus-circle"></i>
						                              	</label>
						                          	</div>
						                        </div>
						                    </div>
										</div>
									</div>
									<div class="m-form__actions">
										<button type="submit" class="btn btn-primary"> <?=$label['save']?></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>