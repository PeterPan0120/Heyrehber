				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['add_ticket']?><small><?=$label['you_can_add_new_ticket_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-help-desk-add-ticket m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['subject']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="subject" placeholder="<?=$label['subject']?>" required>
										</div>
									</div>
									<br><br>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['category']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_ticket_category" name="category[]" multiple="multiple">
												<option></option>
												<?php
												if(isset($ticket_categories)):
													foreach($ticket_categories as $ticket_category):?>
														<option value="<?=$ticket_category->id?>"><?= $ticket_category->category;?></option>
													<?php endforeach;?>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['priority']?></label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_ticket_priority" name="priority">
												<option value="low">Low</option>
												<option value="medium">Medium</option>
												<option value="urgent">Urgent</option>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['message']?></label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											<textarea class="form-control m-input" rows="3" name="message" placeholder="<?=$label['message']?>" required></textarea>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['attachment']?></label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											<div action="/guide/upload_attachments" method="post" name="attachment[]" class="dropzone" id="ticket_dropzone" enctype="multipart/form-data">
                                        	<!-- <input type="file" name="file" multiple/> -->
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