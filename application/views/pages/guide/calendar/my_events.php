				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="row">
							<div class="col-lg-12">
								<!--begin::Portlet-->
								<div class="m-portlet" id="m_portlet">
									<div class="m-portlet__head row">
										<div class="m-portlet__head-caption col-lg-10">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon">
													<i class="flaticon-calendar-2"></i>
												</span>
												<h3 class="m-portlet__head-text">
													<?=$label['calendar_management']?>
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools col-lg-2">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item">
													<a href="/guide/calendar_add_event" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
														<span>
															<i class="la la-plus"></i>
															<span><?=$label['add_event']?></span>
														</span>
													</a>
												</li>
											</ul>
										</div>
									</div>

									<div class="m-portlet__body">
										<div class="tab-content">
											<div class="tab-pane active" id="m_widget2_tab1_content">
												<!--Begin::Timeline 3 -->
												<div class="m-timeline-3">
													<div class="m-timeline-3__items" style="padding: 0px 50px">
														<?php if(isset($result)):?>
															<?php for($i=0; $i<count($result); $i++):
																$events = $result[$i];
																if(count($events)!=0):?>
																<div class="row">
																	<?php 
																	$date = date('Y-m-d', strtotime($min_date." + ".$i." days"));
																	$date = date_parse_from_format("Y-m-d", $date);
																	$day = $date['day'];
																	$month = $date['month'];
																	$year = $date['year'];
																	$weekday = getdate(strtotime($year.'-'.$month.'-'.$day))['weekday'];
																	?>
																	<div class="col-lg-3">
																		<div style="width:120px;border-radius: 20px;padding-top: 0px;padding-bottom: 10px;box-shadow: inset 0 0 2rem rgba(0,0,0,0.2);text-align: center;font-size: 18px;font-weight: bold">
																			<?php if($day == date('d') && $month == date('m')):?>
																			<span style="background-color: #c84619; color: white;padding: 10px;border-radius: 10px;text-shadow: 0 0.05rem 0.1rem rgba(0,0,0,.5);"><?="Today"?></span>
																			<br>
																			<span style="font-size: 48px;color:#c84619;text-shadow: 0 0.05rem 0.1rem rgba(0,0,0,.5);">
																				<?=$day?>
																			</span><br>
																			<?php else:?>
																			<span style="background-color: #c84619; color: white;padding: 10px;border-radius: 10px;text-shadow: 0 0.05rem 0.1rem rgba(0,0,0,.5);">
																				<?php
																				$dateObj = DateTime::createFromFormat('!m', $month);
																				$monthName = $dateObj->format('F');
																				echo $monthName;
																				?>
																			</span><br>
																			<span style="font-size: 48px;text-shadow: 0 0.05rem 0.1rem rgba(0,0,0,.5);">
																				<?=$day?>
																			</span><br>
																			<?php endif;?>
																			<?php if($weekday=="Saturday" || $weekday=="Sunday"):?>
																			<span style="text-shadow: 0 0.05rem 0.1rem rgba(0,0,0,.5); color: #c84619"><?=$weekday;?></span>
																			<?php else:?>
																			<span style="text-shadow: 0 0.05rem 0.1rem rgba(0,0,0,.5);">
																				<?=$weekday;?></span>
																			<?php endif;?>
																			</span>
																			<br>
																		</div>
																	</div>
																	<div class="col-lg-4" style="text-align: center;">
																<?php
																	foreach($events as $event):
																?>
																	<div>
																		<span class="m-timeline-3__item-text">
																			<a href="#" class="event-edit event-edit-<?=$event->id;?>" style="font-size: 16px; color:<?=$event->activity_color;?>"><b><?=$event->title?></b></a>
																		</span><br>
																		<span class="m-timeline-3__item-text"><i class="fa fa-clock"></i>
																			<?=$event->start_time."  -  ".$event->finish_time."  ,  ".$event->location;?>
																		</span><br>
																		<span class="m-timeline-3__item-user-name">
																			<?=$event->description?>
																		</span><br>
																		<a href="#" class="event-edit event-edit-<?=$event->id;?> m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"><i class="la la-edit"></i></a>
																		<a href="#" class="event-delete event-delete-<?=$event->id;?> m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"><i class="la la-trash"></i></a>
																	</div>
																	<?php endforeach;?>
																	</div>
																</div>
																<hr style="margin-top: 50px;">
																<?php endif;?>
															<?php endfor;?>
														<?php endif;?>
													</div>
												</div>
												<!--End::Timeline 3 -->
											</div>
										</div>
									</div>
									<div class="modal fade" id="modal_edit_event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<form class="form-calendar-edit-event">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLongTitle"><?=$label['edit_event']?></h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-group">
															<input type="hidden" name="id" value="">
															<label for="recipient-name" class="form-control-label"><?=$label['title']?>:</label>
															<input type="text" class="form-control" id="event-title" name="title" placeholder="<?=$label['title']?>">
														</div>
														<div class="row">
															<div class="form-group col-md-6">
																<label for="recipient-name" class="form-control-label"><?=$label['start_time']?>:</label>
																<input type="time" class="form-control" id="event-start-time" name="start_time" placeholder="<?=$label['start_time']?>">
															</div>
															<div class="form-group col-md-6">
																<label for="recipient-name" class="form-control-label"><?=$label['finish_time']?>:</label>
																<input type="time" class="form-control" id="event-finish-time" name="finish_time" placeholder="<?=$label['finish_time']?>">
															</div>
														</div>
														<div class="form-group">
															<label for="recipient-name" class="form-control-label"><?=$label['location']?>:</label>
															<input type="text" class="form-control" id="event-location" name="location" placeholder="<?=$label['location']?>">
														</div>
														<div class="form-group">
															<label for="message-text" class="form-control-label"><?=$label['description']?>:</label>
															<textarea class="form-control" name="description" id="event-description" placeholder="<?=$label['description']?>"></textarea>
														</div>
														<div class="form-group">
															<label for="message-text" class="form-control-label"><?=$label['activity_color']?>:</label>
															<div class="colorPickSelector">
																<input type="hidden" name="activity_color">
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$label['close']?></button>
														<button type="submit" class="btn btn-primary"><?=$label['save']?></button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!--end::Portlet-->
							</div>
						</div>
					</div>
				</div>