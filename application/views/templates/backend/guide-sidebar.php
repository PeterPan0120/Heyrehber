				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

					<!-- BEGIN: Aside Menu -->
					<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
						<ul class="m-menu__nav ">
							<li class="m-menu__section m-menu__section--first">
								<h4 class="m-menu__section-text"><?=$sidebar_label['backend']?></h4>
								<i class="m-menu__section-icon flaticon-more-v2"></i>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="dashboard"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
							<?php endif;?>
								<a href="/guide/dashboard" class="m-menu__link ">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-home"></i>
									<span class="m-menu__link-text"><?=$sidebar_label['dashboard']?></span>
								</a>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="my_profile"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
							<?php endif;?>
								<a href="/guide/my_profile" class="m-menu__link ">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-user"></i>
									<span class="m-menu__link-text"><?=$sidebar_label['my_profile']?></span>
								</a>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="calendar"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php endif;?>
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-calendar"> </i>
									<span class="m-menu__link-text"><?=$sidebar_label['calendar']?></span>
									 <i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text"><?=$sidebar_label['calendar']?></span>
											</span>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="my_events"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/guide/calendar_my_events" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['my_events']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="my_availability"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/guide/calendar_my_availability" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['my_availability']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="my_unavailability"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/guide/calendar_my_unavailability" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['my_unavailability']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="calendar_settings"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/guide/calendar_settings" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['calendar_settings']?></span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="my_favourites"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php endif;?>
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-like"> </i>
									<span class="m-menu__link-text"><?=$sidebar_label['my_favourites']?></span>
									 <i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text"><?=$sidebar_label['my_favourites']?></span>
											</span>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="favourite_agencies"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/guide/my_favourites_favourite_agencies" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['favourite_agencies']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="non_favourite_agencies"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/guide/my_favourites_non_favourite_agencies" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span class="m-menu__link-text"><?=$sidebar_label['non_favourite_agencies']?></span>
											</a>
										</li>
													<span></span>
												</i>
									</ul>
								</div>
							</li>
							<?php if(isset($sidebar_item_parent_active) && $sidebar_item_parent_active=="reviews"):?>
							<li class="m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php else:?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<?php endif;?>
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<span class="m-menu__item-here"></span>
									<i class="m-menu__link-icon flaticon-comment"> </i>
									<span class="m-menu__link-text"><?=$sidebar_label['reviews']?></span>
									 <i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__item-here"></span>
												<span class="m-menu__link-text"><?=$sidebar_label['reviews']?></span>
											</span>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="agency_reviews"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/guide/reviews_agency_reviews" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['agency_reviews']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="my_reviews"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/guide/reviews_my_reviews" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['my_reviews']?></span>
											</a>
										</li>
									</ul>
								</div>
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
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="restaurants" || $sidebar_item_child_active=="restaurant_details")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/guide/restaurants_restaurants" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['restaurant_list']?></span>
											</a>
										</li>
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
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="shops" || $sidebar_item_child_active=="shop_details")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/guide/shops_shops" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['shop_list']?></span>
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
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="museums" ||  $sidebar_item_child_active=="museum_details")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/guide/museums_museums" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['museum_list']?></span>
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
										<?php if(isset($sidebar_item_child_active) && ($sidebar_item_child_active=="my_tickets" || $sidebar_item_child_active=="ticket_details")):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true">
										<?php endif;?>
											<a href="/guide/help_desk_my_tickets" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['my_tickets']?></span>
											</a>
										</li>
										<?php if(isset($sidebar_item_child_active) && $sidebar_item_child_active=="add_ticket"):?>
										<li class="m-menu__item m-menu__item--active" aria-haspopup="true">
										<?php else:?>
										<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
										<?php endif;?>
											<a href="/guide/help_desk_add_ticket" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text"><?=$sidebar_label['new_ticket']?></span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
					<!-- END: Aside Menu -->
				</div>