				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['details_of_guide_request']?><small><?=$label['you_can_see_details_of_this_guide_request_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-guide-requests-guide-request-detail m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<input type="hidden" name="id" value="<?=$guide_request->id;?>">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['title']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$guide_request->title?></label>
										</div>
									</div>
									<div class="m-form__group form-group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['range']?>:</label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<?php if($guide_request->range=="Domestic"):?>
											<label class="col-form-label"><?=$label['domestic']?></label>
											<?php elseif($guide_request->range=="Overseas"):?>
											<label class="col-form-label"><?=$label['overseas']?></label>
											<?php endif;?>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['regions']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<?php 
											if(isset($guide_request->regions) && $guide_request->regions!=""):
												$regionArray = json_decode($guide_request->regions);
												foreach ($regionArray as $region):?>
													<label class="col-form-label"><?=$region?></label>
													<br>
												<?php endforeach;?>
											<?php endif;?>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['route']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$guide_request->route?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['tour_type']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label">
												<?php if(isset($tour_types)):
													foreach($tour_types as $tour_type):?>
														<?php 
														if($tour_type->id == $guide_request->tour_type):
															echo $tour_type->tour_type;
														?>
														<?php endif;?>
													<?php endforeach;?>
												<?php endif;?>
											</label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['guest_nationality']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$guide_request->guest_nationality?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['requested_language']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$guide_request->requested_language?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['how_many_guides?']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$guide_request->guide_number?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['how_many_guests?']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$guide_request->guest_number?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['start_date']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$guide_request->start_date?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['finish_date']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$guide_request->finish_date?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['start_location']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$guide_request->start_location?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['finish_location']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$guide_request->finish_location?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['description']?>:</label>
										<div class="col-lg-7 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$guide_request->description?></label>
										</div>
									</div>
									<div class="m-form__actions">
										<a href="/agency/guide_requests_edit_guide_request?id=<?=$guide_request->id;?>" class="btn btn-primary"> <?=$label['edit']?></a>
										<a href="/agency/guide_requests_my_guide_requests" class="btn btn-default"> <?=$label['cancel']?></a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>