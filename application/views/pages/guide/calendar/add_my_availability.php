				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['add_available_days']?><small><?=$label['you_can_add_your_available_days_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-calendar-add-my-availability m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['days']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<select class="form-control m-bootstrap-select m_selectpicker" name="days" id="select_my_availability_days">
												<option value="Several Days" id="option_several_days"><?=$label['several_days']?></option>
												<option value="One Day" id="option_one_day"><?=$label['one_day']?></option>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['from']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<?php if($this->session->userdata('site_lang')=="english"):?>
											<input type="text" class="form-control" name="from" id="m_datepicker_1" readonly placeholder="<?=$label['from']?>"/>
											<?php else:?>
											<input type="text" class="form-control" name="from" id="m_datepicker_1" data-date-language="tr" readonly placeholder="<?=$label['from']?>"/>
											<?php endif;?>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['to']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<?php if($this->session->userdata('site_lang')=="english"):?>
											<input type="text" class="form-control" name="to" id="m_datepicker_1" readonly placeholder="<?=$label['to']?>"/>
											<?php else:?>
											<input type="text" class="form-control" name="to" id="m_datepicker_1" data-date-language="tr" readonly placeholder="<?=$label['to']?>"/>
											<?php endif;?>
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