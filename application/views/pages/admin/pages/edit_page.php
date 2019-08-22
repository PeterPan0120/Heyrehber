				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?=$label['edit_page']?><small><?=$label['you_can_edit_this_page_here']?></small>
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<form class="form-pages-edit-page m-form m-form--fit m-form--label-align-right">
									<div class="form-group m-form__group row">
										<input type="hidden" name="id" value="<?=$page->id?>">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['title']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<input class="form-control m-input" type="text" name="title" placeholder="<?=$label['title']?>" value="<?=$page->title?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['category']?></label>
										<div class="col-lg-5 col-md-9 col-sm-12">
											<select class="form-control m-select2" id="select_page_category" name="category">
												<option></option>
												<?php if(isset($categories)):?>
													<?php foreach($categories as $category):?>
														<?php if($page->category == $category->id):?>
														<option value="<?=$category->id?>" selected><?=$category->category;?></option>
														<?php else:?>
														<option value="<?=$category->id?>"><?=$category->category;?></option>
														<?php endif;?>
													<?php endforeach;?>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-2 col-sm-12"><?=$label['content']?></label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											<textarea rows="5" class="form-control m-input page_content" type="text" name="content"><?=$page->content;?></textarea>
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