				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

					<!-- BEGIN: Aside Menu -->
					<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
						<ul class="m-menu__nav ">
							<li class="m-menu__section m-menu__section--first">
								<h4 class="m-menu__section-text">Backend</h4>
								<i class="m-menu__section-icon flaticon-more-v2"></i>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="dashboard"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php endif;?>
								<a href="/admin/dashboard" class="m-menu__link ">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-home"></i>
									<span class="m-menu__link-text"><?=$sidebar_label['dashboard']?></span>
								</a>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="agencies"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php endif;?>
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-users"> </i>
									<span class="m-menu__link-text"><?=$sidebar_label['agencies']?></span>
									 <i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text"><?=$sidebar_label['agencies']?></span>
											</span>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="agencies"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/agencies_agencies" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['agency_list']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="add_agency"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/admin/agencies_add_agency" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['new_agency']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="agency_reviews" || $sidebar_item_child_active=="edit_agency_review")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/admin/agencies_agency_reviews" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['agency_reviews']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="add_agency_review"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/admin/agencies_add_agency_review" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['new_agency_review']?></span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="guides"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php endif;?>
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-layers"> </i>
									<span class="m-menu__link-text"><?=$sidebar_label['guides']?></span>
									 <i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text"><?=$sidebar_label['guides']?></span>
											</span>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="guide_search")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/guides_guide_search" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['guide_search']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="guides" || $sidebar_item_child_active=="guide_details")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/guides_guides" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['guide_list']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="add_guide"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/admin/guides_add_guide" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['new_guide']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="guide_reviews" || $sidebar_item_child_active=="edit_guide_review")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/admin/guides_guide_reviews" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['guide_reviews']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="add_guide_review"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/admin/guides_add_guide_review" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['new_guide_review']?></span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="guide_requests"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php endif;?>
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-shopping-basket"> </i>
									<span class="m-menu__link-text"><?=$sidebar_label['guide_requests']?></span>
									 <i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text"><?=$sidebar_label['guide_requests']?></span>
											</span>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="guide_requests" || $sidebar_item_child_active=="edit_guide_request")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/guide_requests_guide_requests" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['guide_request_list']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="add_guide_request"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/admin/guide_requests_add_guide_request" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['new_guide_request']?></span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="calendar"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
							<?php endif;?>
								<a href="/admin/events_events" class="m-menu__link ">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-calendar"></i>
									<span class="m-menu__link-text"><?=$sidebar_label['calendar_management']?></span>
								</a>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="restaurants"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php endif;?>
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-tea-cup"> </i>
									<span class="m-menu__link-text"><?=$sidebar_label['restaurants']?></span>
									 <i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text"><?=$sidebar_label['restaurants']?></span>
											</span>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="restaurants" || $sidebar_item_child_active=="edit_restaurant" || $sidebar_item_child_active=="restaurant_details" )) :?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/restaurants_restaurants" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['restaurant_list']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="add_restaurant"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/admin/restaurants_add_restaurant" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['new_restaurant']?></span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="shops"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php endif;?>
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-shopping-basket"> </i>
									<span class="m-menu__link-text"><?=$sidebar_label['shops']?></span>
									 <i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text"><?=$sidebar_label['shops']?></span>
											</span>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="shops" || $sidebar_item_child_active=="edit_shop" || $sidebar_item_child_active=="shop_details")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/shops_shops" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['shop_list']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="add_shop"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/admin/shops_add_shop" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['new_shopping_point']?></span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="museums"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php endif;?>
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-presentation-1"> </i>
									<span class="m-menu__link-text"><?=$sidebar_label['museums']?></span>
									 <i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text"><?=$sidebar_label['museums']?></span>
											</span>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="museums" || $sidebar_item_child_active=="edit_museum" || $sidebar_item_child_active=="museum_details")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/museums_museums" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['museum_list']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="add_museum"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/admin/museums_add_museum" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['new_museum']?></span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="announcements"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php endif;?>
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-alert"> </i>
									<span class="m-menu__link-text"><?=$sidebar_label['announcements']?></span>
									 <i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text"><?=$sidebar_label['announcements']?></span>
											</span>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="announcements" || $sidebar_item_child_active=="edit_announcement")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/announcements_announcements" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['announcement_list']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="add_announcement"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="announcements_add_announcement" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['new_announcement']?></span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="pages"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php endif;?>
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-tabs"> </i>
									<span class="m-menu__link-text"><?=$sidebar_label['pages']?></span>
									 <i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text"><?=$sidebar_label['pages']?></span>
											</span>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="pages" || $sidebar_item_child_active=="edit_page"|| $sidebar_item_child_active=="page_details")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/pages_pages" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['pages']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="add_page"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/pages_add_page" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['new_page']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="categories" || $sidebar_item_child_active=="add_page_category" || $sidebar_item_child_active=="edit_page_category")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/page_categories_categories" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['categories']?></span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="accountManagement"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php endif;?>
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-user-settings"> </i>
									<span class="m-menu__link-text"><?=$sidebar_label['account_management']?></span>
									 <i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text"><?=$sidebar_label['account_management']?></span>
											</span>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="users"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/accountManagement_users" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['users']?></span>
											</a>
										</li>
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text"><?=$sidebar_label['supervisors']?></span>
											</span>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="supervisors"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/accountManagement_supervisors" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['supervisor_list']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="add_supervisor"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/admin/accountManagement_add_supervisor" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['new_supervisor']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="editors"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/accountManagement_editors" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['editor_list']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="add_editor"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/admin/accountManagement_add_editor" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['new_editor']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="departments"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/accountManagement_departments" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['departments']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="add_department"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/accountManagement_add_department" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['new_department']?></span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="inner.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['roles']?></span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__section ">
								<h4 class="m-menu__section-text">System</h4>
								<i class="m-menu__section-icon flaticon-more-v2"></i>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="settings"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php endif;?>
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-settings"></i>
									<span class="m-menu__link-text"><?=$sidebar_label['settings']?></span>
									 <i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text"><?=$sidebar_label['settings']?></span>
											</span>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="countries" || $sidebar_item_child_active=="add_country" || $sidebar_item_child_active=="edit_country")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/settings_countries" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['countries']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="districts" || $sidebar_item_child_active=="add_district" || $sidebar_item_child_active=="edit_district")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/settings_districts" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['districts']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="cities" || $sidebar_item_child_active=="add_city" || $sidebar_item_child_active=="edit_city")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/settings_cities" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['cities']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="regions" || $sidebar_item_child_active=="add_region" || $sidebar_item_child_active=="edit_region")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/settings_regions" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['regions']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="languages" || $sidebar_item_child_active=="add_language" || $sidebar_item_child_active=="edit_language")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/settings_languages" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['languages']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="specialisties" || $sidebar_item_child_active=="add_specialisties" || $sidebar_item_child_active=="edit_specialisties")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/settings_specialisties" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['specialisties']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="chambers" || $sidebar_item_child_active=="add_chamber" || $sidebar_item_child_active=="edit_chamber")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/settings_chambers" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['chambers']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="shop_categories" || $sidebar_item_child_active=="add_shop_category" || $sidebar_item_child_active=="edit_shop_category")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/settings_shop_categories" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['shop_categories']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="restaurant_categories" || $sidebar_item_child_active=="add_restaurant_category" || $sidebar_item_child_active=="edit_restaurant_category") ):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/settings_restaurant_categories" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['restaurant_categories']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="museum_categories" || $sidebar_item_child_active=="add_museum_category" || $sidebar_item_child_active=="edit_museum_category")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/settings_museum_categories" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['museum_categories']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="subject_categories" || $sidebar_item_child_active=="add_subject_category" ||$sidebar_item_child_active=="edit_subject_category")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/settings_subject_categories" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['subject_categories']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="tour_types" || $sidebar_item_child_active=="add_tour_type" || $sidebar_item_child_active=="edit_tour_type")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/settings_tour_types" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['tour_types']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="system_settings"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/settings_system_settings" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['system_settings']?></span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="help_desk"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php endif;?>
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-shopping-basket"> </i>
									<span class="m-menu__link-text"><?=$sidebar_label['help_desk']?></span>
									 <i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text"><?=$sidebar_label['help_desk']?></span>
											</span>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="tickets" || $sidebar_item_child_active=="add_ticket" || $sidebar_item_child_active=="edit_ticket")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/admin/tickets_tickets" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['tickets']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="ticket_categories" || $sidebar_item_child_active=="add_ticket_category" || $sidebar_item_child_active=="edit_ticket_category")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/admin/ticket_categories_ticket_categories" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['ticket_categories']?></span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>

					<!-- END: Aside Menu -->
				</div>