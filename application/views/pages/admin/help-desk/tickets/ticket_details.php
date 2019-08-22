				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="row">
						<div class="m-content col-lg-8">
							<?php if(isset($messages)):?>
								<?php foreach($messages as $message):?>
								<div class="m-portlet m-portlet--mobile">
									<?php if($message->role==0):?>
									<div class="m-portlet__head" style="background-color: #f9d8d8">
									<?php else:?>
									<div class="m-portlet__head" style="background-color: #d8f9df">
									<?php endif;?>
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													<i class="fa fa-user"></i><?=$message->from;?>
													<?php 
													if($message->role==0) echo "(Support)";
													else if($message->role==3) echo "(Agency)";
													else if($message->role==4) echo "(Guide)";
													?>
												</h3>
											</div>
										</div>
										<div class="message-date pull-right">
											<?php
											$now = new DateTime();
											$lastUpdatedDate = new DateTime($message->reply_date);
											$d = $lastUpdatedDate->diff($now)->d;
											$h = $lastUpdatedDate->diff($now)->h;
											$i = $lastUpdatedDate->diff($now)->i;
											$result="";
											if($d==1)			$result.=$d." day";
											else if($d!=0)		$result.=$d." days ";						
											if($h==1)			$result.=$h." hour ";
											else if($h!=0)		$result.=$h." hours ";
											if($i==0 || $i==1) 			$result.=$i." minute ";
											else if($i!=0) 		$result.=$i." minutes ";
											if($result!="") $result.="ago";
											echo $result;
											?>
										</div>
									</div>
									<div class="m-portlet__body">
										<label class="col-form-label">
											<?=base64_decode($message->message);?>
										</label>
									</div>
								</div>
								<?php endforeach;?>
							<?php endif;?>
							<div class="add-reply-message m-portlet m-portlet--mobile">
								<div class="m-portlet__head" style="background-color: #c9e0ff">
									<div class="m-portlet__head-caption">
										<div class="m-portlet__head-title">
											<h3 class="m-portlet__head-text">
												<i class="fa fa-pen"></i><?=$label['reply']?>
											</h3>
											
										</div>
									</div>
									<div class="btn-add-message pull-right">
										<i class="fa fa-plus" title="Add Message">
										</i>
									</div>
								</div>
								<div class="m-portlet__body add-reply-message-body hide">
									<form class="form-message-reply">
										<input type="hidden" name="ticket_id" value="<?=$ticket->ticket_id;?>">
										<div class="form-group m-form__group row">
											<label class="col-form-label col-lg-2 col-sm-12"><?=$label['message']?></label>
											<div class="col-lg-10 col-md-9 col-sm-12">
												<textarea class="form-control m-input" rows="5" name="message" placeholder="<?=$label['message']?>" required></textarea>
											</div>
										</div>
										<div class="m-form__actions" style="text-align: right">
											<button type="submit" class="btn btn-primary"><?=$label['reply']?></button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="m-content col-lg-4">
							<div class="m-portlet m-portlet--mobile">
								<div class="m-portlet__head">
									<div class="m-portlet__head-caption">
										<div class="m-portlet__head-title">
											<h3 class="m-portlet__head-text">
												<?=$label['ticket_information']?>
											</h3>
										</div>
									</div>
								</div>
								<div class="m-portlet__body">
									<form class="form-help-desk-add-ticket m-form m-form--fit m-form--label-align-right">
										<div class="row">
											<div class="col-lg-12" style="text-align: center;">
												<h3><b><?=$ticket->subject?></b></h3>
											</div>
										</div>
										<div class="row">
											<label class="col-form-label col-lg-12 col-sm-12"><b><?=$label['ticket_id']?>:</b> </label>
											<div class="col-lg-12 col-md-9 col-sm-12">
												<label class="col-form-label"><?=$ticket->ticket_id?></label>
											</div>
										</div>
										<hr>
										<?php $this->load->model('TicketCategory_model', 'ticket_category');?>
										<div class="row">
											<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['category']?>:</b> </label>
											<div class="col-lg-6 col-md-9 col-sm-12">
												<?php if($ticket->category!=null || $ticket->category!=""):?>
													<?php $categories = json_decode($ticket->category)?>
													<?php foreach($categories as $cate):?>
														<label class="col-form-label">
															<?=$this->ticket_category->getTicketCategoryById($cate)[0]->category;?>
														</label>
													<?php endforeach;?>
												<?php endif;?>
											</div>
										</div>
										<div class="row">
											<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['priority']?>:</b> </label>
											<div class="col-lg-6 col-md-9 col-sm-12">
												<label class="col-form-label">
												<?php if($ticket->priority=="urgent"):?>
													<span class="m-badge m-badge--danger" style="padding: 0 10px;"><?=$ticket->priority?></span>
												<?php elseif($ticket->priority=="low"):?>
													<span class="m-badge m-badge--success" style="padding: 0 10px;"><?=$ticket->priority?></span>
												<?php elseif($ticket->priority=="medium"):?>
													<span class="m-badge m-badge--warning" style="padding: 0 10px;"><?=$ticket->priority?></span>
												<?php endif;?>
												</label>
											</div>
										</div>
										<div class="row">
											<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['status']?>:</b> </label>
											<div class="col-lg-6 col-md-9 col-sm-12">
												<label class="col-form-label">
													<?=$ticket->status?>
												</label>
											</div>
										</div>
										<div class="row">
											<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['submission_date']?>:</b> </label>
											<div class="col-lg-6 col-md-9 col-sm-12">
												<label class="col-form-label">
												<?php
													echo date("D, F j, Y, g:i a", strtotime($ticket->submission_date));
												?>
												</label>
											</div>
										</div>
										<div class="row">
											<label class="col-form-label col-lg-6 col-sm-12"><b><?=$label['last_updated_date']?>:</b> </label>
											<div class="col-lg-6 col-md-9 col-sm-12">
												<label class="col-form-label">
													<?php
														$now = new DateTime();
														$lastUpdatedDate = new DateTime($ticket->last_updated);
														$d = $lastUpdatedDate->diff($now)->d;
														$h = $lastUpdatedDate->diff($now)->h;
														$i = $lastUpdatedDate->diff($now)->i;
														$result="";
														if($d==1)				$result.=$d." day";
														else if($d!=0)			$result.=$d." days ";
														if($h==1)				$result.=$h." hour ";
														if($h!=0)				$result.=$h." hours ";
														if($i==0 || $i==1) 		$result.=$i." minute ";
														else if($i!=0 || $i!=1) $result.=$i." minutes ";
														if($result!="") 		$result.="ago";
														echo $result;
													?>
												</label>
											</div>
										</div>
										<div class="m-form__actions" style="color: white;text-align: center">
											<?php if($ticket->status=="Closed"):?>
											<button class="open-ticket-<?=$ticket->ticket_id;?> open-ticket btn btn-success"><?=$label['open']?></button>
											<?php else:?>
											<button class="open-ticket-<?=$ticket->ticket_id;?> open-ticket btn btn-success" disabled><?=$label['open']?></button>
											<?php endif;?>
											<?php if($ticket->status=="Closed"):?>
											<button class="close-ticket-<?=$ticket->ticket_id;?> close-ticket btn btn-danger" disabled><?=$label['close']?></button>
											<?php else:?>
											<button class="close-ticket-<?=$ticket->ticket_id;?> close-ticket btn btn-danger"><?=$label['close']?></button>
											<?php endif;?>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>