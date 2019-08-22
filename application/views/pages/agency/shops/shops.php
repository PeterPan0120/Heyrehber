				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['shop_list']?><small><?=$label['you_can_see_all_shops_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
									<div class="row align-items-center">
										<div class="col-xl-12 order-2 order-xl-1">
											<div class="form-group m-form__group row align-items-center">
												<div class="col-md-3">
													<div class="m-input-icon m-input-icon--left">
														<input type="text" class="form-control m-input" placeholder="<?=$label['search']?>..." id="generalSearch">
														<span class="m-input-icon__icon m-input-icon__icon--left">
															<span><i class="la la-search"></i></span>
														</span>
													</div>
												</div>
												<div class="col-md-3">
													<div class="m-form__group m-form__group--inline">
														<div class="m-form__label">
															<label><?=$label['category']?>:</label>
														</div>
														<div class="m-form__control">
															<select class="form-control m-bootstrap-select  m_selectpicker" id="select_filter_category">
																<option value="">All</option>
																<?php if(isset($categories)):?>
																	<?php foreach($categories as $category):?>
																	<option value="<?=$category->category?>"><?=$category->category;?></option>
																	<?php endforeach;?>
																<?php endif;?>
															</select>
														</div>
													</div>
													<div class="d-md-none m--margin-bottom-10"></div>
												</div>
												
												<div class="col-md-3">
													<div class="m-form__group m-form__group--inline">
														<div class="m-form__label">
															<label class="m-label m-label--single"><?=$label['city']?>:</label>
														</div>
														<div class="m-form__control">
															<select class="form-control m-bootstrap-select  m_selectpicker" id="select_filter_city">
																<option value="">All</option>
																<?php if(isset($cities)):?>
																	<?php foreach($cities as $city):?>
																		<option value="<?=$city->id?>"><?=$city->city?></option>
																	<?php endforeach;?>
																<?php endif;?>
															</select>
														</div>
													</div>
													<div class="d-md-none m--margin-bottom-10"></div>
												</div>
												<div class="col-md-3">
													<div class="m-form__group m-form__group--inline">
														<div class="m-form__label">
															<label class="m-label m-label--single"><?=$label['district']?>:</label>
														</div>
														<div class="m-form__control">
															<select class="form-control m-bootstrap-select m_selectpicker" id="select_filter_district">
																<option value="">All</option>
																<?php if(isset($districts)):?>
																	<?php foreach($districts as $district):?>
																		<option value="<?=$district->id?>"><?=$district->district?></option>
																	<?php endforeach;?>
																<?php endif;?>
															</select>
														</div>
													</div>
													<div class="d-md-none m--margin-bottom-10"></div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!--end: Search Form -->

								<!--begin: Datatable -->
								<div class="m_datatable" id="m_shop_datatable"></div>

								<!--end: Datatable -->
							</div>
						</div>
					</div>
				</div>