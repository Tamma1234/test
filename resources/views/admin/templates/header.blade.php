
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
    <!-- begin:: Header Menu -->

    <!-- Uncomment this to display the close button of the panel
<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
-->
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
    </div>

    <!-- end:: Header Menu -->

    <!-- begin:: Header Topbar -->
    <div class="kt-header__topbar">

        <!--begin: Search -->

        <!--begin: Search -->
        <div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									<span class="kt-header__topbar-icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg> </span>
            </div>
            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
                <div class="kt-quick-search kt-quick-search--dropdown kt-quick-search--result-compact" id="kt_quick_search_dropdown">
                    <form method="get" class="kt-quick-search__form">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
                            <input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
                            <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                        </div>
                    </form>
                    <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="325" data-mobile-height="200">
                    </div>
                </div>
            </div>
        </div>


        <!--begin: Quick panel toggler -->

        <!--end: Quick panel toggler -->

        <!--begin: Language bar -->
        <div class="kt-header__topbar-item kt-header__topbar-item--langs">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									<span class="kt-header__topbar-icon">
										<img class="" src="assets/media/flags/020-flag.svg" alt="" />
									</span>
            </div>
            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
                <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                    <li class="kt-nav__item kt-nav__item--active">
                        <a href="#" class="kt-nav__link">
                            <span class="kt-nav__link-icon"><img src="assets/media/flags/020-flag.svg" alt="" /></span>
                            <span class="kt-nav__link-text">English</span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a href="#" class="kt-nav__link">
                            <span class="kt-nav__link-icon"><img src="assets/media/flags/016-spain.svg" alt="" /></span>
                            <span class="kt-nav__link-text">Spanish</span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a href="#" class="kt-nav__link">
                            <span class="kt-nav__link-icon"><img src="assets/media/flags/017-germany.svg" alt="" /></span>
                            <span class="kt-nav__link-text">German</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!--end: Language bar -->

        <!--begin: User Bar -->
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                    <span class="kt-header__topbar-username kt-hidden-mobile">Sean</span>
                    <img class="kt-hidden" alt="Pic" src="assets/media/users/300_25.jpg" />

                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                    <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                <!--begin: Head -->
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(assets/media/misc/bg-1.jpg)">
                    <div class="kt-user-card__avatar">
                        <img class="kt-hidden" alt="Pic" src="assets/media/users/300_25.jpg" />

                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                        <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span>
                    </div>
                    <div class="kt-user-card__name">
                        Sean Stone
                    </div>
                    <div class="kt-user-card__badge">
                        <span class="btn btn-success btn-sm btn-bold btn-font-md">23 messages</span>
                    </div>
                </div>

                <!--end: Head -->

                <!--begin: Navigation -->
                <div class="kt-notification">
                    <div class="kt-notification__custom kt-space-between">
                        <a href="{{route('logout.index')}}" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
                        <a href="custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a>
                    </div>
                </div>

                <!--end: Navigation -->
            </div>
        </div>

        <!--end: User Bar -->
    </div>

    <!-- end:: Header Topbar -->
</div>
