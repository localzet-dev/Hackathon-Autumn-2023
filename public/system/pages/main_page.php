<?php


function page_element_main_html_head(){
    $file = <<<EOF

	<meta charset="utf-8">
	
	<!-- SEO Meta -->
	<meta name="language" content="RU" />
	<meta name="robots" content="noindex,nofollow" />
	<meta name="title" content="Hackathon Autumn 2023" />
	<meta name="description"
		content="Оджетто — Быстро выводим на рынок новые продукты на готовых платформах, развиваем custom build решения в парадигме микросервисов. IT-консалтинг, разработка, дизайн, поддержка, веб-аналитика." />
	<meta name="keywords" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Apple Meta Tags -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-touch-fullscreen" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="format-detection" content="telephone=no" />

	<!-- About Creator App -->
	<meta name="owner" content="nona@localzet.com" />
	<meta name="designer" content="nona@localzet.com" />
	<meta name="author" content="NONA Team" />
	<meta name="copyright" content="NONA Team" />
	<meta name="reply-to" content="nona@localzet.com" />

	<!-- System Information -->
	<meta name="generator" content="Triangle Framework" />

	<!-- HTTP Equiv -->
	<meta http-equiv="Expires" content="60" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- SEO Link -->
	<link rel="canonical" href="https://hackathon.localzet.com/">
	<link rel="icon" type="image/png" href="https://oggetto.ru/favicon.png">
	<link rel="shortcut icon" type="image/png" href="https://oggetto.ru/favicon.png">

	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;900&amp;display=swap">

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" />
	<link rel="stylesheet" type="text/css" href="/assets/plugins/custom/datatables/datatables.bundle.css" />
	<link rel="stylesheet" type="text/css" href="/assets/plugins/global/plugins.bundle.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/style.bundle.css" />

</head>
EOF;
    
    return $file;
}

function page_element_main_js(){
    $file = '
        <!--begin::Javascript-->
		<script>var hostUrl = "https://hackathon.localzet.com/assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="https://hackathon.localzet.com/assets/plugins/global/plugins.bundle.js"></script>
		<script src="https://hackathon.localzet.com/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="https://hackathon.localzet.com/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
		<script src="https://hackathon.localzet.com/assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="https://hackathon.localzet.com/assets/js/widgets.bundle.js"></script>
		<script src="https://hackathon.localzet.com/assets/js/custom/widgets.js"></script>
		<script src="https://hackathon.localzet.com/assets/js/custom/apps/chat/chat.js"></script>
		<script src="https://hackathon.localzet.com/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="https://hackathon.localzet.com/assets/js/custom/utilities/modals/create-app.js"></script>
		<script src="https://hackathon.localzet.com/assets/js/custom/utilities/modals/new-target.js"></script>
		<script src="https://hackathon.localzet.com/assets/js/custom/utilities/modals/users-search.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    	<script src="https://assets.exesfull.com/js/s2a.js"></script>
		<script src="https://hackathon.localzet.com/assets/js/api/main.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
    ';
	return $file;
} 

function page_element_main_html_footer(){
    $file = '
    <!--begin::Footer-->
    <div id="kt_app_footer" class="app-footer">
        <!--begin::Footer container-->
        <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-semibold me-1">2023&copy;</span>
                <a target="_blank" class="text-gray-800 text-hover-primary">Nona Team</a>
            </div>
            <!--end::Copyright-->
            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                <li class="menu-item">
                    <a href="https://exesfull.com" target="_blank" class="menu-link px-2">Exesfull</a>
                </li>
                <li class="menu-item">
                    <a href="https://localzet.com" target="_blank" class="menu-link px-2">Localzet</a>
                </li>
            </ul>
            <!--end::Menu-->
        </div>
        <!--end::Footer container-->
    </div>
    <!--end::Footer-->
    ';
    return $file;
}

