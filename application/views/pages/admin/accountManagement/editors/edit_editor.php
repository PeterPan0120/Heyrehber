				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['edit_editor']?><small><?=$label['you_can_edit_this_editor_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-editors-edit-editor m-form m-form--fit m-form--label-align-right">
									<div class="row">
										<div class="col-lg-7">
											<div class="form-group m-form__group row">
												<input type="hidden" name="id" value="<?=$editor->id;?>">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['name']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="name" placeholder="<?=$label['name']?>" value="<?=$editor->name;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['sirname']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="sirname" placeholder="<?=$label['sirname']?>" value="<?=$editor->sirname;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['supervisor']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="select_editor_supervisor" name="supervisor">
														<option></option>
														<?php 
														if(isset($supervisors)):
															foreach($supervisors as $super):?>
																<?php if($super->name." ".$super->sirname == $editor->supervisor):?>
																<option value="<?=$super->name." ".$super->sirname;?>" selected><?= $super->name." ".$super->sirname;?></option>
																<?php else:?>
																<option value="<?=$super->name." ".$super->sirname;?>"><?= $super->name." ".$super->sirname;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['department']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<?php 
													if(isset($editor->department)) 
														$departs = json_decode($editor->department);
													?>
													<select class="form-control m-select2" id="select_editor_departments" name="department[]" multiple="multiple">
														<option></option>
														<?php 
														if(isset($departments)):
															foreach($departments as $dep):?>
																<?php if(isset($departs) && array_search($dep->department, $departs)!==false):?>
																<option value="<?=$dep->department?>" selected><?= $dep->department;?></option>
																<?php else:?>
																<option value="<?=$dep->department?>"><?= $dep->department;?></option>
																<?php endif;?>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['phone_number']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="text" name="number" value="<?=$editor->number;?>" placeholder="<?=$label['phone_number']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['email']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input type="hidden" name="oldemail" value="<?=$editor->email;?>">
													<input class="form-control m-input" type="email" name="email" placeholder="<?=$label['email']?>" value="<?=$editor->email;?>" required>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['password']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="password" name="password" placeholder="<?=$label['password']?>">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-4 col-sm-12"><?=$label['confirm_password']?></label>
												<div class="col-lg-8 col-md-9 col-sm-12">
													<input class="form-control m-input" type="password" name="rpassword" placeholder="<?=$label['confirm_password']?>">
												</div>
											</div>
										</div>
										<div class="col-lg-5">
											<div class="form-group m-form__group row">
						                        <div class="div-editor-certificate">
						                          	<div class="wrap-custom-editor-certificate">
						                              	<input type="file" name="certificate" id="edit_editor_certificate" accept=".gif, .jpg, .png">
						                              	<?php if(isset($editor->certificate)):?>
				                                        <label for="edit_editor_certificate" style="background-image: url('<?= base_url().$editor->certificate;?>'); background-size: cover;
				                                            background-position: center;">
				                                        </label>
				                                        <?php else:?>
						                              	<label for="edit_editor_certificate">
						                                  	<span><?=$label['editor_certificate']?></span>
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