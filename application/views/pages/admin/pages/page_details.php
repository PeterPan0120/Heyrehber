				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['details_of_page']?><small><?=$label['you_can_see_details_of_this_page_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-pages-edit-page m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<input type="hidden" name="id" value="<?=$page->id?>">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['title']?>:</label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$page->title;?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['category']?>:</label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											<?php if(isset($categories)):?>
												<?php foreach($categories as $category):?>
													<?php if($page->category == $category->id):?>
													<label class="col-form-label"><?=$category->category;?></label>
													<?php endif;?>
												<?php endforeach;?>
											<?php endif;?>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['content']?>:</label>
										<div class="col-lg-10 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$page->content?></label>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['created_date']?>:</label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											<label class="col-form-label"><?=$page->created_date?></label>
										</div>
									</div>
									<div class="m-form__actions">
										<a href="/admin/pages_edit_page?id=<?=$page->id;?>" class="btn btn-primary"><?=$label['edit']?></a>
										<a href="/admin/pages_pages" class="btn btn-default"><?=$label['cancel']?></a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>