function page_element_main_html_menu(){

	$user_id = user_id();
	$sql = 'SELECT * FROM `users` WHERE `user_id` = "'.$user_id.'"';
	$g = database($sql, '*', $t = "+");
	$user_row=mysqli_fetch_array($g);

	if (($user_row[9] == 'true')||($user_row[10] == 'true')){
		$is_speaker = '
		<div class="menu-item">
			<a class="menu-link" href="https://hackathon.localzet.com/events/admin/">
				<span class="menu-icon">
				<i class="ki-duotone ki-calendar fs-2">
					<span class="path1"></span>
					<span class="path2"></span>
					</i>
				</span>
				<span class="menu-title">Мои мероприятия</span>
			</a>
		</div>
		<div class="menu-item">
			<a class="menu-link" href="https://hackathon.localzet.com/events/add/">
				<span class="menu-icon">
				<i class="ki-duotone ki-plus fs-2">
					<span class="path1"></span>
					<span class="path2"></span>
					</i>
				</span>
				<span class="menu-title">Создать</span>
			</a>
		</div>
		';
	}else{
		$is_speaker = '';
	}
	if ($user_row[10] == 'true'){
		$is_admin = '
		<div class="menu-item">
			<a class="menu-link" href="https://hackathon.localzet.com/admin/users/">
				<span class="menu-icon">
				<i class="ki-duotone ki-people fs-2">
					<span class="path1"></span>
					<span class="path2"></span>
					</i>
				</span>
				<span class="menu-title">Пользователи</span>
			</a>
		</div>
		<div class="menu-item">
			<a class="menu-link" href="https://hackathon.localzet.com/admin/events/">
				<span class="menu-icon">
				<i class="ki-duotone ki-calendar-edit fs-2">
					<span class="path1"></span>
					<span class="path2"></span>
					</i>
				</span>
				<span class="menu-title">Все мероприятия</span>
			</a>
		</div>
		';
	}else{
		$is_admin = '';
	}

	$add_menu = '
		
	';

    $file = '
        <!--begin::Theme mode setup on page load-->
        <script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
				<div id="kt_app_header" class="app-header">
					<!--begin::Header container-->
					<div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
						<!--begin::Sidebar mobile toggle-->
						<div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
							<div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
								<i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</div>
						</div>
						<!--end::Sidebar mobile toggle-->
						<!--begin::Mobile logo-->
						<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
							<a href="https://hackathon.localzet.com/" class="d-lg-none">
								<img alt="Logo" src="https://oggetto.team/frontend/assets/oggetto-logo.png" class="h-30px" />
							</a>
						</div>
						<!--end::Mobile logo-->
						<!--begin::Header wrapper-->
						<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
							<!--begin::Menu wrapper-->
							<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: '."'".'append'."'".', lg: '."'".'prepend'."'".'}" data-kt-swapper-parent="{default: '."'".'#kt_app_body'."'".', lg: '."'".'#kt_app_header_wrapper'."'".'}">
								<!--begin::Menu-->
								<div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
								</div>
							</div>
							<div class="app-navbar flex-shrink-0">
								<div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
									<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="{default: '."'".'click'."'".', lg: '."'".'hover'."'".'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
										<img src="'.$user_row[5].'" alt="user" />
									</div>
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
										<div class="menu-item px-3">
											<div class="menu-content d-flex align-items-center px-3">
												<div class="symbol symbol-50px me-5">
													<img alt="Logo" src="'.$user_row[5].'">
												</div>
												<div class="d-flex flex-column">
													<div class="fw-bold d-flex align-items-center fs-5">
														'.$user_row[2].' '.$user_row[1].'
													</div>
													<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">'.$user_row[4].'</a>
												</div>
											</div>
										</div>
										<div class="menu-item px-5">
											<a href="https://hackathon.localzet.com/user/" class="menu-link px-5">Профиль</a>
										</div>
										<div class="menu-item px-5">
											<a href="https://hackathon.localzet.com/events?sort=my" class="menu-link px-5">Мои мероприятия</a>
										</div>

										<div class="menu-item px-5">
											<a href="https://hackathon.localzet.com/auth/logout/" class="menu-link px-5">Выход</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
						<!--begin::Logo-->
						<div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
							<!--begin::Logo image-->
							<a href="https://hackathon.localzet.com/">
								<img alt="Logo" src="https://hackathon.localzet.com/assets/oggetto.png" class="h-45px app-sidebar-logo-default" />
								<img alt="Logo" src="https://oggetto.team/frontend/assets/oggetto-logo.png" class="h-30px app-sidebar-logo-minimize">
							</a>
							<!--end::Logo image-->
					
							<div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
								<i class="ki-duotone ki-double-left fs-2 rotate-180">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</div>
							<!--end::Sidebar toggle-->
						</div>
						<!--end::Logo-->
						<!--begin::sidebar menu-->
						<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
							<!--begin::Menu wrapper-->
							<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
								<!--begin::Menu-->
								<div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link" href="https://hackathon.localzet.com/events/">
											<span class="menu-icon">
											<i class="ki-duotone ki-clipboard fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
												</i>
											</span>
											<span class="menu-title">Мероприятия</span>
										</a>
										<!--end:Menu link-->
									</div>
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link" href="https://hackathon.localzet.com/user/">
											<span class="menu-icon">
											<i class="ki-duotone ki-user fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
												</i>
											</span>
											<span class="menu-title">Профиль</span>
										</a>
										<!--end:Menu link-->
									</div>
									'.$is_speaker.'
									'.$is_admin.'
					
								</div>
								<!--end::Menu-->
							</div>
							<!--end::Menu wrapper-->
						</div>
						<!--end::sidebar menu-->
					</div>
					<!--end::Sidebar-->
    ';
    return $file;
}


?>