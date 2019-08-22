				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['details_of_guide_review']?><small><?=$label['you_can_see_details_of_this_review_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-guides-guide-review-details m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<input type="hidden" name="id" value="<?=$guide_review->id;?>">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['guide']?>:</label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<label class="col-form-label">
												<?php
												foreach ($guides as $guide):
													if($guide->id == $guide_review->guide):
														echo $guide->username;
													endif;
												endforeach;
												?>
											</label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['agency']?>:</label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<label class="col-form-label">
											<?php
											foreach ($agencies as $agency):
												if($agency->id == $guide_review->agency):
													echo $agency->username;
												endif;
											endforeach;
											?>		
											</label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['review']?>:</label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$guide_review->review?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['rate_this']?>:</label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											<?php $result="";
					                        for($i=0; $i<$guide_review->rating; $i++):?>
					                            <i class='flaticon-star' style='font-size: 25px;color: #FDD05B;'></i>
					                        <?php endfor;?>
					                        <?php 
					                        for($i=0; $i<5-$guide_review->rating; $i++):?>
					                            <i class='flaticon-star' style='font-size: 25px;color: #d0d0d0;'></i>
					                        <?php endfor;?>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['active']?>:</label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											<?php if($guide_review->status=="active"): ?>
											<label class="col-form-label"><?=$label['active']?></label>
											<?php else:?>
											<label class="col-form-label"><?=$label['deactive']?></label>
											<?php endif;?>
										</div>
									</div>
									<div class="m-form__actions">
										<a href="/admin/guides_edit_guide_review?id=<?=$guide_review->id;?>" class="btn btn-primary"><?=$label['edit']?></a>
										<a href="/admin/guides_guide_reviews" class="btn btn-default"><?=$label['cancel']?></a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>