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
								<form class="form-events-event-details m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<input type="hidden" name="id" value="<?=$event->id;?>">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['title']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$event->title?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['select_guide']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label">
												<?php if(isset($guides)):
													foreach($guides as $guide):
														if($guide->id==$event->requester):
															echo $guide->username;
														endif;
													endforeach;
												endif;
												?>
											</label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['tour_type']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label">
												<?php if(isset($tour_types)):
													foreach($tour_types as $tour_type):
														if($tour_type->id==$event->tour_type):
															echo $tour_type->tour_type;
														endif;
													endforeach;
												endif;
												?>
											</label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['start_time']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$event->start_time?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['finish_time']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$event->finish_time?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['location']?>:</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$event->location?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-sm-12"><?=$label['description']?>:</label>
										<div class="col-lg-7 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$event->description?></label>
										</div>
									</div>									
									<div class="m-form__actions">
										<a href="/admin/events_edit_event?id=<?=$event->id;?>" class="btn btn-primary"> <?=$label['edit']?></a>
										<a href="/admin/events_events" class="btn btn-default"> <?=$label['cancel']?></a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>