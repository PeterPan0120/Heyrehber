				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<?php 
										$date = $event->event_date;
										$date = date_parse_from_format("Y-m-d", $date);
										$day = $date['day'];
										$month = $date['month'];
										$year = $date['year'];
										if($day == date('d') && $month == date('m')):?>
											<span style="font-size: 48px;color:red;font-weight: bold;">
												<?=$day?>
											</span>
											<span style="color:red;font-weight: bold;"><?="Today"?></span>
											<?php else:?>
											<span style="font-size: 48px;font-weight: bold;">
												<?=$day?>
											</span>
											<span style="font-weight: bold;">
												<?php
												$dateObj = DateTime::createFromFormat('!m', $month);
												$monthName = $dateObj->format('F');
												echo $monthName;
												?>
											</span>
										<?php endif;?>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-events-edit-event m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<input type="hidden" name="id" value="<?=$event->id;?>">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['title']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="title" placeholder="<?=$label['title']?>" value="<?=$event->title;?>"required>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['select_guide']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_event_guide" name="requester">
												<option></option>
												<?php
												if(isset($guides)):
													foreach($guides as $guide):?>
														<?php if($guide->id == $event->requester):?>
														<option value="<?=$guide->id?>" selected><?= $guide->name;?></option>
														<?php else:?>
														<option value="<?=$guide->id?>"><?= $guide->name;?></option>
														<?php endif;?>
													<?php endforeach;?>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['tour_type']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_event_tour_type" name="tour_type">
												<option></option>
												<?php
												if(isset($tour_types)):
													foreach($tour_types as $tour_type):?>
														<?php if($tour_type->id == $event->tour_type):?>
														<option value="<?=$tour_type->id?>" selected><?= $tour_type->tour_type;?></option>
														<?php else:?>
														<option value="<?=$tour_type->id?>"><?= $tour_type->tour_type;?></option>
														<?php endif;?>
													<?php endforeach;?>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['start_time']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="time" name="start_time" placeholder="<?=$label['start_time']?>" value="<?=$event->start_time;?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['finish_time']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="time" name="finish_time" placeholder="<?=$label['finish_time']?>" value="<?=$event->finish_time;?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['location']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="location" placeholder="<?=$label['location']?>" value="<?=$event->location;?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['description']?></label>
										<div class="col-lg-7 col-md-9 col-sm-12">
											<textarea class="form-control m-input" name="description" id="exampleTextarea" rows="5" placeholder="<?=$label['please_write_down_description_of_this_job']?>"><?=$event->description;?></textarea>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['activity_color']?></label>
										<div class="col-lg-7 col-md-9 col-sm-12">
											<div class="colorPickSelector">
												<input type="hidden" name="activity_color" value="<?=$event->activity_color;?>">
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